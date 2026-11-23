<?php
    namespace App\Covoiturage\Controller;
    use App\Covoiturage\Model\Repository\TrajetRepository; // Indispensable

    class ControllerTrajet extends GenericController {
        public static function readAll() : void {
            $trajets = (new TrajetRepository())->selectAll(); // Appel au modèle pour gerer la BDD
            GenericController::afficheVue('view.php', ['trajets' => $trajets, 'pagetitle' => 'Listes des trajets', 'cheminVueBody' => "trajet/list.php" ]);
        }  
    }
?>