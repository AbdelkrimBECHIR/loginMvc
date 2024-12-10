<?php

class UserController
{
    public $userRepository;

    public function __construct($dbh)
    {
        $this->userRepository = new UserRepository($dbh);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $this->userRepository->insert($_POST);

            $confirmation = "L'utilisateur a bien été ajouté";

            // inclure les vues
        } else {
            $title = "Utilisateur";
            $action = 'Ajouter';
    
           // inclure les vues
        }
    }
}