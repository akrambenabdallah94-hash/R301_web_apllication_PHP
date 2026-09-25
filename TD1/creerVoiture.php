<?php
    require_once "C:\wamp64\www\R301_web\TD1\Voiture.php";

    if(empty($_POST)){
        echo "Le tableau est vide<br></br>";
    } else {
        echo "Le tableau n'est pas vide<br></br>";
    }

    $voiture = new Voiture($_POST['marque'], $_POST['immatriculation'], $_POST['couleur'], $_POST['nbSieges']);

    echo $voiture;
?>