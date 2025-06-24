<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm {
    protected $errors = [];

    public function __construct($attributes){
        // validate form inputs

        if (!Validator::email($this->$attributes['email'])){
            $this->errors['email'] = 'Please enter a valid email address!';
        }
        if (!Validator::string($this->$attributes['password'])){
            $this->errors['password'] = 'Please provide a valid password!';
        }
    }

    public static function validate($attributes){
        $instance = new static($attributes);

        if($instance->failed()) {
            throw new ValidationException();
        }

        return $instance;
    }

    public function failed() {
        return count($this->errors);
    }

    public function errors(){
        return $this->errors;
    }

    public function error($field, $message) {
        $this->errors[$field] = $message;
    }
}