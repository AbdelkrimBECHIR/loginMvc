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
        //inclure les vues
        include 'view/header.php';
        include 'View/login.php';
        include 'view/footer.php';
    } 
        

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            // Utiliser la méthode pour récupérer l'utilisateur
            $user = $this->userRepository->getUserByEmailAndPassword($email, $password);
    
            if ($user) {
                // Stocker l'utilisateur en session
                session_start();
                $_SESSION['user_id'] = $user->getId();
                $_SESSION['user_role'] = $user->getRole();
    
                // Rediriger en fonction du rôle
                if ($user->getRole() === 'admin') {
                    $_SESSION['flash_message'] = "Connexion réussie.";
                    header("Location: /admin");
                } else {
                    $_SESSION['flash_message'] = "Connexion réussie.";
                    header("Location: /home");
                }
                exit();
            } else {
                echo "Email ou mot de passe incorrect.";
            }
        }
    }
    
}