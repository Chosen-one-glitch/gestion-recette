<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($recette['title']) ?></title>
    <style>
        body { font-family: Arial; background:#fafafa; padding:20px; }
        .container { background:#fff; padding:20px; max-width:900px; margin:auto; border-radius:10px; }
        img { max-width:100%; border-radius:10px; }
        h1 { margin-bottom:5px; }
        .meta { color:#666; margin-bottom:20px; }
        .box { background:#f2f2f2; padding:15px; margin:10px 0; border-radius:8px; }
    </style>
</head>
<body>

<div class="container">
    <h1><?= htmlspecialchars($recette['title']) ?></h1>
    
    <div class="meta">
        Catégorie : <b><?= htmlspecialchars($recette['category_name']) ?></b><br>
        Auteur : <b><?= htmlspecialchars($recette['author']) ?></b><br>
        Portions : <?= $recette['portions'] ?><br>
        Préparation : <?= $recette['prep_time'] ?> min — Cuisson : <?= $recette['cook_time'] ?> min
    </div>

    <?php if (!empty($recette['image_url'])): ?>
        <img src="<?= htmlspecialchars($recette['image_url']) ?>" alt="Image de la recette">
    <?php endif; ?>

    <h2>Description</h2>
    <p><?= nl2br(htmlspecialchars($recette['description'])) ?></p>

    <h2>Ingrédients</h2>
    <div class="box">
        <ul>
            <?php foreach ($ingredients as $ing): ?>
                <li><?= htmlspecialchars($ing['name']) ?> — <b><?= htmlspecialchars($ing['quantity']) ?></b></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <h2>Étapes</h2>
    <div class="box">
        <ol>
            <?php foreach ($steps as $step): ?>
                <li><?= htmlspecialchars($step['description']) ?></li>
            <?php endforeach; ?>
        </ol>
    </div>

</div>

</body>
</html>
