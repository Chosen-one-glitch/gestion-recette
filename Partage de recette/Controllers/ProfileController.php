<?php
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/Recette.php';


class ProfileController {

    public function index() {
        if (empty($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $user_id = $_SESSION['user']['id'];

        // Récupération des infos depuis le model
        $userInfo = User::getById($user_id);
        $recipeCount = User::countUserRecipes($user_id);
        $averageRating = User::getUserAverageRating($user_id);

        require __DIR__ . '/../Views/profile.php';
    }

    public function changePassword() {
        if (empty($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit;
        }

        require __DIR__ . '/../Views/changePassword.php';
    }

    public function changePasswordSubmit() {
        if (empty($_SESSION['user'])) return;

        if (empty($_POST['current']) || empty($_POST['new']) || empty($_POST['confirm'])) {
            die("Tous les champs sont obligatoires.");
        }

        $user_id = $_SESSION['user']['id'];
        $current = $_POST['current'];
        $new = $_POST['new'];
        $confirm = $_POST['confirm'];

        if ($new !== $confirm) die("Les nouveaux mots de passe ne correspondent pas.");

        $result = User::changePassword($user_id, $current, $new);

        if ($result === true) {
            echo "Mot de passe modifié avec succès ! <a href='index.php?page=profile'>Retour</a>";
        } else {
            echo $result;
        }
    }
}
