<html>
	<head>
		<title>Page</title>
		<meta name="theme-color" content="#f1fafe">
		<?php require_once("includes/_faviconLinks.php"); ?>
		<link rel="stylesheet" type='text/css' href='styles/css/styles.css' />
		
		<style>
			.classConstructor {
				color: green;
			}
			.classDestructor {
				color: red;
			}
			.brand {
				margin: 1em 0;
			}

			code {
				color: grey;
			}

			.buttonP {
				border: 1px solid black;
				border-radius: 4px;
				padding: 4px;
				font-weight: bold;
				font-family: Helvetica, Arial;
				color: white;
			}
			.redButton {
				background-color: red;
			}
			.blueButton {
				background-color: blue;
			}
		</style>
	</head>

<body>

<?php require_once('includes/header.php'); ?>

<article>
	<h1>Basic Project</h1>





<?php

// composer autoload
require_once(__DIR__ . '/vendor/autoload.php');

session_start();
unset($_SESSION['report_values']);

echo "<p>Usually <em>all</em> <code>use as</code> statements are declared together at the top of the file</p>";
echo "<p><a href='index2.php'>index2 is a simpler starter file</a></p>";
echo "<div class='brand'>";
echo "<h1><code>use Inc as SHOW</code></h1>";
## SHOW will be a 'root' to includes folder (Composer's composer.json tells php that Inc is short for includes directory)
## use SHOW\ClassName::staticMethod()	to call a static function within class
## use $OBJ = new SHOW\ClassName()		to instantiate an object
use Inc as SHOW;
// call a static method in the class without creating an object
echo "<hr /><h2>Call a static method:</h2>";
echo SHOW\ShowName::buildEmailLink("info@teachingstuff.com");
// create and use an object
echo "<hr /><h2>Create & Use an object:</h2>";
$OBJ = new SHOW\ShowName();
$OBJ->setCompanyName("Teaching Stuff");
echo $OBJ->getCompanyName();
echo "</div>";



echo "<div class='brand'>";
echo "<h1><code>use Inc\Counter as COUNT</code></h1>";
## COUNT will be a more direct reference to Counter class inside includes folder
use Inc\Counter as COUNT;
// call a static method in the class without creating an object
echo "<hr /><h2>Call a static method:</h2>";
echo "<p>add two numbers: " . COUNT::addNumbers(3, 5, 9, 13) . "</p>";
// create and use an object
echo "<hr /><h2>Create & Use an object:</h2>";
$C = new COUNT(0);
for($i=0; $i<5; $i++){
	$C->increaseCounter(1);
}
echo "<p>After itterations, counter = " . $C->getCounter() . "</p>";
echo "</div>";


/**
 * Config
 * DEPRECATED
 */
echo "<div class='brand'>";
use Inc\Config;
$config = new Config();
echo "<h1>Site Root from Config is:<br /><code>" . $config->siteRoot . "</code></h1>";
echo "</div>";



/**
 * Settings
 */
echo "<div class='brand'>";
use Inc\Settings;
$settings = new Settings('basic-project', array('environment', 'userSettings-table-name', 'timeout-seconds', 'foobar')); // list all desired environment variables
echo "<h1>All Settings:<br /><code>" . $settings->showApplicationSettings() . "</code></h1>";
echo "<h1>Get One Setting:<br /><code>\$settings-&gt;getEnVar('timeout-seconds')</code><br />" . $settings->getEnVar('timeout-seconds') . "</h1>";
echo "<h2>showDebug is publicly available:<br /><code>\$settings-&gt;showDebug</code></h2>";
if($settings->getEnVar('foobar')){
	echo "<div>foobar is found in settings.</div>";
}else{
	echo "<div>I could not find foobar enironment variable in settings</div>";
}
// $settings->setShowDebug(false);
if($settings->showDebug){
	echo "<div>I am running in show debug mode.</div>";
}else{
	echo "<div>I am NOT running in show debug mode.</div>";
}
echo "</div>";



/**
 * Connections
 * DEPRECATED
 * 
 * use Database object instead
 */
// echo "<div class='brand'>";
// use Inc\Connections;
// $connection = new Connections('basic-project', 'mysql-database'); // looks for connection string named '{{app-name}}_{{connection-string}}'
// $conn = $connection->conn;
// echo "<h1>Connection String:<br /><code>" . $connection->showConnString() . "</code></h1>";
// echo "</div>";



/**
 * Database Object
 */
echo "<div class='brand'>";
use API\Config\Database;
$database = new Database(); // looks for connection string named '{{app-name}}_{{connection-string}}'
$conn = $database->getConn();
echo "<h1>Database Object<br />Connection String:<br /><code>" . $database->connection->showConnString() . "</code></h1>";
echo "</div>";


