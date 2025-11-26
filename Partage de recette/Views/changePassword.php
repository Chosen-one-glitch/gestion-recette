<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Changer le mot de passe</title>
</head>
<body>

<h1>Changer mon mot de passe</h1>

<form method="POST" action="index.php?page=changePasswordSubmit">

    <label>Mot de passe actuel :</label><br>
    <input type="password" name="current" required><br><br>

    <label>Nouveau mot de passe :</label><br>
    <input type="password" name="new" required><br><br>

    <label>Confirmer le nouveau mot de passe :</label><br>
    <input type="password" name="confirm" required><br><br>

    <button type="submit">Modifier</button>
</form>

<br>
<a href="index.php?page=profile">⬅ Retour</a>

</body>
</html>
