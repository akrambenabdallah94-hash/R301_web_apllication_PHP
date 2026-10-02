<?php
    require_once "Model.php";
    require_once "C:\wamp64\www\R301_web\TD1\Voiture.php";

    $voitures = Voiture::getVoitures();
    foreach($voitures as $voiture){
        echo $voiture . "<br>";
    }
?>