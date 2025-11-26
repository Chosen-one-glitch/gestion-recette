<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="Assets/navbar.css">
    <link rel="stylesheet" href="Assets/auth.css">
</head>
<body>

<?php include 'Views/navbar.php'; ?>
<div class="auth-wrapper">
<div class="auth-container">
    <h2>Créer un compte</h2>

    <form action="index.php?page=register_submit" method="POST">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>

        <button type="submit">S'inscrire</button>
    </form>

    <p><a href="index.php">Retour à l’accueil</a></p>
</div>
</div>
</body>
</html>
