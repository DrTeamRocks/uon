![U-On Travel Logo](u-on.png)

[![Latest Stable Version](https://poser.pugx.org/drteam/uon/v/stable)](https://packagist.org/packages/drteam/uon)
[![Build Status](https://travis-ci.org/DrTeamRocks/uon.svg?branch=master)](https://travis-ci.org/DrTeamRocks/uon)
[![Total Downloads](https://poser.pugx.org/drteam/uon/downloads)](https://packagist.org/packages/drteam/uon)
[![License](https://poser.pugx.org/drteam/uon/license)](https://packagist.org/packages/drteam/uon)
[![PHP 7 ready](https://php7ready.timesplinter.ch/DrTeamRocks/uon/master/badge.svg)](https://travis-ci.org/DrTeamRocks/uon)
[![Code Climate](https://codeclimate.com/github/DrTeamRocks/uon/badges/gpa.svg)](https://codeclimate.com/github/DrTeamRocks/uon)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/DrTeamRocks/uon/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/DrTeamRocks/uon/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/DrTeamRocks/uon/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/DrTeamRocks/uon/?branch=master)

# U-On Travel RESTful API Client (unofficial)

A simple client that allows to work with RESTful API of U-On Travel company.

    composer require drteam/uon

This library is ready for production usage, all source codes provided "as is".

About [migration to 1.8](https://github.com/DrTeamRocks/uon/wiki/Миграция-с-1.7-(и-ниже)-на-1.8-(и-выше)).

## How to use

### Basic example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

// Main object for work with API
$uon = new \UON\API('some_token');

// Some examples
$users    = $uon->users->all();        // Get a list of all users
$user     = $uon->users->get(1);       // Get user by unique id
$request  = $uon->requests->get(1);    // Get request by unique ID
$managers = $uon->misc->getManagers(); // Get list of managers
```

See other examples of usage [here](extra) separated by class names.

All available methods of all classes with descriptions you can find [here](README.API.md).

### How to configure the client

```php
// Enable config class
use \UON\Config;

// Class with configuration options
$config = new Config();
$config
    ->set('token', 'some_token')
    ->set('timeout', 10);

// Or like this
$config = new Config([
    'token'   => 'some_token',
    'timeout' => 10
]);
```

Object of Config should be added as parameter of API client:

```php
use \UON\Config;
use \UON\API;

$config = new Config([
    'token'   => 'some_token',
    'timeout' => 10
]);

$client = new API($config);
```

But you also can use array of parameters:

```php
use \UON\API;

$client = new API([
    'token'   => 'some_token',
    'timeout' => 10
]);
```

If you want create API object with default parameters:

```php
use \UON\API;

$client = new API('some_token');
```

### Available parameters of configuration

| Parameter       | Type   | Default | Description |
|-----------------|--------|---------|-------------|
| token           | string |         | Token for work with system |
| timeout         | int    | 1       | Timeout which client must wait answer from server |
| allow_redirects | bool   | true    | Allow redirection from one url to another |
| http_errors     | bool   | false   | Enable http errors instead Exceptions |
| decode_content  | bool   | true    | If you need decode content by server |
| verify          | bool   | true    | Content verification |
| cookies         | int    | 10      | Use cookies |
| tries           | int    | 10      | Count of tries if server answer 429 error code |
| seconds         | int    | 1       | Time which need wait between tries |

```php
$config = new \UON\Config([
    'token'   => 'some_token',
    'timeout' => 100,
    'tries'   => 20,
    'seconds' => 2
]);
```

### About the page

Some GET methods have a `$page` parameter (with default state `1`),
and you can get only `100` items for one time it `$page` parameter is exist.

List of endpoints which have a `$page` parameter.

* /catalog-service/
* /cities/
* /hotels/
* /leads/$date_from/$date_to/
* /leads/$date_from/$date_to/$id_sources/
* /lead-by-client/$id_lead/
* /payment/list/
* /request-action/
* /requests/updated/
* /suppliers/
* /users/
* /user/updated/

These (I mean `$page`) parameter was added by API developers to reduce
the load on the server. So, do not worry if you see only 100 items in
result messages you just need write loop to get all items from API,
like this:

```php
$results = [];

$i=1;
while (true) { // yeah, I know it's bad, better to use recursion
    $response  = $uon->requests->get($i);
    $results[] = $response;

    // Exit from loop if less than 100 items in answer from server
    if (count($response->message) < 100) {
        break;
    }
    $i++;
}
print_r($results);
```

## How to get API token

You need login into your account, then go to the
**Settings > API and WebHooks** page and copy token code from API block.

## How to help to project

If you have a desire, you can help with testing and bugs hunting or
make some [donation](https://www.donationalerts.ru/r/evilfreelancer).

## Useful links

* [U-On Travel](https://u-on.ru) - Official website
* [U-On Travel API](https://api.u-on.ru/doc) - API documentation
* [Basic examples by U-On team](README.BASIC.md) of usage written on PHP-Curl library
