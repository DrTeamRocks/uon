<?php
require_once __DIR__ . "/../vendor/autoload.php";

// Your personal API token
$token = "[YOUR_API_TOKEN]";
define("UON_API_TOKEN", $token);

$_users = new \UON\Users();
$_requests = new \UON\Requests();

// You also can create any class with your tocken as argument
$_misc = new \UON\Misc($token);

// Get a list of all users
$users = $_users->all();
// Get user by unique id
$userId = $_users->get(1);

// Get request by unique ID
$requests = $_requests->get(1);

// Get list of managers
$managers = $_misc->getManagers();
