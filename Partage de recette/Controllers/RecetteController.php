<?php
require_once __DIR__ . '/../Models/Recette.php';

class RecetteControllers {

    public function index() {
        $recettes = Recette::getAll();
        require __DIR__ . '/../Views/accueil.php';
    }

    public function show($id) {
        $recette = Recette::getById($id);
        $ingredients = Recette::getIngredients($id);
        $steps = Recette::getSteps($id);
        $ratings = Recette::getRatings($id);
        $userFavorites = !empty($_SESSION['user']) ? Recette::getUserFavorites($_SESSION['user']['id']) : [];
        require __DIR__ . '/../Views/recipeDetail.php';
    }

    public function delete() {

    if (empty($_SESSION['user'])) {
        header("Location: index.php?page=login");
        exit;
    }

    if (!isset($_GET['id'])) {
        echo "Recette introuvable.";
        exit;
    }

    $recipe_id = $_GET['id'];
    $user_id = $_SESSION['user']['id'];

    if (Recette::deleteRecipe($recipe_id, $user_id)) {
        header("Location: index.php?page=dashboard&deleted=1");
    } else {
        echo "Erreur : vous ne pouvez pas supprimer cette recette.";
    }
}

}
