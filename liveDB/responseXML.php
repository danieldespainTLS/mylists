<?php

	header('Content-Type: text/xml');
	header("Cache-Control: no-cache, must-revalidate");

	// A date in the past
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	$debug = "";
	
	
	// connect
	require_once($_SERVER['DOCUMENT_ROOT'].'/catalog/SQL_lib.php');
	$dbConnection = SQL_connect_PDO();
	
	
	$q = (array_key_exists('p',	$_GET)	? $_GET['p']	: "");
	
	
	// sanitize variables from SQL and XSS (Javascript) Injections
	$q	= preg_replace("/[^0-9]/", "", $q);

	
	$stmt = $dbConnection->prepare("SELECT 
										* 
									FROM 
										inventory 
									WHERE 
										UPC = :upc 
									LIMIT 1
									");
	$stmt->bindParam(':upc', $q);

	if($stmt->execute()){
		$affected	= $stmt->rowCount();
		$row		= $stmt->fetch(PDO::FETCH_ASSOC);
		if($affected > 0){
			$style			= $row['Style'];
			$vendorNo		= $row['Vendor_No'];
			$title			= $row['Title'];
			$price			= $row['Price'];
		}
	}
	
	// return (done as an echo) the result as a XML 'document'
	echo "<?xml version='1.0' encoding='ISO-8859-1' " . "?" . ">";

	// start the record being returned
	echo "<item>";
	
	// details about record being returned
	echo "\t<styleID>"		. (isset($style) 		? $style		: "") . "</styleID>";
	echo "\t<vendor>"		. (isset($vendorNo)		? $vendorNo		: "") . "</vendor>";
	echo "\t<title>"		. (isset($title)		? $title		: "") . "</title>";
	echo "\t<price>"		. (isset($price)		? $price		: "") . "</price>";

	echo "</item>";	// end record

	$dbConnection = null;

?>