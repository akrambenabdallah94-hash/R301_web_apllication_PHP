<p>
    <?= htmlspecialchars($utilisateur->getNom()) ?> <?= htmlspecialchars($utilisateur->getPrenom()) ?> (Login : <?= htmlspecialchars($utilisateur->getLogin()) ?>)
</p>
<p>
    <a href="frontController.php?action=update&controller=utilisateur&login=<?= rawurlencode($utilisateur->getLogin()) ?>">Modifier l'utilisateur</a><br><br>
    <a href="frontController.php?action=readAll&controller=utilisateur">Retour à la liste des utilisateurs</a>
</p>
