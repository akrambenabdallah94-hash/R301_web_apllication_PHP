<?php
    require_once __DIR__ . '/../model/ModelVoiture.php'; // Chargement du modèle
    $voiture = ModelVoiture::getVoiture(); //Appel au modèle pour gerer la BD
    require __DIR__ . '/../view/voiture/list.php'; //redirige vers la vue
?>