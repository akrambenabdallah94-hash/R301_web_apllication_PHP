<?php
    require_once __DIR__ . '/../model/ModelVoiture.php'; // Chargement du modèle
    $voitures = ModelVoiture::getVoitures(); //Appel au modèle pour gerer la BD
    require __DIR__ . '/../view/voiture/list.php'; //redirige vers la vue
?>