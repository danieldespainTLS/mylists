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

$result = $item->read();
$rowCount = $conn->affected_rows;

if($rowCount > 0){
	$items = array();
	while ($row = $result->fetch_assoc()) {
		$i = array(
			'id' => $row['id'],
			'title' => $row['title']
		);

		array_push($items, $i);
	}

	// response code - 200 OK
	http_response_code(200);
	echo json_encode($items);
}else{
	// response code - 404 Not found
	http_response_code(404);
	echo json_encode(array('message' => "No items found."));
}

?>