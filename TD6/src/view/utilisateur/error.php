<h1>Erreur</h1>
<p>
    Problème avec l'utilisateur<?= $errorMessage !== '' ? ' : ' . htmlspecialchars($errorMessage) : '' ?>
</p>
<p><a href="frontController.php?controller=utilisateur&amp;action=readAll">Retour à la liste des utilisateurs</a></p>
