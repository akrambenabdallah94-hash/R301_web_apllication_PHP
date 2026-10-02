<?php
    require_once 'Model.php';
    require_once 'C:\wamp64\www\R301_web\TD1\Utilisateur.php';

    $utilisateur = Utilisateur::getUtilisateurByLogin('ak94u');
    if ($utilisateur) {
        echo $utilisateur . "\n";
    }
?>