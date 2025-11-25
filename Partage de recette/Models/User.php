<?php
require_once 'config.php';
class User {
    private $db;

    public function __construct() {
        // Appelle propre à la classe Database
        $this->db = Database::connect();
    }

    public function create($username, $email, $password) {

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $query = $this->db->prepare("
            INSERT INTO users (username, email, password_hash)
            VALUES (:username, :email, :password)
        ");

        try {
            return $query->execute([
                ':username' => $username,
                ':email' => $email,
                ':password' => $hash
            ]);

        } catch (PDOException $e) {
            echo "Erreur SQL : " . $e->getMessage();
            return false;
        }
    }

    public function login($email, $password) {
        $query = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute([":email" => $email]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return false; // email non trouvé
        }

        // Vérification du mot de passe
        if (password_verify($password, $user['password_hash'])) {
            return $user; // OK : on renvoie toutes les infos
        }

        return false; // mot de passe incorrect
    }

}
