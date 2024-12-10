<?php

class RegisterController
{
    private $userRepository;

    public function __construct($dbh)
    {
        $this->userRepository = new UserRepository($dbh);   
    }

    public function page()
    {
        include 'View/header.php';
        include 'View/register.php';
        include 'View/footer.php';
    }

    public function register()
    {   
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $email = htmlspecialchars($_POST['email']);
            $password = $_POST['password'];

            if ($this->userRepository->userExists($email)) {
                echo "Un utilisateur avec cet email existe déjà.";
                return;
            }

            $user = new RegisterModel($name, $firstname, $email, $password);
            $this->userRepository->createUser($user);
            

            $_SESSION['flash_message']="Inscription réussie ! Vous pouvez maintenant vous connecter.";
            header('location:/login');
            exit();
        }else{
            echo "echec lors de l'inscription";
        }
    }
}