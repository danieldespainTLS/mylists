<?php

// namespace ExportCSV;

#### Roshan's very simple code adapted by Daniel Despain to export data to CSV
#### Based on the work of Roshan Bhattarai - nepaliboy007@yahoo.com

class ExportCSV{
	// variable of the class
	var $titles     	= array();
	var $allValues  	= array();
	var $fileName		= "";
	var $reportValues	= "report_values";
	private $fhandle;
	
	
	
	// constructor
	function __construct(string $fileName = "", string $reportValues = "") {
		$this->fhandle = fopen("php://output", "wb");

        // sanitize
        $fileName		= preg_replace("/[^A-Za-z0-9\-\_]/", "", $fileName);
        $reportValues	= preg_replace("/[^A-Za-z0-9\-\_]/", "", $reportValues);

        if(! $fileName || $fileName == ""){
            $fileName = md5(uniqid() . microtime(TRUE) . mt_rand());
        }

		$this->fileName		= $fileName . ".csv";

		// if custom reportValues string was sent, use it.  Otherwise keep property's default
		if($reportValues){
			$this->reportValues	= $reportValues;
		}
	}

	function ExportCSV(string $fileName = "", string $reportValues = ""){
		self::__construct($fileName);
	}
	
	
	
	// set header row data and value rows
	function setHeaderAndValues(array $headerRow, array $allValues) : void {
		$this->titles		= $headerRow;
		$this->allValues	= $allValues;
	}



	function setKeyedData(array $arrayWithKeys) : void {
		$this->allValues = $_SESSION[$this->reportValues];
		// $this->allValues = $arrayWithKeys;
	}
	
	
	
	// function to generate CSV file
	function GenerateCSVfile() : void {
		header("Content-type: text/csv");
		header("Content-Disposition: attachment; filename=" . $this->fileName);
		header("Pragma: no-cache");
		header("Expires: 0");

		// header row comes from $this->titles or from allValues array keys
		if(! is_array($this->allValues)){
			fputcsv($this->fhandle, array("Empty data"));
		}else{
			if(count($this->titles) > 0){
				fputcsv($this->fhandle, $this->titles);
			}else if(array_values($this->allValues[0]) !== $this->allValues[0]){
				fputcsv($this->fhandle, array_keys($this->allValues[0]));
			}
	
			// data rows
			if(count($this->allValues) < 1){
				fputcsv($this->fhandle, array("No data"));
			}else{
				foreach($this->allValues as $row){
					fputcsv($this->fhandle, $row); // here you can add fputcsv() parameters for delimiter, enclosure, escape_char
				}
			}
		}

		fclose($this->fhandle);
	}
}

?>
