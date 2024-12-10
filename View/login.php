
<?php
// Afficher le message flash si défini
if (isset($_SESSION['flash_message'])) {
    echo "<p class='flash-message'>" . htmlspecialchars($_SESSION['flash_message']) . "</p>";
    unset($_SESSION['flash_message']);
}

?>


    <div class="content-wrapper">
        <h1>Connexion</h1>
        <form action="login/login" method="POST" class="form">
            <input type="text" name="email" placeholder="Email" required class="input-field">
            <input type="password" name="password" placeholder="Mot de passe" required class="input-field">
            <button type="submit" class="btn">Se connecter</button>
        </form>
    </div>


