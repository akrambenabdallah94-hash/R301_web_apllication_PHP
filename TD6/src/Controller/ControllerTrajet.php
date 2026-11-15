<?php
    namespace App\Covoiturage\Controller;
    use App\Covoiturage\Model\Repository\TrajetRepository; // Indispensable

    class ControllerTrajet {
        public static function readAll() : void {
            $trajets = TrajetRepository::getTrajets(); // Appel au modèle pour gerer la BDD
            ControllerTrajet::afficheVue('view.php', ['trajets' => $trajets, 'pagetitle' => 'Listes des trajets', 'cheminVueBody' => "trajet/list.php" ]);
        }  
        
        public static function afficheVue(string $cheminVue, array $parametres=[]) : void{
            extract($parametres); // Crée des variables à partir du tableay $paramètres
            require __DIR__ . '/../view/'. $cheminVue; //Charge la vue spécifiée en paramètre
        }

        public static function error(string $errorMessage="") : void {
            ControllerTrajet::afficheVue('view.php', ['pagetitle' => "Page d'erreur", 'cheminVueBody' => "trajet/error.php", 'errorMessage' => $errorMessage]);
        }
    }
?>