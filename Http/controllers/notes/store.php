<?php

use Core\Validator;
use Core\App;
use Core\Database;

$errors = [];

// you are passing in the class you need and calling it with container

$db = App::resolve(Database::class);


if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if (! empty($errors)){
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

// Insert the note
if (empty($errors)) {
    $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 3
    ]);

    header('location: /notes');
}
