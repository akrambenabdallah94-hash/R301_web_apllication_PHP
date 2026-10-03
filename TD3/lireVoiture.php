<?php
    require_once "Model.php";
    require_once "Voiture.php";

    $voitures = Voiture::getVoitures();
    foreach($voitures as $voiture){
        echo $voiture . "<br>";
    }

    $immat = "ABCD1234";

    $voiture2 = Voiture::getVoitureParImmat($immat);
    echo "Avec l'imatriculation : {$immat} : " . $voiture2 . "<br>";

    $voiture1 = Voiture::getVoitureParImmat("ABC123DE");
    echo $voiture1 . "<br>";
?>