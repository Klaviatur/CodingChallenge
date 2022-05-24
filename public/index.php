<?php

require_once __DIR__.'/../src/autoload.php';

use CodingChallenge\JsonlDatabase;
use CodingChallenge\Models\Contact;
use CodingChallenge\Request;

// DEBUGGING
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new JsonlDatabase("contacts");
$request = new Request();

// Show a single Contact
if (
    $request->method === 'get' &&
    $request->input('action') === 'show'
) {
    $id = intval($request->input('id'));
    $contact = new Contact($db->readObject($id));
    render('contacts/show', ['id' => $id, 'contact' => $contact]);
}

// Show form to create a Contact
elseif (
    $request->method === 'get' &&
    $request->input('action') === 'create'
) {
    render('contacts/create');
}

// Store a new Contact
elseif (
    $request->method === 'post' &&
    $request->input('action') === 'store'
) {
    $contact = [];
    foreach ((new Contact())->getFields() as $fieldKey => $field)
        $contact[$fieldKey] = $request->input($fieldKey);
    $db->appendObject($contact);
    header('Location: /');
}

// Form for editing a Contact
elseif (
    $request->method === 'get' &&
    $request->input('action') === 'edit'
) {
    $id = intval($request->input('id'));
    $contact = new Contact($db->readObject($id));
    render('contacts/edit', ['id' => $id, 'contact' => $contact]);
}

// Update a contact
elseif (
    $request->method === 'post' &&
    $request->input('action') === 'update'
) {
    $id = intval($request->input('id'));
    $contact = [];
    foreach ((new Contact())->getFields() as $fieldKey => $field)
        $contact[$fieldKey] = $request->input($fieldKey);
    $db->updateObject($id, $contact);
    header('Location: /');
}

// Delete a Contact
elseif (
    $request->method === 'get' &&
    $request->input('action') === 'delete'
) {
    $id = intval($request->input('id'));
    $db->deleteObject($id);
    header('Location: /');
}

// Show listing of all Contacts
else {
    $contacts = [];
    $sortBy = $request->input('sortBy');
    $sortDirection = $request->input('sortDirection');
    foreach ($db->readObjects($sortBy, $sortDirection) as $contact)
        $contacts[] = new Contact($contact);
    render('contacts/index', [
        'contacts' => $contacts,
        'sortBy' => $sortBy,
        'sortDirection' => $sortDirection
    ]);
}
