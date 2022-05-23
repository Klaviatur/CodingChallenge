<?php

require_once __DIR__.'/../src/autoload.php';

use CodingChallenge\JsonlDatabase;

$db = new JsonlDatabase("test-address-book");

// DB löschen
$db->writeObjects([]);

// ersten Eintrag schreiben
$db->appendObject(
    ['zeile' => 'asdf'],
);

// TEST: Eintrag muss gefunden werden
if ($db->readObject(0)['zeile'] !== 'asdf')
    exit(1);

// ersten, zweiten und dritten Eintrag schreiben
$db->writeObjects([
    ['zeile' => '1'],
    ['zeile' => '2'],
]);
$db->appendObject(
    ['zeile' => 3],
);

// zweiten Eintrag löschen
$db->deleteObject(1);

// TEST: Noch zwei Einträge müssen übrig sein
$objects = $db->readObjects();
if (
    array_key_exists(0, $objects) && $objects[0]['zeile'] === '1' &&
    array_key_exists(1, $objects) && $objects[1]['zeile'] === 3
) {
    // test passed
} else {
    exit(1);
}

exit(0);
