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
        include 'view/header.php';
        include 'View/login.php';
        include 'view/footer.php';
       
        // inclure les vues
    }    
}