/**
 * build a COALESCE clause across tables
 */
$clause = $database->connection::buildCoalesceTables(array('tableA', 'tableB'), "field", "none", "firstName");
if($settings->showDebug) echo "<div class='debugOutput'><pre>$clause</pre></div>";


/**
 * Select multiple using a prepared statement (no binding)
 * 
 * includes download report as CSV file
 * 
 */

$query = "SELECT * FROM userSettings LIMIT 25";
if($settings->showDebug) echo "<div class='debugOutput'><pre>$query</pre></div>";
if($result = $conn->query($query)){
	$counter = 0;
	// screen table columns
	$tableColumns = array();
	// common across all locations
	$common = array(
		'name'	=> array("tdl"), 
		'role'	=> array("tdl"), 
	);
	foreach($common as $key => $classes){
		$tableColumns[$key] = $classes;
	}

	// csv file columns
	$csvColumns = array(
		'id'	=> array("tdr") // add this column to CSV
	);
	foreach($tableColumns as $col => $value){
		if($col == 'role') continue; // skip this column in CSV
		$csvColumns[$col] = $col;
	}
	
	$rowCount = $conn->affected_rows;
    echo "<p>" . number_format($rowCount, 0) . " Item" . ($rowCount != 1 ? "s" : "") . "</p>";
	echo "<table border='1' cellpadding='2' cellspacing='0'>";
	while($row = $result->fetch_assoc()){
		$reportRow = array();

		echo "<tr>";
		foreach($tableColumns as $key => $classes){
			echo "<td class='" . join(" ", $classes) . "'>" . $row[$key] . "</td>";
		}
		echo "</tr>";

		// collect fields into row for csv file
		foreach($csvColumns as $key => $head){
			$reportRow[$key] = $row[$key];
		}
		// add row to CSV file download contents
		$_SESSION['report_values'][$counter] = $reportRow;
		$counter++;
	}
	echo "</table>";

	if($counter > 0){
		echo "<p><a href='liveDB/export_report_csv.php?fn=" . "downloadCSV" . "'>Download the report in CSV format.</a></p>";
	}

}else{
	if($settings->showDebug) echo "<div class='debugOutput redText'>Query failed.  (" . $conn->errno . ") " . $conn->error . "</div>";
}



/**
 * Select multiple using a prepared statement (with binding)
 */
$minimumID = 0;
$query = "SELECT * FROM userSettings WHERE id > ? LIMIT 25";
if($settings->showDebug) echo "<div class='debugOutput'><pre>$query</pre></div>";
if($stmt = $conn->prepare($query)){
	// i=integer, d=double, s=string, b=blob
	if($stmt->bind_param("i", $minimumID)){
		if($stmt->execute()){
			$result	= $stmt->get_result();
			$rowCount = $conn->affected_rows;
			echo "<p>" . number_format($rowCount, 0) . " Item" . ($rowCount != 1 ? "s" : "") . "</p>";
			echo "<table border='1' cellpadding='2' cellspacing='0'>";
			while ($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['role'] . "</td></tr>";
			}
			echo "</table>";
		}else{
			printf("mysqli execution Error: %s.\n", $stmt->error);
		}
	}else{
		if($settings->showDebug) echo "<div class='debugOutput redText'>Query preparation failed.  (" . $conn->errno . ") " . $conn->error . "</div>";
	}
}else{
	if($settings->showDebug) echo "<div class='debugOutput redText'>Query preparation failed.  (" . $conn->errno . ") " . $conn->error . "</div>";
}


/**
 * Select with only one result (bound parameters)
 */
$query = "SELECT * FROM userSettings WHERE id = ? LIMIT 1";
if($settings->showDebug) echo "<div class='debugOutput'><pre>$query</pre></div>";
if($stmt = $conn->prepare($query)){
	// i=integer, d=double, s=string, b=blob
	$amount = 20;
	if($stmt->bind_param("i", $amount)){
		if($stmt->execute()){
			$result	= $stmt->get_result();
			$row	= $result->fetch_array(MYSQLI_ASSOC);
			// if($settings->showDebug) echo "<div>Received " . number_format($rowCount, 0) . " user" . ($rowCount != 1 ? "s" : "") . "</div>";
			if($row){
				if($settings->showDebug) echo "<div>Result: (" . $row['id'] . ") " . $row['name'] . " : " . $row['role'] . "</div>";
			}else{
				if($settings->showDebug) echo "<div>ZERO rows returned</div>";
			}
		}else{
			if($settings->showDebug) echo "<div class='debugOutput redText'>Execute failed: (" . $stmt->errno . ") " . $stmt->error . "</div>";
		}
	}else{
		if($settings->showDebug) echo "<div class='debugOutput redText'>Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error . "</div>";
	}
}else{
	if($settings->showDebug) echo "<div class='debugOutput redText'>Prepare failed: (" . $conn->errno . ") " . $conn->error . "</div>";
}

