<?php
    namespace App\Covoiturage\Model\HTTP;
    class Cookie {
        public static function enregistrer(string $cle, mixed $valeur, ?int $dureeExpiration = null) : void { 
            if ($dureeExpiration === null) { // On teste si la valeur de la duree d'expiration est null 
                $dureeExpiration = 0; // On affecte 0 à la durée d'expiration donc le cookie expire à la fin de la session
            }else{
                $dureeExpiration = time() + $dureeExpiration;
            }
            setcookie($cle, $valeur, $dureeExpiration, '/'); // Chemin '/' : le cookie est valable pour tout le site
        }

        public static function lire(string $cle) : mixed {
            return $_COOKIE[$cle];
        }

        public static function contient(string $cle) : bool {
            return isset($_COOKIE[$cle]);
        }

        public static function supprimer(string $cle) : void { 
            unset($_COOKIE[$cle]); // On efface le cookie lu par PHP
            setcookie($cle, '', 1, '/'); // On le supprime chez le client en lui donnant une date d'expiration passée (même chemin qu'à l'enregistrement)
        }
    }