<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des voitures</title>
    </head>
    <body>
        <?php 
            echo $voiture->getMarque() . ' ' . ' d\'immatriculation ' . $voiture->getImmatriculation() . ' Nombres de sièges : ' . $voiture->getNbSieges() . ' Couleur : ' . $voiture->getCouleur() . '<br><br>';
        ?>
        <a href="routeur.php?action=readAll">Retour à la liste des immatriculations de voitures</a>
    </body>
</html>
