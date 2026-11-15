<?php
    foreach($utilisateurs as $utilisateur){
        $loginHTML = htmlspecialchars($utilisateur->getLogin());
        $loginURL = rawurlencode($utilisateur->getLogin());
        echo '<p> Utilisateur : ' . $loginHTML . ' '
        . '<a href="frontController.php?action=read&controller=utilisateur&login=' . $loginURL . '">Voir les détails</a> | '
        . '<a href="frontController.php?action=delete&controller=utilisateur&login=' . $loginURL . '">Supprimer</a> | '
        . '<a href="frontController.php?action=update&controller=utilisateur&login=' . $loginURL . '">Modifier</a>'
        . '</p>';
    }
?>
<p><a href="frontController.php?action=create&controller=utilisateur">Créer un utilisateur</a></p>
