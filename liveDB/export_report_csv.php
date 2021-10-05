<?php 

session_start();
ob_start();



// download data of report in CSV format
$fn = $_GET['fn'] ?? "";
$rv = $_GET['rv'] ?? "report_values";
include_once("class.export_csv.php");

// create instance of the ExportCSV class
$csv_obj=new ExportCSV($fn, $rv);

// setting values for header row and data of CSV file 
// … which values come from the other file which shows the data
// $csv_obj->setHeaderAndValues($_SESSION['report_header'],$_SESSION['report_values']);

// or just send values as an associative array
// … and let ExportCSV class build header row from keys
$csv_obj->setKeyedData($_SESSION[$rv]); // $rv

// now generate CSV file using provided data and headers
$csv_obj->GenerateCSVfile();

?>
