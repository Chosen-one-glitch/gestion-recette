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
}
