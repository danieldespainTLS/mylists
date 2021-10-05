<?php session_start(); ?>


<?php 

echo <<<END

<html><head><title>Export to Excel</title></head>

<body>

<table border=1><tr><td>a</td><td>b</td></tr></table>

END;


#### Roshan's very simple code to export data to excel   
#### Copyright reserved to Roshan Bhattarai - nepaliboy007@yahoo.com
#### if you have any problem contact me at http://roshanbh.com.np
#### feel free to visit my blog http://php-ajax-guru.blogspot.com
	
	// don't forget <?php session_start(); as the first line in the file

	//first of all unset these variables
	unset($_SESSION['report_header']);
	unset($_SESSION['report_values']);
	//note that the header contain the three columns and its a array
	$_SESSION['report_header']=array("Name","Email","Country"); 
	
	// now the excel data field should be two dimentational array with three column
	for($i=0;$i<=4;$i++) //loop through the needed cycle
	{
		$_SESSION['report_values'][$i][0]="Michael";
		$_SESSION['report_values'][$i][1]="michael@yahoo.com";
		$_SESSION['report_values'][$i][2]="Nepal";
		
	}

?>

<a href="export_report.php?fn=member_report">Right-Click here and choose "Download Linked file As..." 
to download the report in Excel format.</a>

<!-- export_report.php takes one variable called 'fn' which is name of the file to be generated. -->




</body>

</html>