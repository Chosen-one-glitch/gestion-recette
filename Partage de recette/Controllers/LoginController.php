<?php
require_once 'Models/User.php';

class LoginController {

    public function show() {
        require 'Views/login.php';
    }

    public function submit() {
        session_start();

        $email = $_POST['email'];
        $password = $_POST['password'];

        $userModel = new User();
        $user = $userModel->login($email, $password);

        if ($user) {
            $_SESSION['user'] = $user; // on stocke toutes les infos utiles
            header("Location: index.php?page=home");
            exit;
        } else {
            $error = "Email ou mot de passe incorrect.";
            require 'Views/login.php';
        }
    }
}
