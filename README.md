![U-On Travel Logo](u-on.png)

[![Latest Stable Version](https://poser.pugx.org/drteam/uon/v/stable)](https://packagist.org/packages/drteam/uon)
[![Build Status](https://travis-ci.org/DrTeamRocks/uon.svg?branch=master)](https://travis-ci.org/DrTeamRocks/uon)
[![Total Downloads](https://poser.pugx.org/drteam/uon/downloads)](https://packagist.org/packages/drteam/uon)
[![License](https://poser.pugx.org/drteam/uon/license)](https://packagist.org/packages/drteam/uon)
[![PHP 7 ready](https://php7ready.timesplinter.ch/DrTeamRocks/uon/master/badge.svg)](https://travis-ci.org/DrTeamRocks/uon)
[![Code Climate](https://codeclimate.com/github/DrTeamRocks/uon/badges/gpa.svg)](https://codeclimate.com/github/DrTeamRocks/uon)
[![Scrutinizer CQ](https://scrutinizer-ci.com/g/drteamrocks/uon/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/drteamrocks/uon/)

# U-On Travel RESTful API Client (unofficial)

A simple client that allows to work with RESTful API of U-On Travel company.

    composer require drteam/uon

This library is ready for production usage, all source codes provided "as is".

## Example of usage

```php
<?php
require_once __DIR__ . "/../vendor/autoload.php";

// Class with configuration options
$config = new \UON\Config();
$config
    ->set('token', 'some_token')
    ->set('timeout', 10);

// Main object for work with API
$uon = new \UON\API($config);

// Some examples
$users = $uon->users->all();            // Get a list of all users
$user = $uon->users->get(1);            // Get user by unique id
$request = $uon->requests->get(1);      // Get request by unique ID
$managers = $uon->misc->getManagers();  // Get list of managers
```

See other examples of usage [here](extra) separated by class names.

All available methods of all classes with descriptions you can find [here](README.API.md).

## How to get API token

You need login into your account, then go to the
**Settings > API and WebHooks** page and copy token code from API block.

## How to help to project

If you have a desire, you can help with testing and bugs hunting or
make some donation.

## Useful links

* [U-On Travel](https://u-on.ru) - Official website
* [U-On Travel API](https://api.u-on.ru/doc) - API documentation
* [Basic examples by U-On team](README.BASIC.md) of usage written on PHP-Curl library
