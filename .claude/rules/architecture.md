---
description: Layers, modules and allowed dependencies of the U-On client
---

# Architecture

The library is a thin, layered REST client. Build and change it from the lowest
layer up; a layer may only depend on layers below it.

## Layers (lowest first)

1. `src/Interfaces/` - `ClientInterface`, `ConfigInterface`. Contracts only, no deps.
2. `src/Exceptions/` - all extend `\ErrorException`. No project deps.
3. `src/Config.php` - parameter bag with an allow-list (`Config::ALLOWED`) and
   `guzzle()` which maps config to Guzzle options. Depends on Exceptions/Interfaces.
4. `src/Client.php` - transport. Builds the request URL
   (`{base_uri}/{token}/{endpoint}.{format}`), retries on HTTP 429
   (`tries`/`seconds`), decodes JSON, and resolves endpoint objects via `__get`.
5. `src/Endpoints/*` - one class per API area, each `extends Client`. This is the
   normal extension point.

## Endpoint contract

Every endpoint method sets `$this->type` (`get`/`post`) and `$this->endpoint`
(the path, with id/date segments interpolated), optionally `$this->params`, then
returns `$this->done()`. `done()` executes immediately (default `auto_exec`) and
returns the decoded object, or returns `$this` for `exec()`/`raw()` chaining.

## Rules

- Do not reach across layers or add project dependencies into a lower layer.
- A new API area is a new class in `src/Endpoints/`. No wiring is needed (the
  magic getter maps `snake_case`/`camelCase` names to `PascalCase` classes), but
  add a matching `@property` line to the `Uon\Client` docblock for IDE support.
- Configurable options must be added to `Config::ALLOWED` and, when they map to
  Guzzle, surfaced in `Config::guzzle()`.
