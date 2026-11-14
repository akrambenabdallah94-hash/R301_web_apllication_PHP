<!DOCTYPE html>
<html>
    <body>
        <?php
            foreach($utilisateurs as $utilisateur){
                $loginHTML = $utilisateur->getLogin();
                $loginURL = $utilisateur->getLogin();
                echo '<p> Utilisateur de login ' . htmlspecialchars($loginHTML) . '</p>';
            }
        ?>
    </body>
</html>