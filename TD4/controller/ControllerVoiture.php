<?php
    require_once __DIR__ . '/../model/ModelVoiture.php'; // Chargement du modèle

    class ControllerVoiture{
        // Déclaration de type de retour void : la fonction ne retourne pas de valeur
        public static function readAll() : void{
            $voitures = ModelVoiture::getVoitures(); // Appel au modèle pour gerer la BDD
            require __DIR__ . '/../view/voiture/list.php'; //redirige vers la vue
        }
    }
?>