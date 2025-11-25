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
        button { padding:8px 12px; border:none; border-radius:5px; cursor:pointer; }
    </style>
</head>
<body>

<div class="container">
    <a href="index.php?page=home" style="display:inline-block;margin-bottom:15px;text-decoration:none;color:#fff;background:#007bff;padding:8px 12px;border-radius:5px;">← Retour à la liste</a>

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

    <?php if (!empty($_SESSION['user'])): ?>
        <form action="index.php?page=toggleFavorite" method="POST" style="margin-bottom:15px;">
            <input type="hidden" name="recipe_id" value="<?= $recette['id'] ?>">
            <button type="submit" style="background:#ff4081;color:#fff;">
                <?= in_array($recette['id'], $userFavorites) ? 'Supprimer des favoris' : 'Ajouter aux favoris' ?>
            </button>
        </form>

        <h2>Noter cette recette</h2>
        <form action="index.php?page=rateRecipe" method="POST">
            <input type="hidden" name="recipe_id" value="<?= $recette['id'] ?>">
            <label for="rating">Note :</label>
            <select name="rating" id="rating" required>
                <option value="">-- Choisir --</option>
                <option value="1">1 ⭐</option>
                <option value="2">2 ⭐⭐</option>
                <option value="3">3 ⭐⭐⭐</option>
                <option value="4">4 ⭐⭐⭐⭐</option>
                <option value="5">5 ⭐⭐⭐⭐⭐</option>
            </select>
            <br>
            <label for="comment">Commentaire :</label>
            <textarea name="comment" id="comment" rows="3" placeholder="Votre avis..."></textarea>
            <br>
            <button type="submit" style="background:#28a745;color:#fff;">Envoyer</button>
        </form>
    <?php endif; ?>

    <h2>Avis des utilisateurs</h2>
    <?php if(!empty($ratings)): ?>
        <?php foreach($ratings as $r): ?>
            <div class="box">
                <b><?= htmlspecialchars($r['username']) ?></b> — <?= $r['rating'] ?> ⭐<br>
                <?= nl2br(htmlspecialchars($r['comment'])) ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun avis pour le moment.</p>
    <?php endif; ?>

</div>
</body>
</html>
