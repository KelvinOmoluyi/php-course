<?php

use Core\Database;
use Core\Validator;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];

// validate form inputs
$errors = [];
if (!Validator::email($email)){
    $errors['email'] = 'Please enter a valid email address!';
}
if (!Validator::string($password, 7, 255)){
    $errors['password'] = 'Please provide a password at least 7 characters!';
}

if (! empty($errors)){
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}


// check if account exists
$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

// if yes, redirect to form
if ($user){

    header('Location: /');
} else {
    // if no, register user and redirect
    $db->query('INSERT into users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    //marked that the user is logged in
    login($user);

    header('Location: /');
    exit();
}
