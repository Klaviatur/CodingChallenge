#!/usr/bin/env bash

php tests/JsonlDatabaseTest.php && echo "JsonlDatabaseTest passed" || echo "JsonlDatabaseTest failed"

[[ -f "database/test-address-book.jsonl" ]] && rm "database/test-address-book.jsonl"