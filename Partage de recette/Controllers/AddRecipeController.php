<?php
require_once 'Models/Recette.php';
require_once 'Models/Category.php';

class AddRecipeController {

    public function show() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $categories = Category::getAll();
        require 'Views/addRecipe.php';
    }

    public function submit() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $title = $_POST['title'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];
        $image_url = $_POST['image_url'];
        $prep_time = $_POST['prep_time'];
        $cook_time = $_POST['cook_time'];
        $portions = $_POST['portions'];
        $user_id = $_SESSION['user']['id'];

        $recetteModel = new Recette();
        $recipe_id = $recetteModel->create(
            $title,
            $description,
            $category_id,
            $image_url,
            $prep_time,
            $cook_time,
            $portions,
            $user_id
        );

        // Ajouter ingrédients
        if (!empty($_POST['ingredients'])) {
            foreach ($_POST['ingredients'] as $ing) {
                if (!empty($ing['name']) && !empty($ing['quantity'])) {
                    $recetteModel->addIngredient($recipe_id, $ing['name'], $ing['quantity']);
                }
            }
        }

        // Ajouter étapes
        if (!empty($_POST['steps'])) {
            $step_number = 1;
            foreach ($_POST['steps'] as $step) {
                if (!empty($step)) {
                    $recetteModel->addStep($recipe_id, $step_number, $step);
                    $step_number++;
                }
            }
        }

        header("Location: index.php?page=home");
        exit;
    }
}
