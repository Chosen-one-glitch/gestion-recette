<?php

require_once 'config.php';

class Recette {

    public static function getAll() {
        $db = Database::connect(); // 🔥 Connexion correcte

        $sql = "SELECT r.*, c.name AS category_name, u.username AS author
                FROM recipes r
                LEFT JOIN categories c ON r.category_id = c.id
                LEFT JOIN users u ON r.user_id = u.id
                ORDER BY r.created_at DESC";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Database::connect(); // 🔥 Idem ici

        $sql = "SELECT r.*, c.name AS category_name, u.username AS author
                FROM recipes r
                LEFT JOIN categories c ON r.category_id = c.id
                LEFT JOIN users u ON r.user_id = u.id
                WHERE r.id = ?";

        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
