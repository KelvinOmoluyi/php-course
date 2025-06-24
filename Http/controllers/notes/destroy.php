<?php

use Core\App;
use Core\Database;

// you are passing in the class you need and calling it with container

$db = App::resolve(Database::class);

$currentUserId = 3;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

header('Location:/notes');

die();
