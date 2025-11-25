<?php

require_once __DIR__ . '/../Models/Recette.php';

class RecetteControllers {

    public function index() {
        // Appelle le model
        $recettes = Recette::getAll();

        // Envoie à la vue
        require __DIR__ . '/../Views/accueil.php';
    }
}
