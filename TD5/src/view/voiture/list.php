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
                echo htmlspecialchars('<p> Voiture d\'immatriculation ' . $immat . ' '
                . '<a href="frontController.php?action=read&immatriculation=' . $immat . '">Voir les détails</a> | '
                . '<a href="frontController.php?action=delete&immatriculation=' . $immat . '">Supprimer</a>'
                . '</p>');
            }        
        ?>
    </body>
</html>
