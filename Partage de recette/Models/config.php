<?php
class Database {
    private static $db = null;

    public static function connect() {
        if (self::$db === null) {
            try {
                self::$db = new PDO(
                    "mysql:host=localhost;dbname=partage_recette;charset=utf8",
                    "root",
                    ""
                );
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                die("Erreur connexion DB : " . $e->getMessage());
            }
        }

        return self::$db;
    }
}
