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



// instantiate database and item object
$database = new Database();
$conn = $database->getConn();
// initialize object
$item = new Item($conn);



// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if(! empty($data->id)){

	// ensure item exists before updating it
	$itemTest       = new Item($conn);
	$itemTest->id   = $data->id;
	$itemFound      = $itemTest->readOne();

    if($itemFound){
        // set item property values
        $item->id = $data->id;
   
        // create item
        if($item->delete()){
            // response code - 200 ok
            http_response_code(200);
            echo json_encode(
                array(
                    'message'   => "Item was deleted.",
                    'id'        => $item->id,
                    )
            );
        }else{
            // response code - 503 service unavailable
            http_response_code(503);
            echo json_encode(array('message' => "Unable to delete item."));
        }
    }else{
		// response code - 404 Not found
		http_response_code(404);
		echo json_encode(
            array(
                'message'   => "Item does not exist.",
                'id'        => $data->id,
                )
        );
	}
}else{
	// response code - 400 bad request
	http_response_code(400);
	echo json_encode(array('message' => "Item could not be deleted.  Data is incomplete."));
}

?>