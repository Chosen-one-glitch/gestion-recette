<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>

    <style>
        body { font-family: Arial; background: #f5f5f5; }
        .container {
            width: 350px; margin: 60px auto; padding: 20px;
            background: white; border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
        }
        input { width: 100%; padding: 10px; margin: 10px 0; }
        button { width: 100%; padding: 10px; background: #28a745; color: white; border: none; }
    </style>
</head>
<body>

<div class="container">
    <h2>Créer un compte</h2>

    <form action="index.php?page=register_submit" method="POST">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>

        <button type="submit">S'inscrire</button>
    </form>

    <p><a href="index.php">Retour à l’accueil</a></p>
</div>

</body>
</html>
