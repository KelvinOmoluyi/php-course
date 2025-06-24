<?php

// log in the user if the credentials match
use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;


// ================ form validation===================================

LoginForm::validate([
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);
    
// ================= user authentication ==============================
$auth = new Authenticator();

if ($auth->attempt($email, $password)) {
    redirect("/");

} 

$form->error('password', 'No matching account found these credentials');
    


Session::flash('errors', $form->errors());

Session::flash('old', [
    'email' => $_POST['email']
]);

// send wrong credentials errors to view
redirect('/login');

// return view('session/create.view.php', [
//     'errors' => 
// ]);
