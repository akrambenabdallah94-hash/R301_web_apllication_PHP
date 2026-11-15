<?php
/** @var App\Covoiturage\Model\DataObject\Utilisateur[] $utilisateurs */
foreach ($utilisateurs as $utilisateur) {
    $loginHTML = htmlspecialchars($utilisateur->getLogin());
    $loginURL = rawurlencode($utilisateur->getLogin());
    ?>
    <p>
        Utilisateur <?= $loginHTML ?> :
        <a href="frontController.php?controller=utilisateur&amp;action=read&amp;login=<?= $loginURL ?>">Détails</a> |
        <a href="frontController.php?controller=utilisateur&amp;action=update&amp;login=<?= $loginURL ?>">Modifier</a> |
        <a href="frontController.php?controller=utilisateur&amp;action=delete&amp;login=<?= $loginURL ?>">Supprimer</a>
    </p>
<?php } ?>
<p><a href="frontController.php?controller=utilisateur&amp;action=create">Créer un utilisateur</a></p>
