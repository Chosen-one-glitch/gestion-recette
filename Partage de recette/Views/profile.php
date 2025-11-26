<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Profil utilisateur</title>
    <link rel="stylesheet" href="Assets/profile.css">
</head>
<body>

<div class="container">

    <h1>Mon Profil</h1>

    <div class="profile-box">
        <p><b>Nom d'utilisateur :</b> <?= htmlspecialchars($userInfo['username']) ?></p>
        <p><b>Email :</b> <?= htmlspecialchars($userInfo['email']) ?></p>

        <p><b>Recettes publiées :</b> <?= $recipeCount ?></p>
        <p><b>Note moyenne reçue :</b> ⭐ <?= $averageRating ?>/5</p>
    </div>

    <a href="index.php?page=changePassword" class="btn">Changer mon mot de passe</a>
    <br><br>
    <a href="index.php?page=home" class="btn">⬅ Retour</a>

</div>

</body>
</html>
