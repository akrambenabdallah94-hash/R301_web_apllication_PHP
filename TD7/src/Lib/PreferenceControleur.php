<?php 
    namespace App\Covoiturage\Lib;
    use App\Covoiturage\Model\HTTP\Cookie;
    
    class PreferenceControleur { 
        private static string $clePreference = "preferenceControleur"; 
        
        public static function enregistrer(string $preference) : void { 
            Cookie::enregistrer(static::$clePreference, $preference); 
        } 

        public static function existe() : bool { 
            return Cookie::lire(static::$clePreference);
        } 
        
        public static function lire() : string { 
            return Cookie::lire(static::$clePreference); 
        } 
        
        
        public static function supprimer() : void { 
            Cookie::supprimer(static::$clePreference);
        } 
    }
?>