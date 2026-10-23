<?php
    /**
     * Classe Model
     * 
     * Cette classe est un singleton qui permet de se connecter à la base de données.
     * Elle utilise la classe Conf pour récupérer les informations de connexion.
     * 
     * @author : Akram Ben Abdallah
     */

    //__DIR__ est une constante magique qui contient le chemin du dossier du fichier en cours d'exécution
    namespace App\Covoiturage\Model\Model;
    use App\Covoiturage\Config\Conf;

    class Model{
        private static $instance = null;
        private $pdo;
        private string $hostname;
        private string $login;
        private string $password;
        private string $databaseName;

        public static function getPdo(){
            return static::getInstance()->pdo;
        }

        public function __construct(){
            $this->hostname = Conf::getHostname();
            $this->login = Conf::getLogin();
            $this->password = Conf::getPassword();
            $this->databaseName = Conf::getDatabase();
            $this->pdo = new PDO("mysql:host={$this->hostname};dbname={$this->databaseName}",$this->login,$this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        private static function getInstance(){
            if(is_null(static::$instance))
                static::$instance = new Model();
            return static::$instance;
        }
    }
?>