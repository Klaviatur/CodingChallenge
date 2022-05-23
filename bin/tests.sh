#!/usr/bin/env bash

php tests/JsonlDatabaseTest.php && echo "JsonlDatabaseTest passed" || echo "JsonlDatabaseTest failed"

[[ -f "database/test-addressbook.jsonl" ]] && rm "database/test-addressbook.jsonl"