<!DOCTYPE html>
<html>
    <body>
        <?php
            foreach($utilisateurs as $utilisateur){
                $loginHTML = $utilisateur->getLogin();
                $loginURL = $utilisateur->getLogin();
                echo '<p> Utilisateur : ' . htmlspecialchars($loginHTML) .  ' <a href="frontController.php?action=read&controller=utilisateur&login=' . urlencode($loginURL) . '">' . " Détail de l'utilisateur | " . '</a>'
                . '<a href="frontController.php?action=delete&controller=utilisateur&login=' . '">' . "Supprimer l'utilisateur" . '</a> | '
                . '<a href="frontController.php?action=update&controller=utilisateur&login=' . urlencode($loginURL) . '">' . "Modifier l'utilisateur" . '</a> | '
                . '<a href="frontController.php?action=create&controller=utilisateur&login=' . urlencode($loginURL) . '">' . "Créer un utilisateur" . '</a> |'
                . '</p>';
            }
        ?>
    </body>
</html>