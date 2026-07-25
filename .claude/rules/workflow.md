---
description: BDD contribution workflow for features and bugfixes
---

# Workflow (BDD)

Build by layers (see `.claude/rules/architecture.md`), lowest first. Do not write
a higher layer before the layers it depends on exist and are tested.

## Feature

1. Write a failing test describing the observable behavior, usually a
   `tests/Feature/Endpoints/*Test.php` with HTTP method and path assertions.
2. Implement the smallest code that passes it (a new endpoint class or method).
3. For a new endpoint class, add its `@property` line to the `Uon\Client` docblock.
4. Make the offline suite green: `vendor/bin/phpunit --testsuite Unit,Feature`.
5. Run linters: `composer validate --strict`, `vendor/bin/parallel-lint src tests`,
   `vendor/bin/phpstan analyse`.
6. Update docs (`README.API.md`, the README config table) if the public surface changed.

## Bugfix

1. Reproduce with a failing test first.
2. Fix at the lowest responsible layer.
3. Green suite and clean linters, as above.

## Definition of done

Offline suite green, linters clean, docs updated for any public change.

## Rules Sync

**MANDATORY** - if any rule file is added or changed in this task, mirror the
change to every other agent's rule tree in the same commit or PR:

1. Identify which trees exist in the repo: `.cursor/rules/`, `.claude/rules/`,
   root `AGENTS.md` / `CLAUDE.md`, plus any other agent roots
   (`.github/copilot-instructions.md`, `.codex/`, etc.).
2. For each edited file, locate or create its counterpart in every other tree
   (same topic name).
3. Copy the body verbatim, then adapt only the frontmatter and inline link syntax:
   - Cursor `globs:` + `alwaysApply:` <-> Claude `paths:` (omit `paths:` for always-on).
   - Cursor `@file.mdc` <-> Claude `.claude/rules/file.md`.
4. If `AGENTS.md` changed, verify `CLAUDE.md` resolves to the same content
   (symlink intact, or copy refreshed).
5. Include the synced files in the same commit. Do not leave one tree ahead of
   the other.

Skip only when the topic is genuinely tool-specific; when skipping, add a
one-line comment in the file that diverges.
