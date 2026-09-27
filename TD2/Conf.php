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

    }
?>
