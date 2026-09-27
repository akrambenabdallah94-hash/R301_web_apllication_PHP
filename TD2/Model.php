<?php
    require_once "Conf.php";

    class Model{
        private $pdo;
        private string $hostname;
        private string $login;
        private string $password;
        private string $databaseName;

        public function getPdo(){
            return $this->pdo;
        }

        public function __construct(){
            $this->hostname = Conf::getHostname();
            $this->login = Conf::getLogin();
            $this->password = Conf::getPassword();
            $this->databaseName = Conf::getDatabase();
            $this->pdo = new PDO("mysql:host={$this->hostname};dbname={$this->databaseName}",$this->login,$this->password);
        }
    }
?>