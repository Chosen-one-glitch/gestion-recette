<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($recette['title']) ?></title>

    <!-- Navbar global style -->
    <link rel="stylesheet" href="Assets/navbar.css">

    <!-- Style spécifique à cette page -->
    <link rel="stylesheet" href="Assets/recipeDetail.css">
</head>

<body>

    <?php include 'views/navbar.php'; ?>

    <div class="detail-container">

        <a href="index.php?page=home" class="back-btn">← Retour à la liste</a>

        <h1 class="title"><?= htmlspecialchars($recette['title']) ?></h1>

        <div class="meta">
            <p>Catégorie : <b><?= htmlspecialchars($recette['category_name']) ?></b></p>
            <p>Auteur : <b><?= htmlspecialchars($recette['author']) ?></b></p>
            <p>Portions : <?= $recette['portions'] ?></p>
            <p>Préparation : <?= $recette['prep_time'] ?> min — Cuisson : <?= $recette['cook_time'] ?> min</p>
        </div>

        <?php if (!empty($recette['image_url'])): ?>
            <img src="<?= htmlspecialchars($recette['image_url']) ?>" class="recipe-img" alt="Image de la recette">
        <?php endif; ?>

        <h2>Description</h2>
        <p class="desc"><?= nl2br(htmlspecialchars($recette['description'])) ?></p>

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
            <form action="index.php?page=toggleFavorite" method="POST" class="form-block">
                <input type="hidden" name="recipe_id" value="<?= $recette['id'] ?>">
                <button type="submit" class="fav-btn">
                    <?= in_array($recette['id'], $userFavorites) ? '❤️ Retirer des favoris' : '🤍 Ajouter aux favoris' ?>
                </button>
            </form>

            <h2>Noter cette recette</h2>

            <form action="index.php?page=rateRecipe" method="POST" class="form-block">
                <input type="hidden" name="recipe_id" value="<?= $recette['id'] ?>">

                <label>Note :</label>
                <select name="rating" required>
                    <option value="">-- Choisir --</option>
                    <?php for ($i=1; $i<=5; $i++): ?>
                        <option value="<?= $i ?>"><?= $i ?> ⭐</option>
                    <?php endfor; ?>
                </select>

                <label>Commentaire :</label>
                <textarea name="comment" rows="3" placeholder="Votre avis..."></textarea>

                <button type="submit" class="submit-btn">Envoyer</button>
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
