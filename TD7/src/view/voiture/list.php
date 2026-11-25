<?php
    foreach ($voitures as $voiture){
        $immatHTML = htmlspecialchars($voiture->getImmatriculation());
        $immatURL = rawurlencode($voiture->getImmatriculation());
        echo '<p> Voiture d\'immatriculation ' . $immatHTML . ' '
        . '<a href="frontController.php?controller=voiture&action=read&immatriculation=' . $immatURL . '">Voir les détails</a> | '
        . '<a href="frontController.php?controller=voiture&action=delete&immatriculation=' . $immatURL . '">Supprimer</a> | '
        . '<a href="frontController.php?controller=voiture&action=update&immatriculation=' . $immatURL . '">Modifier</a>'
        . '</p>';
    }
?>
<p><a href="frontController.php?controller=voiture&action=create">Créer une voiture</a></p>