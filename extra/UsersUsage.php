<?php
require_once __DIR__ . '/../vendor/autoload.php';

$config = new \UON\Config();
$config
    ->set('token', 'YOUR_TOKEN')
    ->set('timeout', 10);

$uon = new \UON\API($config);

// Get all users from database
$users = $uon->users->all();

// Get single user by ID
$user = $uon->users->get('1234');

// Get single user by phone number
$userByPhone = $uon->users->getPhone('123456789');

// Get all users. profiles which were updated in the specified date range
$updated = $uon->users->getUpdated('2017-06-01', '2017-06-10');

// Data array of new user (or details for update)
$user = [
    'u_name' => 'text user'
];

// Create new user
$create = $uon->users->create($user);

// Update user detail by ID
$update = $uon->users->update('1234', $user);
