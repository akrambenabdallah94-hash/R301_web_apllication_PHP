<?php
    require_once 'Model.php';
    require_once 'C:\wamp64\www\R301_web\TD1\Trajet.php';

    $trajets = Trajet::getTrajets();
    foreach ($trajets as $trajet) {
        echo $trajet . "\n";
    }
?>