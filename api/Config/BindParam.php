<?php

namespace API\Config;


Class BindParam{
	private $values = array();
	private $types = '';
	

	/**
	 * add a parameter of a specified type to bind dynamically to query
	 * 
	 * @param string $type a valid binding type of i=integer, d=double, s=string, b=blob
	 * @param mixed $value value to bind
	 */
	public function add( $type, &$value ){
		$this->values[] = &$value;
		$this->types .= $type;
	}


	/**
	 * add a parameter to bind dynamically to query letting the class determine value's type
	 * 
	 * @param mixed $value value to bind
	 */
	public function addDynamicType( &$value ){
		if(preg_match("/^[0-9.]+$/", $value) && preg_match("/[.]{1}/", $value)){
			$this->add('d', $value);
		}else if(preg_match("/^[0-9]+$/", $value)){
			$this->add('i', $value);
		}else {
			$this->add('s', $value);
		}
	}


	/**
	 * build string of `?` joined by $glue
	 * ex: ['one', 'two' 'three'] will return "?, ?, ?"
	 * 
	 * @param array $array array of values
	 * @param string $glue optional glue between values
	 * 
	 * @return string joined string (ex: ?, ?, ?)
	 */
	public static function arrayToPlaceholders(array $array, string $glue=", "): string {
		return join($glue, array_map(function(){return '?';}, $array));
	}


	/**
	 * get array containing binding type string and values
	 * 
	 * @param int $repetitions optionally repeat strings and values if they appear more than once in a query such as WHERE item IN (,,,) OR barcode IN(,,,)
	 * 
	 * @return array|null [0] contains binding type string (ex: sssiisd) followed by [n] values
	 * 	such as [0 => 'ssi', 1 => 'Daniel', 2 => 'Despain', 3 => 72]
	 *  or
	 *  such as [0 => 'ssissi', 1 => 'Daniel', 2 => 'Despain', 3 => 72, 4 => 'Daniel', 5 => 'Despain', 6 => 72]
	 */
	public function get(int $repetitions=1): ?array {
		$repeatedTypes = "";
		for($r=0; $r<$repetitions; $r++){
			$repeatedTypes .= $this->types;
		}

		$repeatedValues = [];
		for($r=0; $r<$repetitions; $r++){
			$repeatedValues = array_merge($repeatedValues, $this->values);
		}

		$returnArray = array_filter(array_merge(array($repeatedTypes), $repeatedValues));

		if(count($returnArray) == 0) return null;
		else return $returnArray;
	}
}

