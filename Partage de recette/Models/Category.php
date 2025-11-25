<?php
require_once 'config.php';

class Category {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public static function getAll() {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM categories ORDER BY name ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
