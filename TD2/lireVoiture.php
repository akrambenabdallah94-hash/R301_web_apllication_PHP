<?php
    require_once "Model.php";
    require_once "C:\wamp64\www\R301_web\TD1\Voiture.php";

    $model = new Model();
    $pdoStatement = $model->getPdo()->query('SELECT * FROM voiture');

    foreach($pdoStatement as $voitureFormatTableau){
        $voiture = new Voiture($voitureFormatTableau["immatriculationBDD"], $voitureFormatTableau["marqueBDD"], $voitureFormatTableau["couleurBDD"], $voitureFormatTableau["nbSiegesBDD"]);
        echo $voiture . "<br>";
    }
?>