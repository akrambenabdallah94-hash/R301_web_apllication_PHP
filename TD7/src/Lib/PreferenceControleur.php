<?php 
    namespace App\Covoiturage\Lib;
    use App\Covoiturage\Model\HTTP\Cookie;
    
    class PreferenceControleur { 
        private static string $clePreference = "preferenceControleur"; 
        
        public static function enregistrer(string $preference) : void { 
            Cookie::enregistrer(static::$clePreference, $preference); 
        } 
        
        /*public static function lire() : string { 
            // À compléter 
            return ""; 
        } 
        
        public static function existe() : bool { 
            // À compléter 
        } 
        
        public static function supprimer() : void { 
            // À compléter 
        } */
    }
?>