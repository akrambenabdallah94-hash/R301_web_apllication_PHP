<?php
    namespace App\Covoiturage\Model\HTTP; 
    
    use App\Covoiturage\Config\Conf;
    use Exception; 
    
    class Session 
    { 
        private static ?Session $instance = null; 
    
        /** 
         * @throws Exception 
         */ 
        private function __construct() 
        { 
            if (session_start() === false) { 
                throw new Exception("La session n'a pas réussi à démarrer."); 
            } 
        } 
    
        public static function getInstance(): Session { 
            if (is_null(static::$instance)) {
                static::$instance = new Session(); 
                // On ne vérifie l'expiration qu'au démarrage de la session
                static::$instance->verifierDerniereActivite();
            }
            return static::$instance; 
        } 

        public function contient(string $name): bool { 
            return isset($_SESSION[$name]);
        } 
    
        public function enregistrer(string $name, mixed $value): void { 
            $_SESSION[$name] = $value;
        } 
    
        public function lire(string $name): mixed { 
            return $_SESSION[$name];
        } 
    
        public function supprimer(string $name): void { 
            unset($_SESSION[$name]);
        } 
    
        public function detruire() : void { 
            session_unset();     // unset $_SESSION variable for the run-time 
            session_destroy();   // destroy session data in storage 
            Cookie::supprimer(session_name()); // deletes the session cookie 
            // Il faudra reconstruire la session au prochain appel de getInstance() 
            static::$instance = null; 
        }         

        public function verifierDerniereActivite() : void {
            $dureeExpiration = Conf::getDureeExpirationSession();
            if (isset($_SESSION['derniereActivite']) && (time() - $_SESSION['derniereActivite'] > $dureeExpiration))
                session_unset();     // La session a expiré : on vide les variables de session
            $_SESSION['derniereActivite'] = time(); // On met à jour la date de dernière activité
        }
    }
