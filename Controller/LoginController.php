<?php
class LoginController
{
    public $userRepository;

    public function __construct($dbh)
    {
        $this->userRepository = new UserRepository($dbh);   
    }

    public function page()
    {
       
        include 'View/login.php';
  
       
        // inclure les vues
    }    
}