/**
 * Adding one entry using a prepared statement
 */
$query = "INSERT INTO userSettings (name, role) VALUES (?, ?)";
if($settings->showDebug) echo "<div class='debugOutput'><pre>$query</pre></div>";
if($stmt = $conn->prepare($query)){
	$name = "Ian";
	$role = "user";
	// i=integer, d=double, s=string, b=blob
	if($stmt->bind_param("ss", $name, $role)){
		if($stmt->execute()){
			$rowCount = $stmt->affected_rows;
			if($settings->showDebug) echo "<div>Inserted " . number_format($rowCount, 0) . " user" . ($rowCount != 1 ? "s" : "") . "</div>";
		}else{
			if($settings->showDebug) echo "<div class='debugOutput redText'>Execute failed: (" . $stmt->errno . ") " . $stmt->error . "</div>";
		}
	}else{
		if($settings->showDebug) echo "<div class='debugOutput redText'>Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error . "</div>";
	}
}else{
	if($settings->showDebug) echo "<div class='debugOutput redText'>Prepare failed: (" . $conn->errno . ") " . $conn->error . "</div>";
}


/**
 * Adding multiple entries using a prepared statement and a loop
 */
echo "<h4>Multiple inserts using a loop</h4>";
$addThese = array(
	'Juanita'	=> 'customer',
	'Gerald'	=> 'developer'
);
$query = "INSERT INTO userSettings(name, role) VALUES (?, ?)";
if($settings->showDebug) echo "<div class='debugOutput'><pre>$query</pre></div>";
if($stmt = $conn->prepare($query)){
	// i=integer, d=double, s=string, b=blob
	if($stmt->bind_param("ss", $name, $role)){
		foreach($addThese as $name => $role){
			if($stmt->execute()){
				$rowCount = $stmt->affected_rows;
				if($settings->showDebug) echo "<div>Inserted " . number_format($rowCount, 0) . " user" . ($rowCount != 1 ? "s" : "") . ": $name</div>";
			}else{
				if($settings->showDebug) echo "<div class='debugOutput redText'>Execute failed: (" . $stmt->errno . ") " . $stmt->error . "</div>";
			}
		}
	}else{
		if($settings->showDebug) echo "<div class='debugOutput redText'>Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error . "</div>";
	}
}else{
    if($settings->showDebug) echo "<div class='debugOutput redText'>Prepare failed: (" . $conn->errno . ") " . $conn->error . "</div>";
}


/**
 * clean up so database doesn't get huge
 */
$query = "DELETE FROM userSettings WHERE id > 3";
if($settings->showDebug) echo "<div class='debugOutput'><pre>$query</pre></div>";
if($result = $conn->query($query)){
	$rowCount = $conn->affected_rows;
    echo "<p>" . number_format($rowCount, 0) . " Row" . ($rowCount != 1 ? "s" : "") . " deleted</p>";
}else{
	if($settings->showDebug) echo "<div class='debugOutput redText'>Query failed.  (" . $conn->errno . ") " . $conn->error . "</div>";
}

?>





<hr />
<h1>Processing Forms</h1>
<?php

$from   = (isset($_POST['from'])	? $_POST['from']	: "default");
$to     = (isset($_POST['to'])		? $_POST['to']		: "default");
// sanitize
if(! in_array($from, array("default", "safe", "values"))){
	$from = "was_unsafe";
}

?>

<form action='index.php' method="POST" id="basic-project-form" class='brand'>
	<label for='from'>From: </label><input type='text' name='from' value="<?php echo $from; ?>" id='from' />
	<label for='to'>To: </label><input type='text' name='to' value="<?php echo $to; ?>" id='to' />
	
	<input type='submit' value='Submit' />
</form>





<hr />
<p>Make sure everything works in a <a href='subdirectory/index.php'>Subdirectory</a></p>





<hr />
<h1>Javascript & AJAX</h1>
<input type='button' value='click me to load the current time' id='currentTimeTrigger' class='noScreen' />

<p id='loadingTimeDisplay' class='hidden'>loading...</p>
<p>Who likes what, where, when? <span id='currentTimeDisplay'>???</span></p>


<p class='toggleClass buttonP redButton'>Click me to toggle the class assigned to me.</p>
<p class='toggleClass buttonP redButton'>Me too!  I have the same class.</p>

<p id='randomNumber' class='buttonP blueButton'>I will show a random numer every time you click me.</p>


<p>done</p>

</article>

<script src='./scripts/js/basicFunctions-min.js'></script>
<script src='./scripts/js/sampleAjax-min.js'></script>

</body>

</html>