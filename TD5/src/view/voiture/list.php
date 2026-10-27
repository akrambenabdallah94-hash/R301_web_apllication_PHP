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
                echo '<p> Voiture d\'immatriculation ' . $immat . ' '
                . '<a href="routeur.php?action=read&immatriculation=' . $immat . '">Voir les détails</a> | '
                . '<a href="routeur.php?action=delete&immatriculation=' . $immat . '">Supprimer</a>'
                . '</p>';
            }        
        ?>
    </body>
</html>
