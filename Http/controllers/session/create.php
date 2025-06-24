<?php

use Core\Session;

view("session/create.view.php", [
    'heading' => 'Create Note',
    'errors' => Session::get('errors')
]);