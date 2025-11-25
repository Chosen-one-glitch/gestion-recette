<?php
require_once 'config.php';

class Recette {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public static function getAll() {
        $db = Database::connect();
        $sql = "SELECT r.*, c.name AS category_name, u.username AS author
                FROM recipes r
                LEFT JOIN categories c ON r.category_id = c.id
                LEFT JOIN users u ON r.user_id = u.id
                ORDER BY r.created_at DESC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($title, $description, $category_id, $image_url, $prep_time, $cook_time, $portions, $user_id) {
        $sql = "INSERT INTO recipes (user_id, category_id, title, description, image_url, prep_time, cook_time, portions)
                VALUES (:user_id, :category_id, :title, :description, :image_url, :prep_time, :cook_time, :portions)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':user_id' => $user_id,
            ':category_id' => $category_id,
            ':title' => $title,
            ':description' => $description,
            ':image_url' => $image_url,
            ':prep_time' => $prep_time,
            ':cook_time' => $cook_time,
            ':portions' => $portions
        ]);
        return $this->db->lastInsertId();
    }

    public function addIngredient($recipe_id, $name, $quantity) {
        $sql = "INSERT INTO ingredients (recipe_id, name, quantity) VALUES (:recipe_id, :name, :quantity)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':recipe_id' => $recipe_id,
            ':name' => $name,
            ':quantity' => $quantity
        ]);
    }

    public function addStep($recipe_id, $step_number, $description) {
        $sql = "INSERT INTO steps (recipe_id, step_number, description) VALUES (:recipe_id, :step_number, :description)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':recipe_id' => $recipe_id,
            ':step_number' => $step_number,
            ':description' => $description
        ]);
    }

    public static function getById($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT r.*, c.name AS category_name, u.username AS author
                              FROM recipes r
                              LEFT JOIN categories c ON r.category_id = c.id
                              LEFT JOIN users u ON r.user_id = u.id
                              WHERE r.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getIngredients($recipe_id){
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM ingredients WHERE recipe_id = ? ORDER BY id ASC");
        $stmt->execute([$recipe_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getSteps($recipe_id){
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM steps WHERE recipe_id = ? ORDER BY step_number ASC");
        $stmt->execute([$recipe_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getRatings($recipe_id){
        $db = Database::connect();
        $stmt = $db->prepare("
            SELECT r.rating, r.comment, u.username
            FROM ratings r
            JOIN users u ON r.user_id = u.id
            WHERE r.recipe_id = ?
            ORDER BY r.created_at DESC
        ");
        $stmt->execute([$recipe_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function rateRecipe($user_id, $recipe_id, $rating, $comment){
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM ratings WHERE user_id = ? AND recipe_id = ?");
        $stmt->execute([$user_id, $recipe_id]);
        if($stmt->rowCount() > 0){
            $update = $db->prepare("UPDATE ratings SET rating = ?, comment = ?, created_at = NOW() WHERE user_id = ? AND recipe_id = ?");
            $update->execute([$rating, $comment, $user_id, $recipe_id]);
        } else {
            $insert = $db->prepare("INSERT INTO ratings (user_id, recipe_id, rating, comment) VALUES (?, ?, ?, ?)");
            $insert->execute([$user_id, $recipe_id, $rating, $comment]);
        }
    }

    public static function toggleFavorite($user_id, $recipe_id){
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM favorites WHERE user_id = ? AND recipe_id = ?");
        $stmt->execute([$user_id, $recipe_id]);
        if($stmt->rowCount() > 0){
            $delete = $db->prepare("DELETE FROM favorites WHERE user_id = ? AND recipe_id = ?");
            $delete->execute([$user_id, $recipe_id]);
            return false;
        } else {
            $insert = $db->prepare("INSERT INTO favorites (user_id, recipe_id) VALUES (?, ?)");
            $insert->execute([$user_id, $recipe_id]);
            return true;
        }
    }

    public static function getUserFavorites($user_id){
        $db = Database::connect();
        $stmt = $db->prepare("SELECT recipe_id FROM favorites WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
