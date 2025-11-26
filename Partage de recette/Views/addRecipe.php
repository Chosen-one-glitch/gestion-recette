<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une recette</title>

    <link rel="stylesheet" href="Assets/navbar.css">
    <link rel="stylesheet" href="Assets/addRecipe.css">
</head>

<body>

    <?php include "views/navbar.php"; ?>

    <div class="add-container">

        <h1>➕ Ajouter une nouvelle recette</h1>

        <form action="index.php?page=addRecipeSubmit" method="POST" class="add-form">

            <div class="section">
                <label>Nom de la recette</label>
                <input type="text" name="title" required>

                <label>Description</label>
                <textarea name="description" required></textarea>

                <label>Catégorie</label>
                <select name="category_id" required>
                    <?php foreach($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                    <?php endforeach; ?>
                </select>

                <label>Image URL</label>
                <input type="text" name="image_url">

                <label>Temps de préparation (min)</label>
                <input type="number" name="prep_time" required>

                <label>Temps de cuisson (min)</label>
                <input type="number" name="cook_time" required>

                <label>Portions</label>
                <input type="number" name="portions" required>
            </div>

            <div class="section">
                <h3>🧂 Ingrédients</h3>
                <div id="ingredients">
                    <div class="ingredient">
                        <input type="text" name="ingredients[0][name]" placeholder="Nom" required>
                        <input type="text" name="ingredients[0][quantity]" placeholder="Quantité" required>
                    </div>
                </div>
                <button type="button" class="btn-secondary" onclick="addIngredient()">Ajouter un ingrédient</button>
            </div>

            <div class="section">
                <h3>📜 Étapes</h3>
                <div id="steps">
                    <div class="step">
                        <input type="text" name="steps[0]" placeholder="Description de l'étape" required>
                    </div>
                </div>
                <button type="button" class="btn-secondary" onclick="addStep()">Ajouter une étape</button>
            </div>

            <button type="submit" class="btn-primary">💾 Enregistrer la recette</button>

        </form>
    </div>

    <script>
        let ingIndex = 1;
        function addIngredient() {
            const div = document.createElement('div');
            div.classList.add('ingredient');
            div.innerHTML = `
                <input type="text" name="ingredients[${ingIndex}][name]" placeholder="Nom" required>
                <input type="text" name="ingredients[${ingIndex}][quantity]" placeholder="Quantité" required>
            `;
            document.getElementById('ingredients').appendChild(div);
            ingIndex++;
        }

        let stepIndex = 1;
        function addStep() {
            const div = document.createElement('div');
            div.classList.add('step');
            div.innerHTML = `
                <input type="text" name="steps[${stepIndex}]" placeholder="Description étape" required>
            `;
            document.getElementById('steps').appendChild(div);
            stepIndex++;
        }
    </script>

</body>
</html>
