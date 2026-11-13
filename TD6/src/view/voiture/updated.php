<!DOCTYPE html>
<html>
    <body>
        <?php
            echo "<p>La voiture d'immatriculation " . $voiture->getImmatriculation() . " a bien été mise à jour !</p>";
        ?>
        <a href="frontController.php?action=readAll">Retour à la liste des voitures</a>
    </body>
</html>