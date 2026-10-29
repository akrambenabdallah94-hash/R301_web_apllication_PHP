<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des voitures</title>
    </head>
    <body>
        <?php 
            foreach ($voitures as $voiture){
            $immatHTML = $voiture->getImmatriculation();
            $immatURL = $voiture->getImmatriculation();
                echo '<p> Voiture d\'immatriculation ' . htmlspecialchars($immatHTML) . ' '
                . '<a href="frontController.php?action=read&immatriculation=' . rawurlencode($immatURL). '">Voir les détails</a> | '
                . '<a href="frontController.php?action=delete&immatriculation=' .rawurlencode($immatURL). '">Supprimer</a>'
                . '</p>';
            }        
        ?>
    </body>
</html>
