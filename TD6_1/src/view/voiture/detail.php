<!DOCTYPE html>
<html>
    
    <title>Détails</title>

    <body>
        <?php 
            echo htmlspecialchars($voiture->getMarque()) . ' ' . ' d\'immatriculation ' . htmlspecialchars($voiture->getImmatriculation()) . ' Nombres de sièges : ' . htmlspecialchars($voiture->getNbSieges()) . ' Couleur : ' . htmlspecialchars($voiture->getCouleur()) . '<br><br>';
        ?>
        <a href="frontController.php?action=readAll">Retour à la liste des immatriculations de voitures</a>
    </body>
</html>
