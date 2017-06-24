## U-On Travel RESTful API Client (unofficial)

A simple client that allows to work with RESTful API of U-On Travel company.

This library is ready for production usage, all source codes provided "as is".

## Example of usage

    <?php
    require_once __DIR__ . "/vendor/autoload.php";
    
    $_config = require_once __DIR__ . "/config.php";
    $_token = $_config['token'];
    $_users = new \UON\Users($_token);
    $_requests = new \UON\Requests($_token);
    $_misc = new \UON\Misc($_token);
    
    // Get a list of all users
    $users = $_users->all();
    // Get user by unique id
    $userId = $_users->get(1);
    
    // Get list of requests
    $requests = $_requests->all();
    
    // Get list of managers
    $managers = $_misc->manager();

See other examples of usage [here](extra) separated by class names.

All available methods of all classes with descriptions you can find [here](README.API.md).

## Note about Unit Tests

To make test, you need an account on the [U-On Travel website](https://u-on.ru/), after registration you
need to get your personal API key from **Settings > API** page.

This token should be placed into the file **tests/config.php**, an example of this file
you can find in the same directory, only with another name [config.example.php](tests/config.example.php),
so you can just copy with rename and place your token inside.

After all this steps you can run `./vendor/bin/phpunit` from source root.
But, please don't run tests on your production account (API token), you can loose some critical data! 

Good luck!

## Some documents

* [List of API methods](README.API.md) urls of methods with classes
* [Basic examples](README.BASIC.md) of usage written on PHP-Curl library

## Useful links

* [U-On Travel](https://u-on.ru) - Official website
* [U-On Travel API](https://api.u-on.ru/doc) - API documentation
