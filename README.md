![U-On Travel Logo](assets/u-on.png)

[![Latest Stable Version](https://poser.pugx.org/drteam/uon/v/stable)](https://packagist.org/packages/drteam/uon)
[![Tests](https://github.com/DrTeamRocks/uon/actions/workflows/tests.yml/badge.svg)](https://github.com/DrTeamRocks/uon/actions/workflows/tests.yml)
[![Total Downloads](https://poser.pugx.org/drteam/uon/downloads)](https://packagist.org/packages/drteam/uon)
[![License](https://poser.pugx.org/drteam/uon/license)](https://packagist.org/packages/drteam/uon)

# U-On Travel API Client (unofficial)

A simple client that allows to work with API of U-On Travel company.

```shell
composer require drteam/uon
```

This library is ready for production usage, all source codes provided "as is".

## Requirements

* PHP >= 7.4 (tested on 7.4, 8.0, 8.1, 8.2, 8.3, 8.4 and 8.5)
* ext-curl, ext-json
* guzzlehttp/guzzle ^7.4

## How to use

### Basic example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

// Main object for work with API
$uon = new \Uon\Client(['token' => 'some_token']);

// Some examples
$users    = $uon->users->all();        // Get a list of all users
$user     = $uon->users->get(1);       // Get user by unique id
$request  = $uon->requests->get(1);    // Get request by unique ID
$managers = $uon->managers->all();     // Get list of managers
```

See other examples of usage [here](extra) separated by class names.

All available methods of all classes with descriptions you can find [here](README.API.md).

### How to configure the client

```php
// Enable config class
use \Uon\Config;

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

Object of Config should be added as parameter of client:

```php
use \Uon\Config;
use \Uon\Client;

$config = new Config([
    'token'   => 'some_token',
    'timeout' => 10
]);

$client = new Client($config);
```

But you also can use array of parameters:

```php
use \Uon\Client;

$client = new Client([
    'token'   => 'some_token',
    'timeout' => 10
]);
```

If you want to create Client object with default parameters:

```php
use \Uon\Client;

$client = new Client(['token' => 'some_token']);
```

### Available parameters of configuration

| Parameter       | Type     | Default                | Description |
|-----------------|----------|------------------------|-------------|
| token           | string   | _(required)_           | Token for work with the system |
| format          | string   | `json`                 | Response format, `json` or `xml` |
| timeout         | int      | `20`                   | Seconds to wait for the server answer |
| tries           | int      | `2`                    | Count of tries if server answers with 429 error code |
| seconds         | int      | `10`                   | Seconds to wait between tries |
| base_uri        | string   | `https://api.u-on.ru`  | Base URL of the API |
| user_agent      | string   | `U-On PHP Client v2.x` | User-Agent header sent with each request |
| proxy           | string   | _(none)_               | Proxy URL passed to Guzzle |
| handler         | callable | _(none)_               | Custom Guzzle handler, mainly for testing |
| track_redirects | bool     | `false`                | Track redirects via Guzzle |
| debug           | bool     | `false`                | Enable Guzzle debug output |
| verbose         | bool     | `false`                | Dump each request endpoint and its parameters |

Any other parameter name will throw a `UonParameterNotAllowedException`.

```php
$config = new \Uon\Config([
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
**Settings > Integrations > API / WebHooks** page, create a key (tick the POST
and GET checkboxes) and copy the token code from the API block.

## Running tests

The `Unit` and `Feature` suites are fully mocked via Guzzle's `MockHandler`, so
they run offline and do not touch the real U-On API nor require a valid token.

```shell
composer install
vendor/bin/phpunit --testsuite Unit,Feature
```

The `E2E` suite performs read-only calls against the real API. It is skipped
unless a token is provided through the `UON_API_TOKEN` environment variable:

```shell
UON_API_TOKEN=your_real_token vendor/bin/phpunit --testsuite E2E
```

Static analysis and linting are available too:

```shell
vendor/bin/parallel-lint src tests
vendor/bin/phpstan analyse
```

## How to help to project

If you have a desire, you can help with testing and bugs hunting or
make some [donation](https://www.donationalerts.ru/r/evilfreelancer).

## Useful links

* [U-On Travel](https://u-on.ru) - Official website
* [U-On Travel API](https://api.u-on.ru/doc) - API documentation
* [Basic examples by U-On team](README.BASIC.md) of usage written on PHP-Curl library
