<?php
    require_once "Conf.php";

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