<!DOCTYPE html>
<html>
    <body>
        <?php
            foreach($utilisateurs as $utilisateur){
                $loginHTML = $utilisateur->getLogin();
                $loginURL = $utilisateur->getLogin();
                echo '<p> Utilisateur : ' . htmlspecialchars($loginHTML) .  ' <a href="frontController.php?action=read&controller=utilisateur&login=' . urlencode($loginURL) . '">' . "Détail de l'utilisateur" . '</a></p>';
            }
        ?>
    </body>
</html>