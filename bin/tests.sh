#!/usr/bin/env bash

for phpFile in tests/*Test.php
do
	fileBaseName="$(basename "${phpFile}")"
	fileBaseNameWithoutExtension="${fileBaseName%.*}"
	php "${phpFile}" && echo "${fileBaseNameWithoutExtension} passed" || echo "${fileBaseNameWithoutExtension} failed"
  [[ -f "database/test-address-book.jsonl" ]] && rm "database/test-address-book.jsonl"
done