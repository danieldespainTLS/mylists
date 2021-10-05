<?php

use API\Config\Database;
use API\Objects\Item;

// composer autoload
require_once('../../vendor/autoload.php');



// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// FIXME: REMOVE ERROR DISPLAY!!
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



// instantiate database and item object
$database = new Database();
$conn = $database->getConn();
// initialize object
$item = new Item($conn);



// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if(! empty($data->title)){

	// upsert if it already exists
	$existingItem = new Item($conn);
	$existingItem->title = $data->title;
	$exists = $existingItem->findDuplicates(array('title'=>$data->title));
	
	if(! $exists){
		// set item property values
		$item->title = $data->title;
		
		// create item
		if($item->create()){
			// response code - 201 created
			http_response_code(201);
			echo json_encode(
				array(
					'message'	=> "Item was created.",
					'id'		=> $item->id,
					'title'		=> $item->title,
				)
			);
		}else{
			// response code - 503 service unavailable
			http_response_code(503);
			echo json_encode(array('message' => "Unable to create item."));
		}
	}else{
		// response code - 200 success
		// return results of existing item(s) -- could be more than one existing item
		$matches = array();
		foreach($exists as $duplicate){
			$matches[] = $duplicate;
		}
		http_response_code(200);
		echo json_encode(
			array(
				'message'	=> "Item already exists.",
				'matches'	=> $matches,
			)
		);
	}
}else{
	// response code - 400 bad request
	http_response_code(400);
	echo json_encode(array('message' => "Item could not be created.  Data is incomplete."));
}

?>