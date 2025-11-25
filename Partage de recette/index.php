<?php
session_start();

require_once __DIR__ . '/Models/config.php';
require_once __DIR__ . '/Controllers/RecetteController.php';
require_once __DIR__ . '/Controllers/RegisterController.php';
require_once "Controllers/LoginController.php";
require_once __DIR__ . '/Controllers/AddRecipeController.php';


$page = $_GET['page'] ?? 'home';

switch ($page) {

    case 'register':
        $controller = new RegisterController();
        $controller->index();
        break;

    case 'register_submit':
        $controller = new RegisterController();
        $controller->submit();
        break;

    case "login":
        (new LoginController())->show();
        break;

    case "login_submit":
        (new LoginController())->submit();
        break;

    case 'addRecipe':
        $controller = new AddRecipeController();
        $controller->show();
        break;

    case 'addRecipeSubmit':
        $controller = new AddRecipeController();
        $controller->submit();
        break;

    case 'home':
    default:
        $controller = new RecetteControllers();
        $controller->index();
        break;

    case 'recette':
        $controller = new RecetteControllers();
        $controller->show($_GET['id']);
        break;


    
}
