<?php

require_once __DIR__.'/../src/autoload.php';

use CodingChallenge\JsonlDatabase;
use CodingChallenge\Models\Contact;

$db = new JsonlDatabase("test-contacts");

$arrayOfArrays = [
    ['name' => 'Test Hattingen', 'phone' => '+49 123456789', 'city' => 'Hattingen'],
    ['name' => 'Test Bochum', 'phone' => '+49 987654321', 'city' => 'Bochum'],
    ['name' => 'Test Hagen', 'phone' => '+49 123456789', 'city' => 'Hagen'],
];

$db->writeObjects($arrayOfArrays);

$contacts = $db->readObjects();

// We compare the seed data ($arrayOfArrays) with each of the Contact Model's keys after casting them to an array.
foreach ($contacts as $index => $contactArray)
    foreach ($contactArray as $key => $value)
        // We use weak comparison since some strings may cast to integers by model configuration.
        if ($arrayOfArrays[$index][$key] != (new Contact($contactArray))->toArray()[$key])
            exit(1);

exit(0);
