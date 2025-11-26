<h1>📊 Tableau de bord</h1>

<?php if (empty($recipes)): ?>
    <p>Vous n'avez publié aucune recette pour le moment.</p>

<?php else: ?>
<table>
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
                <a href="index.php?page=deleteRecipe&id=<?= $recipe['id'] ?>"
                   onclick="return confirm('Voulez-vous vraiment supprimer cette recette ?')"
                   class="btn-danger">
                   🗑 Supprimer
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>
