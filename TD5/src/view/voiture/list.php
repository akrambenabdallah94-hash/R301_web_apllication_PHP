<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des voitures</title>
    </head>
    <body>
        <?php 
            foreach ($voitures as $voiture){
            $immat = $voiture->getImmatriculation();
                echo '<p> Voiture d\'immatriculation ' . htmlspecialchars($immat) . ' '
                . '<a href="frontController.php?action=read&immatriculation=' . htmlspecialchars($immat) . '">Voir les détails</a> | '
                . '<a href="frontController.php?action=delete&immatriculation=' . htmlspecialchars($immat) . '">Supprimer</a>'
                . '</p>';
            }        
        ?>
    </body>
</html>
