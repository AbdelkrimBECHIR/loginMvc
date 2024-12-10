<?php

?>

    <div class="content-wrapper">
        <h1>Inscription</h1>
        <?php if (!empty($error)) : ?>
            <p style="color: red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form action="register/register" method="POST" class="form">
            <input type="text" name="name" placeholder="Nom" required class="input-field">
            <input type="text" name="firstname" placeholder="Prénom" required class="input-field">
            <input type="email" name="email" placeholder="Email" required class="input-field">
            <input type="password" name="password" placeholder="Mot de passe" required class="input-field">
            <button type="submit" class="btn">S'inscrire</button>
        </form>
    </div>




