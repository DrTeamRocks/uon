![U-On Travel Logo](extra/u-on.png)

# U-On Travel RESTful API Client (unofficial)

A simple client that allows to work with RESTful API of U-On Travel company.

    composer require drteam/uon

This library is ready for production usage, all source codes provided "as is".

## Example of usage

```php
<?php
require_once __DIR__ . "/vendor/autoload.php";

// Your personal API token
define("UON_API_TOKEN", "[YOUR_API_TOKEN]");

$_users = new \UON\Users();
$_requests = new \UON\Requests();
$_misc = new \UON\Misc();

// Get a list of all users
$users = $_users->all();
// Get user by unique id
$userId = $_users->get(1);

// Get request by unique ID
$requests = $_requests->get(1);

// Get list of managers
$managers = $_misc->getManagers();
```

See other examples of usage [here](extra) separated by class names.

All available methods of all classes with descriptions you can find [here](README.API.md).

## How to get API token

You need login into your account, then go to the  **Settings > API and WebHooks** page and copy token code from API block.

## Note about Unit Tests

Token should be placed into the file **extra/config.php**, an example of this file
you can find in the same directory, only with another name [config.example.php](extra/config.example.php),
so you can just copy with rename and place your token inside.

After all this steps you can run `./vendor/bin/phpunit` from source root.
But, please don't run tests on your production account (API token), you can loose some critical data! 

Good luck!

## How to help to project

If you have a desire, you can help with testing and bugs hunting or make some donation.

## Some documents

* [List of API methods](README.API.md) urls of methods with classes
* [Basic examples](README.BASIC.md) of usage written on PHP-Curl library

## Useful links

* [U-On Travel](https://u-on.ru) - Official website
* [U-On Travel API](https://api.u-on.ru/doc) - API documentation
