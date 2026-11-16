<?php
    foreach ($voitures as $voiture){
        $immatHTML = htmlspecialchars($voiture->getImmatriculation());
        $immatURL = rawurlencode($voiture->getImmatriculation());
        echo '<p> Voiture d\'immatriculation ' . $immatHTML . ' '
        . '<a href="frontController.php?action=read&immatriculation=' . $immatURL . '">Voir les détails</a> | '
        . '<a href="frontController.php?action=delete&immatriculation=' . $immatURL . '">Supprimer</a> | '
        . '<a href="frontController.php?action=update&immatriculation=' . $immatURL . '">Modifier</a>'
        . '</p>';
    }
?>
<p><a href="frontController.php?action=create">Créer une voiture</a></p>
