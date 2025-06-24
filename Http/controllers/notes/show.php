<?php

use Core\App;
use Core\Database;

// you are passing in the class you need and calling it with container
$db = App::resolve(Database::class);

$currentUserId = 3;



$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);