/*

// HOW TO USE:

// BUILD QUERY -- METHOD ONE: GOAL IS "...WHERE price > ? AND item IN (?, ?, ?)..."
$minPrice = 10;
$SKUlist = ['EMC750', 'T1020', 'CD5601'];
$bindParam	= new BindParam();
$bindParam->add('i', $minPrice);
foreach($SKUlist as &$value){
	$bindParam->addDynamicType($value);
}
// prepare query statement
$query = "SELECT * FROM commonAttributes WHERE price > ? AND item IN (" . BindParam::arrayToPlaceholders($SKUlist) . ") ORDER BY item ASC LIMIT 10";
echo "<div class='debugOutput'>BUILD M1<pre>$query</pre></div>\n";
if($stmt = $this->conn->prepare($query)){
	if($bindParam->get()){
		// dynamically bind parameters
		if(call_user_func_array(array($stmt, 'bind_param'), $bindParam->get())){
			if($stmt->execute()){
				if($result = $stmt->get_result()){
					$rowCount = mysqli_num_rows($result); // SELECT
					// $rowCount = mysqli_affected_rows($conn); // UPDATE
					echo "<p>" . number_format($rowCount, 0) . " Item" . ($rowCount != 1 ? "s" : "") . "</p>\n";
					while($row	= $result->fetch_array(MYSQLI_ASSOC)){
						echo $row['item'] . "\n";
					}
				}else{
					if($settings->showDebug) echo "<p class='sqlError'>Query result failed.  " . mysqli_error($conn) . "</p>";
				}
			}else{
				if($settings->showDebug) echo "<p class='sqlError'>Query execute failed.  " . mysqli_error($conn) . "</p>";
			}
		}else{
			if($settings->showDebug) echo "<p class='sqlError'>Query dynamic bind failed.  " . mysqli_error($conn) . "</p>";
		}
	}else{
		if($settings->showDebug) echo "<p class='sqlError'>Query get bind failed.  " . mysqli_error($conn) . "</p>";
	}
}else{
	if($settings->showDebug) echo "<p class='sqlError'>Query prepare failed.  " . mysqli_error($conn) . "</p>";
}



// PREPARE QUERY AND THEN EXECUTE INSIDE A LOOP
$wantToLookup = ['EMC750', 'CD5601', 'T1020'];
$location	= "MAIN";
$SKU		= 'zed'; // bindParam->add() won't bind null // SKU is what's going to change foreach loop
// prepare query (once before entering loop)
$bindParam	= new BindParam();
$bindParam->add('s', $location);
$bindParam->add('s', $SKU);
// prepare query statement
$query = "SELECT * FROM stockValues WHERE location = ? AND item = ?";

// make sure prepare succeeds and don't 'execute' unless it does
$prepared = false;
if($stmt = $conn->prepare($query)){
	if($bindParam->get() || 1==1){
		// dynamically bind parameters
		if(call_user_func_array(array($stmt, 'bind_param'), $bindParam->get())){
			$prepared= true;
		}
	}
}

if($prepared === true){
	foreach($wantToLookup as $item){
		$SKU = $item;
	
		if($stmt->execute()){
			if($result = $stmt->get_result()){
				$rowCount = mysqli_num_rows($result); // SELECT
				// $rowCount = mysqli_affected_rows($conn); // UPDATE
				while($row	= $result->fetch_array(MYSQLI_ASSOC)){
					echo "<div>" . $row['item'] . "</div>\n";
				}
			}
		}else{
			if($settings->showDebug) echo "<p class='sqlError'>Query execute failed.  " . mysqli_error($conn) . "</p>";
		}
	}
}





// BUILD QUERY -- METHOD TWO: GOAL IS "...WHERE {{price}} > ? AND {{new}} = ? AND {{status}} IN (?, ?)..."
$criteria = array(
	'price'		=> ['operator' => ">", 'value' => 5], //TODO: make this easier, and "=" should just be a default
	'new'		=> ['operator' => "=", 'value' => "NEW2021"], 
	'status'	=> ['operator' => "IN", 'value' => ['STOCK', 'DIGITAL']], 
);
$whereClauses	= array();
$bindParam		= new BindParam();
foreach($criteria as $field => &$value){
	if($value['operator'] == "IN"){
		array_push($whereClauses,  $field . " IN (" . BindParam::arrayToPlaceholders($SKUlist) . ")");
	}else{
		array_push($whereClauses,  $field . $value['operator'] . "?");
	}
	$bindParam->addDynamicType($value['value']);
}
// prepare query statement
$query = "SELECT * FROM commonAttributes WHERE " . implode(' AND ', $whereClauses) . " ORDER BY id ASC LIMIT 10";
echo "<div class='debugOutput'>BUILD M2<pre>$query</pre></div>\n";



// PREPARE AND EXECUTE THE QUERY
echo "<div class='debugOutput'><pre>$query</pre></div>\n";
$result = null;
if($stmt = $conn->prepare($query)){
	// i=integer, d=double, s=string, b=blob
	echo "<div class='debugOutput'>"; print_r($bindParam->get()); echo "</div>\n";
	if($bindParam->get()){
		// dynamically bind parameters
		if(call_user_func_array(array($stmt, 'bind_param'), $bindParam->get())){
			if($stmt->execute()){
				echo "<p>Execute!</p>";
				$result	= $stmt->get_result();
			}else{
				echo "<div class='redText'>failed to execute with dynamic params</div>\n";
			}
		}else{
			echo "<div class='redText'>failed to bind</div>\n";
		}
	}else{
		// no dynamic parameters to bind
		if($stmt->execute()){
			$result	= $stmt->get_result();
		}else{
			echo "<div class='redText'>failed to execute</div>\n";
		}
	}
}else{
	echo "<div class='redText'>failed to prepare</div>\n";
}

// $result will be null if call_user_func_array() or $stmt->execute() failed
if($result){
	// process query results
	$rowCount = $stmt->affected_rows;
	echo "<p class='hint'>" . number_format($rowCount) . " Item" . ($rowCount != 1 ? "s" : "") . "</p>";

	while ($row = $result->fetch_assoc()) {
		$i = $row['item'];
		echo "<p>$i</p>";
	}
}else{
	echo "<div class='redText'>MySQL query failed</div>\n";
}

*/


?>