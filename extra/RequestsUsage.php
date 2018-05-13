<?php
require_once __DIR__ . '/../vendor/autoload.php';

$config = new \UON\Config();
$config
    ->set('token', file_get_contents(__DIR__ . '/../tests/_token.txt'))
    ->set('timeout', 10);

$uon = new \UON\API($config);

// Get request by id
$request = $uon->requests->get('1234');

// Get all requests. which were updated in the specified date range
$updated = $uon->requests->getUpdated('2018-03-01', '2018-03-30');

// Get all requests from dates range
$date = $uon->requests->getDate('2018-03-01', '2018-03-30');

// Get all requests from dates range, for some source id
$dateSource = $uon->requests->getDate('2017-06-01', '2017-06-10', '1');

// Get the document, for this need to know IDs of template and request
$doc = $uon->requests->getDocument([
    'template_id' => '45',
    'request_id' => '69',
]);

// Data array of new user (or details for update)
$request = [
    'r_u_id' => '13',       // Manager ID
    'u_name' => 'text user' // User's full name
];

// Create new user
$create = $uon->requests->create($request);
