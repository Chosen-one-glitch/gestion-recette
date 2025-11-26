<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="Assets/navbar.css">
    <link rel="stylesheet" href="Assets/auth.css">
</head>
<body>

<?php include 'Views/navbar.php'; ?>
<div class="auth-wrapper">
<div class="auth-container">
    <h2>Connexion</h2>

    <?php if (!empty($error)): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="index.php?page=login_submit">
        <label>Email :</label>
        <input type="email" name="email" placeholder="Votre email" required>

        <label>Mot de passe :</label>
        <input type="password" name="password" placeholder="Votre mot de passe" required>

        <button type="submit">Connexion</button>
    </form>

    <p><a href="index.php?page=register">Créer un compte</a></p>
</div>
</div>
</body>
</html>
