<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil utilisateur</title>

    <link rel="stylesheet" href="Assets/profile.css">
</head>

<body>

<div class="profile-container">

    <h1>👤 Mon Profil</h1>

    <div class="profile-box">
        <p><b>Nom d'utilisateur :</b> <?= htmlspecialchars($userInfo['username']) ?></p>
        <p><b>Email :</b> <?= htmlspecialchars($userInfo['email']) ?></p>

        <p><b>Recettes publiées :</b> <?= $recipeCount ?></p>
        <p><b>Note moyenne reçue :</b> ⭐ <?= $averageRating ?>/5</p>
    </div>

    <a href="index.php?page=changePassword" class="btn-primary">Changer mon mot de passe</a>
    <a href="index.php?page=home" class="btn-secondary">⬅ Retour</a>

</div>

</body>
</html>
