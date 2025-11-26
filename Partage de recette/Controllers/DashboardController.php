<?php
require_once "Models/Recette.php";

class DashboardController {

    public function index() {

        if (empty($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $user_id = $_SESSION['user']['id'];
        $recipes = Recette::getByUser($user_id);

        require "Views/dashboard.php";
    }
}
