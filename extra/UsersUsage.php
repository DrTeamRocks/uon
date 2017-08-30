<?php
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../src/Client.php";
require_once __DIR__ . "/../src/Users.php";
require_once __DIR__ . "/../extra/config.php";

$_users = new \UON\Users();

// Get all users from database
$users = $_users->all();

// Get single user by ID
$userById = $_users->get('1234');

// Get single user by phone number
$userByPhone = $_users->phone('123456789');

// Get all users. profiles which were updated in the specified date range
$usersUpdated = $_users->updated('2017-06-01', '2017-06-10');

// Data array of new user (or details for update)
$user = array(
    'u_name' => 'text user'
);

// Create new user
$usersCreate = $_users->create($user);

// Update user detail by ID
$usersUpdate = $_users->update('1234', $user);
