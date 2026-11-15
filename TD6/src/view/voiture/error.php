<h1>Erreur</h1>
<p>
    Problème avec la voiture<?= $errorMessage !== '' ? ' : ' . htmlspecialchars($errorMessage) : '' ?>
</p>
<p><a href="frontController.php?controller=voiture&amp;action=readAll">Retour à la liste des voitures</a></p>
