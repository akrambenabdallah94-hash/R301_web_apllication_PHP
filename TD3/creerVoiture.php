<?php
    require_once "Voiture.php";
    require_once "Model.php";

    if(empty($_POST)){
        echo "Le tableau est vide<br></br>";
    } else {
        echo "Le tableau n'est pas vide<br></br>";
    }

    $voiture = new Voiture($_POST['immatriculation'], $_POST['marque'], $_POST['couleur'], $_POST['nbSieges']);
    $voiture->sauvegarder();

    echo "Voiture créée : " . $voiture;