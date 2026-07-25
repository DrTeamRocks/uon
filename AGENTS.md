# U-On Travel API PHP Client - agent guide

Thin PSR-4 REST client for the U-On Travel API (package `drteam/uon`). This file
is the canonical brief for every coding agent. `CLAUDE.md` is a symlink to it.

## What it is

- Namespace `Uon\`, PSR-4: `src/` -> `Uon\`, `tests/` -> `Uon\Tests\`.
- Entry point `Uon\Client`; endpoints live in `src/Endpoints/*` and are resolved
  lazily through a magic getter (`$client->users`, `$client->requests`, ...).
- Transport is Guzzle 7; responses are JSON-decoded to `stdClass`.

## Quick use

```php
$uon = new \Uon\Client(['token' => 'your_token']);
$currencies = $uon->currencies->all();
$user       = $uon->users->get(1);
```

## Golden rules

- Supported PHP is 7.4+ - do NOT use syntax newer than 7.4 in `src/`.
- Behavior is specified by tests. Add or change a test before changing behavior.
- Unit and Feature tests are offline and mocked; never call the real API from them.
- Build by layers, lowest first (see `.claude/rules/architecture.md`).
- Run the full check before declaring done: linters, then the test suite.

## Commands

```shell
composer install
vendor/bin/phpunit --testsuite Unit,Feature   # offline suite
vendor/bin/parallel-lint src tests            # syntax lint
vendor/bin/phpstan analyse                    # static analysis (level 5)
```

## Detailed rules

- Architecture and layers: `.claude/rules/architecture.md`
- Contribution workflow (BDD): `.claude/rules/workflow.md`
- Testing conventions: `.claude/rules/testing.md`
- Code style: `.claude/rules/code-style.md`
- Consuming the library: `.claude/rules/usage.md`

Cursor mirrors of these live under `.cursor/rules/*.mdc` and must stay in sync
(see the Rules Sync section in the workflow rule).
