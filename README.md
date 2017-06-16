## U-On Travel RESTful API Client (unofficial)

A simple client that allows to work with API system U-On Travel.

At this moment the library is still under development and not ready for production.

## Example of usage

    <?php
    require_once __DIR__ . "/vendor/autoload.php";
    
    $_config = require_once __DIR__ . "/config.php";
    $_token = $_config['token'];
    $_users = new \UON\Users($_token);
    
    // Get all users from database
    $users = $_users->all();

See other examples of Users class usage [here](extra/UsersUsage.php).

## Some documents

* [List of API methods](README.API.md) urls of methods with classes
* [Basic examples](README.BASIC.md) of usage written on PHP-Curl library

## Useful links

* [U-On Travel](https://u-on.ru) - Official website
* [U-On Travel API](https://api.u-on.ru/doc) - API documentation
