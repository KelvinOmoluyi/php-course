<?php

namespace Core;

class Authenticator {
    public function attempt($email, $password){
        // match the credentials
        $user = App::resolve(Database::class)->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        if ($user){
            // if no errors, check if user password matches the submitted password
            if (password_verify($password, $user['password'])){
                $this->login([
                    'email' => $email
                ]);

                return true;
            }
        }
    }


    public function login($user){
        $_SESSION['user'] = [
            'email' => $user['email']
        ];

        session_regenerate_id(true);
    }

}