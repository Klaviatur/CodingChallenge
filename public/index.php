<?php

require_once __DIR__.'/../src/autoload.php';

use CodingChallenge\JsonlDatabase;

// DEBUGGING
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new JsonlDatabase("addressbook");
