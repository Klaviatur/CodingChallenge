<?php

require_once __DIR__.'/../src/autoload.php';

use CodingChallenge\JsonlDatabase;

$db = new JsonlDatabase("test-contacts");

// DB löschen
$db->writeObjects([]);

// ersten Eintrag schreiben
$db->appendObject(
    ['name' => 'asdf'],
);

// TEST: Eintrag muss gefunden werden
if ($db->readObject(0)['name'] !== 'asdf')
    exit(1);

// ersten, zweiten und dritten Eintrag schreiben
$db->writeObjects([
    ['name' => '1'],
    ['name' => '2'],
]);
$db->appendObject(
    ['name' => 3],
);

// zweiten Eintrag löschen
$db->deleteObject(1);

// TEST: Noch zwei Einträge müssen übrig sein
$objects = $db->readObjects();
if (
    array_key_exists(0, $objects) && $objects[0]['name'] === '1' &&
    array_key_exists(1, $objects) && $objects[1]['name'] === 3
) {
    // test passed
} else {
    exit(1);
}

exit(0);
