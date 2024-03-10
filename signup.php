<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <div class="login-container">
        <form action="login.php" method="POST" class="login-form">
            <h2>Connexion</h2>
            <div class="form-group">
                <label for="username">E-mail :</label>
                <input type="email" id="email" name="email" placeholder="contact@gmail.com" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="cree">Se connecter</button>
            <a href="creation.html" id="creer" >creer un compte </a>
        </form>
    </div>
</body>
</html>
<?php
$user = new User($conn);
$cv = new User($data);
$user->insereruser($cv);
?>
