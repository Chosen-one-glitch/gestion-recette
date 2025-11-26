<?php include 'Views/navbar.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Recettes</title>

    <link rel="stylesheet" href="Assets/navbar.css">
    <link rel="stylesheet" href="Assets/accueil.css">
</head>

<body>
<div class="topbar">
        <?php if (!empty($_SESSION['user'])): ?>
            👤 Bonjour **<?= htmlspecialchars($_SESSION['user']['username']) ?>**
            (<?= htmlspecialchars($_SESSION['user']['email']) ?>)  
            — <a href="logout.php">Déconnexion</a>
            — <a href="index.php?page=addRecipe" class="btn">Ajouter une recette</a>
        <?php else: ?>
            <a href="index.php?page=register">Inscription</a>
            <a href="index.php?page=login">Connexion</a>
        <?php endif; ?>
    </div>

    <h1>Toutes les Recettes</h1>
    <div class="container">
        <?php foreach ($recettes as $r): ?>
            <a href="index.php?page=recette&id=<?= $r['id'] ?>" class="card" style="text-decoration:none;color:inherit;">
                <img src="<?= htmlspecialchars($r['image_url']) ?>" alt="Image recette">
                <div class="card-body">
                    <div class="title"><?= htmlspecialchars($r['title']) ?></div>
                    <div class="meta">
                        Catégorie : <?= htmlspecialchars($r['category_name']) ?><br>
                        Auteur : <?= htmlspecialchars($r['author']) ?><br>
                        🕒 Préparation : <?= $r['prep_time'] ?> min<br>
                        🔥 Cuisson : <?= $r['cook_time'] ?> min<br>
                        🍽 Portions : <?= $r['portions'] ?> personnes
                    </div>
                    <div class="desc">
                        <?= nl2br(htmlspecialchars(substr($r['description'], 0, 120))) ?>...
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</body>
</html>
