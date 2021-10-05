<?php

namespace API\Objects;

//FIXME: Remove ERROR Display from production code!
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use API\Config\BindParam;

Class Item {
	private $conn; // database connection object
	
	private $table_name = "items";

	public $id;
	public $item;
	public $title;

	function __construct(object $conn){
		$this->conn = $conn;
	}



	// create item
	public function create() : bool {
		// prepare query statement
		//FIXME: id=LAST_INSERT_ID(id) generates odd gaps in id sequence: id=8 … update, update update … next insert will be 12
		$query = "INSERT INTO " . $this->table_name . " (title) VALUES(?) ON DUPLICATE KEY UPDATE title = ?, id=LAST_INSERT_ID(id)";
		// echo "<div class='debugOutput'><pre>$query</pre></div>";
		if($stmt = $this->conn->prepare($query)){
			// i=integer, d=double, s=string, b=blob
			if($stmt->bind_param("ss", $this->title, $this->title)){
				if($stmt->execute()){
					$this->id = $stmt->insert_id;
					$afterInsert = new Item($this->conn);
					$afterInsert->id = $this->id;
					$capture = $afterInsert->readOne();
					if($capture === true){
						$this->item		= $afterInsert->item;
						$this->title	= $afterInsert->title;
						return true;
					}else{
						return false;
					}
				}else{
					// printf("mysqli Error: %s.\n", $stmt->error);
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}



	// read items
	public function read() : object {
		// prepare query statement
		$query = "SELECT * FROM " . $this->table_name . " ORDER BY title ASC";
		// echo "<div class='debugOutput'><pre>$query</pre></div>";

		$result = $this->conn->query($query);
	
		return $result;
	}


	// read one item
	public function readOne() : bool {
		// prepare query statement
		$query = "SELECT * FROM " . $this->table_name . " WHERE id=? LIMIT 1";
		// echo "<div class='debugOutput'><pre>$query</pre></div>";
		if($stmt = $this->conn->prepare($query)){
			// i=integer, d=double, s=string, b=blob
			if($stmt->bind_param("s", $this->id)){
				if($stmt->execute()){
					$result	= $stmt->get_result();
					$row	= $result->fetch_array(MYSQLI_ASSOC);
					if($row){
						$this->id		= $row['id'];
						$this->title	= $row['title'];
						return true;
					}else{
						return false; // zero results
					}
				}else{
					// printf("mysqli Error: %s.\n", $stmt->error);
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}



	// find item(s) by given criteria/fields
	/**
	 * @param array $criteria key=>value pair for haystack_Db_field_name=>needle_value
	 * @return array|null of id's that match criteria
	 */
	public function findDuplicates(array $criteria) : ?array {
		$found = array();

		$whereClauses	= array();
		$bindParam		= new BindParam();
		foreach($criteria as $field => &$value){
			array_push($whereClauses,  $field . "=?");
			if(preg_match("/^[0-9.]+$/", $value) && preg_match("/[.]{1}/", $value)){
				$bindParam->add('d', $value);
			}else if(preg_match("/^[0-9]+$/", $value)){
				$bindParam->add('i', $value);
			}else {
				$bindParam->add('s', $value);
			}
		}
		// prepare query statement
		$query = "SELECT * FROM " . $this->table_name . " WHERE " . implode(' AND ', $whereClauses) . " ORDER BY id ASC";
		// echo "<div class='debugOutput'><pre>$query</pre></div>\n";
		if($stmt = $this->conn->prepare($query)){
			// i=integer, d=double, s=string, b=blob
			// print_r($bindParam->get()); echo "\n";
			if(call_user_func_array(array($stmt, 'bind_param'), $bindParam->get())){
				if($stmt->execute()){
					$result	= $stmt->get_result();
					$rowCount = $stmt->affected_rows;
					// echo "$rowCount counted\n";
					if($rowCount > 0){
						while ($row = $result->fetch_assoc()) {
							$i = array('id' => $row['id']);
							foreach($criteria as $field => $value){
								$i[$field] = $row[$field];
							}
							$found[] = $i;
						}
					}else{
						return null;
					}
				}else{
					// printf("mysqli Error: %s.\n", $stmt->error);
					return null;
				}
			}else{
				return null;
			}
		}else{
			return null;
		}

		return $found;
	}



	// update item
	public function update(){
		// prepare query statement
		$query = "UPDATE " . $this->table_name . " SET title = ? WHERE id = ?";
		// echo "<div class='debugOutput'><pre>$query</pre></div>";
		if($stmt = $this->conn->prepare($query)){
			// i=integer, d=double, s=string, b=blob
			if($stmt->bind_param("si", $this->title, $this->id)){
				if($stmt->execute()){
					$this->id = $stmt->insert_id;
					return true;
				}else{
					// printf("mysqli Error: %s.\n", $stmt->error);
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}



	// delete item
	public function delete() : bool {
		// prepare query statement
		$query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
		// echo "<div class='debugOutput'><pre>$query</pre></div>";
		if($stmt = $this->conn->prepare($query)){
			// i=integer, d=double, s=string, b=blob
			if($stmt->bind_param("i", $this->id)){
				if($stmt->execute()){
					echo "affected rows=" . $stmt->affected_rows;
					return true;
				}else{
					// printf("mysqli Error: %s.\n", $stmt->error);
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}

?>