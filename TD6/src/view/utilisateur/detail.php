<?php /** @var App\Covoiturage\Model\DataObject\Utilisateur $utilisateur */ ?>
<p>
    <?= htmlspecialchars($utilisateur->getPrenom()) ?> <?= htmlspecialchars($utilisateur->getNom()) ?>
    (login : <?= htmlspecialchars($utilisateur->getLogin()) ?>)
</p>
<p>
    <a href="frontController.php?controller=utilisateur&amp;action=update&amp;login=<?= rawurlencode($utilisateur->getLogin()) ?>">Modifier</a> |
    <a href="frontController.php?controller=utilisateur&amp;action=delete&amp;login=<?= rawurlencode($utilisateur->getLogin()) ?>">Supprimer</a> |
    <a href="frontController.php?controller=utilisateur&amp;action=readAll">Retour à la liste des utilisateurs</a>
</p>
