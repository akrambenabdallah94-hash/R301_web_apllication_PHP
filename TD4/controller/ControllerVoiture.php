<?php
    require_once __DIR__ . '/../model/ModelVoiture.php'; // Chargement du modèle

    class ControllerVoiture{
        // Déclaration de type de retour void : la fonction ne retourne pas de valeur
        public static function readAll() : void {
            $voitures = ModelVoiture::getVoitures(); // Appel au modèle pour gerer la BDD
            require __DIR__ . '/../view/voiture/list.php'; //redirige vers la vue
        }

        public static function read() : void {
            $immatriculation = $_GET['immatriculation']; // Récupère l'immatriculation depuis l'URL, ou une chaîne vide si elle n'est pas définie
            $voiture = ModelVoiture::getVoitureParImmat($immatriculation);
            if($voiture == null){
                require __DIR__ . '/../view/voiture/error.php'; //redirige vers la vue d'erreur
            }
            require __DIR__ . '/../view/voiture/detail.php'; //redirige vers la vue
        }    
    }
?>