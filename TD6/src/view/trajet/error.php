<h1>Erreur</h1>
<p>
    Problème avec le trajet<?= $errorMessage !== '' ? ' : ' . htmlspecialchars($errorMessage) : '' ?>
</p>
<p><a href="frontController.php?controller=trajet&amp;action=readAll">Retour à la liste des trajets</a></p>
