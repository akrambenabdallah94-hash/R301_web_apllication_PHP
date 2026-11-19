<?php
    namespace App\Covoiturage\Model\HTTP;
    class Cookie {
        public static function enregistrer(string $cle, mixed $valeur, ?int $dureeExpiration = null) : void { 
            setcookie($cle, $valeur, $dureeExpiration);
        }

        public static function lire(string $cle) : mixed {
            return $_COOKIE[$cle];
        }
    }