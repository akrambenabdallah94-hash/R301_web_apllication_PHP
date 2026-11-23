<?php
    namespace App\Covoiturage\Model\HTTP;
    class Cookie {
        public static function enregistrer(string $cle, mixed $valeur, ?int $dureeExpiration = null) : void { 
            setcookie($cle, $valeur, $dureeExpiration);
        }

        public static function lire(string $cle) : mixed {
            return $_COOKIE[$cle];
        }

        public static function contient(string $cle) : bool {
            return isset($_COOKIE[$cle]);
        }

        public static function supprimer(string $cle) : void { 
            setcookie($cle, '', time() - 3600);
        }
    }