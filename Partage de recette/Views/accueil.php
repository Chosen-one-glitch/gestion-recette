<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Recettes</title>

    <style>
        body { font-family: Arial, sans-serif; background: #fafafa; padding: 20px; }
        .container { display: flex; flex-wrap: wrap; gap: 20px; }
        .card {
            width: 300px; background: white; border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .card img { width: 100%; height: 180px; object-fit: cover; }
        .card-body { padding: 15px; }
        .title { font-size: 18px; font-weight: bold; margin-bottom: 5px; }
        .meta { font-size: 14px; color: #555; margin-bottom: 10px; }
        .desc { font-size: 14px; line-height: 1.4; }
    </style>
</head>

<body>
<div class="topbar">
        <?php if (!empty($_SESSION['user'])): ?>
            👤 Bonjour **<?= htmlspecialchars($_SESSION['user']['username']) ?>**
            (<?= htmlspecialchars($_SESSION['user']['email']) ?>)  
            — <a href="logout.php">Déconnexion</a>
        <?php else: ?>
            <a href="index.php?page=register">Inscription</a>
            <a href="index.php?page=login">Connexion</a>
        <?php endif; ?>
    </div>

    <h1>Toutes les Recettes</h1>
    <div class="container">
        <?php foreach ($recettes as $r): ?>
            <div class="card">
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
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
