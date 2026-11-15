<!DOCTYPE html>
<html>
    
    <title>Détails</title>

    <body>
        <?php 
            echo htmlspecialchars($utilisateur->getNom()) . ' ' . htmlspecialchars($utilisateur->getPrenom()) . ' (Login : ' . htmlspecialchars($utilisateur->getLogin()) . ')<br><br>';
        ?>
        <a href="frontController.php?action=readAll&controller=utilisateur">Retour à la liste des utilisateurs</a>
    </body>
</html>
