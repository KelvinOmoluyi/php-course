<?php

use Core\App;
use Core\Database;
use Core\Validator;

// you are passing in the class you need and calling it with container
$db = App::resolve(Database::class);


$currentUserId = 3;


// find corresponding note
$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();


// make sure user is authorised to edit the note
authorize($note['user_id'] === $currentUserId);


// validate the form
$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if(count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}


// If no validation error, insert the new note
$db->query('update notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

// redirect user
header('Location: /notes');
die();