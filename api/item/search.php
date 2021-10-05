<?php

use API\Config\Database;
use API\Objects\Item;

// composer autoload
require_once(__DIR__ . '/vendor/autoload.php');



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
if(! empty($data->id) && ! empty($data->title)){
}