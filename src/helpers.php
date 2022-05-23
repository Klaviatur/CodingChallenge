<?php

/**
 * Pfad zur JSONL Datenbankdatei
 *
 * @link https://jsonlines.org/
 * @param $filename
 * @return string
 */
function db_path($filename) {
    return __DIR__.'/../database/'.$filename.".jsonl";
}

/**
 * Gibt alle übergebenen Variablen aus.
 *
 * @param ...$vars
 * @return void
 */
function dump(...$vars) {
    echo "<pre>";
    print_r(...$vars);
    echo "</pre>";
}

/**
 * Gibt alle übergebenen Variablen aus und bricht den Prozess mit Status Code 1 ab.
 *
 * @param ...$vars
 * @return void
 */
function dd(...$vars) {
    dump(...$vars);
    exit(1);
}
