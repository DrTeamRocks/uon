<?php
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../src/Client.php";
require_once __DIR__ . "/../src/Requests.php";
require_once __DIR__ . "/../extra/config.php";

$_requests = new \UON\Requests();

// Get request by id
$requests = $_requests->get('1234');

// Get all requests. which were updated in the specified date range
$requestsUpdated = $_requests->getUpdated('2017-06-01', '2017-06-10');

// Get all requests from dates range
$requestsDate = $_requests->getDate('2017-06-01', '2017-06-10');

// Get all requests from dates range, for some source id
$requestsDateSource = $_requests->getDate('2017-06-01', '2017-06-10','1');

// Data array of new user (or details for update)
$request = array(
    'r_u_id' => '13',       // Manager ID
    'u_name' => 'text user' // User's full name
);

// Create new user
$requestsCreate = $_requests->create($request);
