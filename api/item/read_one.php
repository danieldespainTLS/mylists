<?php

use API\Config\Database;
use API\Objects\Item;

// composer autoload
require_once('../../vendor/autoload.php');



// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");



// instantiate database and product object
$database = new Database();
$conn = $database->getConn();
// initialize object
$item = new Item($conn);

// set ID property of record to read
$item->id = isset($_GET['id']) ? $_GET['id'] : die();

$result = $item->readOne();

if($item->title != null){
	$i = array(
		'id' => $item->id,
		'title' => $item->title
	);

	// response code - 200 OK
	http_response_code(200);
	echo json_encode($i);
}else{
	// response code - 404 Not found
	http_response_code(404);
	echo json_encode(array('message' => "Item does not exist."));
}

?>