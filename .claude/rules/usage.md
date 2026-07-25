---
description: How to consume the library from application code
---

# Using the client

## Construct

```php
$uon = new \Uon\Client(['token' => 'your_token']);
// or build a \Uon\Config first and pass it to the client
```

## Call endpoints

Access endpoints as properties; each returns a JSON-decoded `stdClass`:

```php
$uon->users->all();          // GET list of users
$uon->users->get(1);         // GET user by id
$uon->requests->create([...]); // POST a new request
```

Full method list is in `README.API.md`. Runnable examples are in `extra/`.

## Pagination

Listing GET methods take a `$page` (default 1) and return at most 100 items per
page. Loop, incrementing the page, until a page returns fewer than 100 items.

## Configuration

Allowed keys are enforced by `Config::ALLOWED`; an unknown key throws
`UonParameterNotAllowedException`. Common keys: `token`, `format` (`json`/`xml`),
`timeout`, `tries`, `seconds`, and `verify` (set to `false` to disable SSL
verification when the remote certificate is broken).

## Errors

Every failure throws a `Uon\Exceptions\*` type (each extends `\ErrorException`):
empty response, HTTP client error, too many requests, missing or not-allowed
parameter.

## Token

In the U-On account: Settings > Integrations > API / WebHooks, create a key with
POST and GET enabled.
