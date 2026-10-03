<?php
    class Conf{

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

    }
?>
