<?php

// Afficher le message flash si défini
if (isset($_SESSION['flash_message'])) {
    echo "<p class='flash-message'>" . htmlspecialchars($_SESSION['flash_message']) . "</p>";
    unset($_SESSION['flash_message']);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site</title>
    <link rel="stylesheet" href="/style.css"> 
</head>
<body>
<header>
<nav>
        <ul>
            <li><a href="home">Accueil</a></li>
            <?php 
            // Vérifier si l'utilisateur est connecté
            if (isset($_SESSION['user_id'])) { 
            ?>
                <li><a href="logout">Se déconnecter</a></li>
                <li><a href="profil">Mon profil</a></li>
            <?php 
            } else { 
            ?>
                <li><a href="login">Se connecter</a></li>
                <li><a href="register">S'inscrire</a></li>
            <?php 
            } 
            
            // Vérifier si l'utilisateur a un rôle d'admin
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') { 
            ?>
                <li><a href="admin">Admin</a></li>
            <?php 
            } 
            ?>
        </ul>
    </nav>
</header>
<main>
 