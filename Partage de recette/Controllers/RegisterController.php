<?php

class RegisterController {
    public function index() {
        require __DIR__ . '/../views/register.php';
    }

    public function submit() {
        require_once __DIR__ . '/../models/User.php';

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = new User();

        if ($user->create($username, $email, $password)) {
            echo "Inscription réussie ! <a href='index.php'>Retour à l’accueil</a>";
        } else {
            echo "Erreur lors de l'inscription. Le nom ou l'email existe peut-être déjà.";
        }
    }
}
