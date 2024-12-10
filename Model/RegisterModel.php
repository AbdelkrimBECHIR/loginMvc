<?php

class RegisterModel
{
    public $name;
    public $firstname;
    public $email;
    public $password;

    public function __construct($name, $firstname, $email, $password)
    {
        $this->name = $name;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }
}
