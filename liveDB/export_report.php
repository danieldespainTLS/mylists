<?php session_start(); ob_start();

#### Roshan's very simple code to export data to excel   
#### Copyright reserved to Roshan Bhattarai - nepaliboy007@yahoo.com
#### if you have any problem contact me at http://roshanbh.com.np
#### feel free to visit my blog http://php-ajax-guru.blogspot.com

	// download data of report in excel format
	$fn=$_GET['fn'].".xls";
	include_once("class.export_excel.php");
	
	// create instance of the ExportExcel class
	$excel_obj=new ExportExcel("$fn");
	
	// setting values of headers and data of excle file 
	// and these values comes from the other file which file shows the data
	$excel_obj->setHeadersAndValues($_SESSION['report_header'], $_SESSION['report_values']); 
	
	// now generate excel file using provided data and headers
	$excel_obj->GenerateExcelFile();
	
	//print_r($_SESSION['report_values']);

?>
