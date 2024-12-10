
<?php
// Afficher le message flash si défini
if (isset($_SESSION['flash_message'])) {
    echo "<p class='flash-message'>" . htmlspecialchars($_SESSION['flash_message']) . "</p>";
    unset($_SESSION['flash_message']);
}


?>

    <div class="content-wrapper">
        <h1>Bienvenue sur notre site</h1>
        <p>Veuillez vous connecter ou vous inscrire pour continuer.</p>
    </div>


