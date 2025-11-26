<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>

    <link rel="stylesheet" href="Assets/navbar.css">
    <link rel="stylesheet" href="Assets/dashboard.css">
</head>

<body>

    <?php include 'views/navbar.php'; ?>

    <div class="dashboard-container">

        <h1 class="title">📊 Mon tableau de bord</h1>

        <?php if (empty($recipes)): ?>

            <p class="empty">Vous n'avez publié aucune recette pour le moment.</p>

        <?php else: ?>

        <div class="table-wrapper">
            <table class="recipe-table">

                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($recipes as $recipe): ?>
                    <tr>
                        <td><?= $recipe['id'] ?></td>
                        <td><?= htmlspecialchars($recipe['title']) ?></td>
                        <td><?= $recipe['created_at'] ?></td>
                        <td>
                            <a   class="btn-danger"
                                 href="index.php?page=deleteRecipe&id=<?= $recipe['id'] ?>"
                                 onclick="return confirm('Voulez-vous vraiment supprimer cette recette ?')">
                                 🗑 Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>

        <?php endif; ?>

    </div>

</body>
</html>
