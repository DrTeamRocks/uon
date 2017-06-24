<?php
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../src/Client.php";
require_once __DIR__ . "/../src/Requests.php";

$_config = require_once __DIR__ . "/../tests/config.php";
$_token = $_config['token'];
$_requests = new \UON\Requests($_token);

// Get request by id
$requests = $_requests->get('1234');

// Get all requests. which were updated in the specified date range
$requestsUpdated = $_requests->updated('2017-06-01', '2017-06-10');

// Get all requests from dates range
$requestsDate = $_requests->date('2017-06-01', '2017-06-10');

// Get all requests from dates range, for some source id
$requestsDateSource = $_requests->date('2017-06-01', '2017-06-10','1');

// Data array of new user (or details for update)
$request = array(
    'r_u_id' => '13',       // Manager ID
    'u_name' => 'text user' // User's full name
);

// Create new user
$requestsCreate = $_requests->create($request);
