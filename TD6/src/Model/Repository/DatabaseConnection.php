<?php
namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Config\Conf;
use PDO;

/**
 * Singleton de connexion à la base de données (utilise Conf).
 */
class DatabaseConnection {
    private static ?DatabaseConnection $instance = null;
    private PDO $pdo;

    private function __construct() {
        $dsn = "mysql:host=" . Conf::getHostname() . ";dbname=" . Conf::getDatabase() . ";charset=utf8";
        $this->pdo = new PDO($dsn, Conf::getLogin(), Conf::getPassword());
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public static function getPdo(): PDO {
        return static::getInstance()->pdo;
    }

    private static function getInstance(): DatabaseConnection {
        if (is_null(static::$instance)) {
            static::$instance = new DatabaseConnection();
        }
        return static::$instance;
    }
}
