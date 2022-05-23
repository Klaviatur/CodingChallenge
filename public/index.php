<?php

require_once __DIR__.'/../src/autoload.php';

use CodingChallenge\JsonlDatabase;
use CodingChallenge\Request;

// DEBUGGING
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new JsonlDatabase("contacts");
$request = new Request();


render('layout/top');

// Zeige Objekt
if ($request->method() === 'get' && $request->input('action') === 'show') {
    $contacts = $db->readObjects();
    render('address-book/index', ['contacts' => $contacts]);
}

// Formular zum Hinzufügen eines Objekts
if ($request->method() === 'get' && $request->input('action') === 'create') {

}

// Ein Objekt hinzufügen
if ($request->method() === 'post' && $request->input('action') === 'create') {

}

// Formular zum Editieren eines Objekts
if ($request->method() === 'get' && $request->input('action') === 'update') {

}

// Ein Objekt updaten
if ($request->method() === 'post' && $request->input('action') === 'update') {

}

// Lösche Objekt
if ($request->method() === 'post' && $request->input('action') === 'delete') {

}

// Zeige Index
if ($request->input('action') === 'index' || $request->input('action') === null) {
    $objects = $db->readObjects();
    render('address-book/index', ['contacts' => $objects]);
}

render('layout/bottom');
