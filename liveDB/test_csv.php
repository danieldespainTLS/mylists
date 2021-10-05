<?php session_start(); ?>

<html><head><title>Export to Excel</title></head>

<body>
	
	<table border='1'><tr><td>a</td><td>b</td></tr></table>
	
	
<?php 

// don't forget <?php session_start(); as the first line in the file



/** 
 * Two ways to use this:
 * 
 *	1)	Set the session[header] and the session[values]
 * 		export_report_csv.php will pull in both
 * 	2)	Set only the session[values]
 * 		… as an associative array
 * 		ignore (don't set) session[header]
 * 		export_report_csv.php will use keys for header row
 */



// first of all unset these variables
unset($_SESSION['report_header']);
unset($_SESSION['report_values']);

$sampleDataK = array(
	array(
		'Name'		=> "Michelle has \"Pumpkin\" feet.",
		'Email'		=> "mrd@yahoo.com",
		'Company'	=> "Cool Cats",
		'sku'		=> "978012345678"
	), 
	array(
		'Name'		=> "Daniel's Lobster",
		'Email'		=> "daniel@gmail.com",
		'Company'	=> "Hot Dog",
		'sku'		=> "978012345678"
	), 
	array(
		'Name'		=> "Ian",
		'Email'		=> "russian_hydra.com",
		'Company'	=> "Snake Oil Inc.",
		'sku'		=> "978012345678"
	), 
);
$sampleData = array(
	array(
		"Michelle has \"Pumpkin\" feet.",
		"mrd@yahoo.com",
		"Cool Cats",
		"978012345678"
	), 
	array(
		"Daniel's Lobster",
		"daniel@gmail.com",
		"Hot Dog",
		"978012345678"
	), 
	array(
		"Ian",
		"russian_hydra.com",
		"Snake Oil Inc.",
		"978012345678"
	), 
);

// if data array is an associative array, build header from keys
if(array_values($sampleDataK[0]) !== $sampleDataK[0]){
	echo "assoc.";
	$col = 0;
	foreach($sampleData[0] as $key => $value){
		$_SESSION['report_header'][$col] = $key;
		$col++;
	}
}

// now the excel data field should be two dimentational array with three column
for($row=0; $row<=count($sampleData); $row++){
	$col = 0;
	foreach($sampleData[$row] as $key => $value){
		$_SESSION['report_values'][$row][$col] = $value;
		$col++;
	}
}

?>

<a href="export_report_csv.php?fn=member_report">Click here to download the report in CSV format.</a>

<!-- export_report.php takes one variable called 'fn' which is name of the file to be generated. -->




</body>

</html>