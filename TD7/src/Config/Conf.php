<?php
    namespace App\Covoiturage\Config;
    
    class Conf{

        // Durée (en secondes) d'inactivité au bout de laquelle une session expire
        static private int $dureeExpirationSession = 1800; // 30 minutes

        static private array $databases = array(
            'hostname'=>'localhost',
            'database'=>'TD2',
            'login'=>'root',
            'password'=>''
        );

        static public function getLogin() : string {
            return static::$databases['login'];
        } 

        static public function getHostname() : string{
            return static::$databases['hostname'];
        }

        static public function getDatabase() : string {
            return static::$databases['database'];
        }

        static public function getPassword() : string{
            return static::$databases['password'];
        }

        static public function getDureeExpirationSession() : int {
            return static::$dureeExpirationSession;
        }

    }
?>
