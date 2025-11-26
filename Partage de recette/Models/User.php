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

    public static function countUserRecipes($user_id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT COUNT(*) FROM recipes WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchColumn();
    }

    public static function getUserAverageRating($user_id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT AVG(rating) FROM ratings WHERE user_id = ?");
        $stmt->execute([$user_id]);
        $result = $stmt->fetchColumn();

        return $result ? round($result, 1) : 0;
    }

    public static function changePassword($user_id, $current, $new) {
    $db = Database::connect();

    // Vérifier l'ancien mot de passe
    $stmt = $db->prepare("SELECT password_hash FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$data || !password_verify($current, $data['password_hash'])) {
        return "Mot de passe actuel incorrect.";
    }

    // Mettre à jour
    $newHash = password_hash($new, PASSWORD_DEFAULT);

    $stmt = $db->prepare("UPDATE users SET password_hash = ? WHERE id = ?");
    $stmt->execute([$newHash, $user_id]);

    return true;
}


    public static function getById($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT id, username, email FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
