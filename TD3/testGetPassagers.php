<?php
    require_once "Trajet.php";
    require_once "Utilisateur.php";
    require_once "Model.php";
    
    $id = $_GET['id']; // Utilisation de l'opérateur de coalescence nulle pour définir une valeur par défaut
    $passagers = Trajet::getPassagers($id);
    foreach($passagers as $passager){
        echo $passager;
    }
?>