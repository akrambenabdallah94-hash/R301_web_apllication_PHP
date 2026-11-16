<?php /** @var App\Covoiturage\Model\DataObject\Trajet $trajet */ ?>
<p>
    Trajet n°<?= htmlspecialchars($trajet->getId()) ?> :
    <?= htmlspecialchars($trajet->getVilleDepart()) ?> → <?= htmlspecialchars($trajet->getVilleArrivee()) ?>,
    le <?= htmlspecialchars($trajet->getDateDepart()) ?>,
    <?= htmlspecialchars($trajet->getNbPlaces()) ?> places,
    <?= htmlspecialchars($trajet->getPrix()) ?> €,
    conducteur :
    <a href="frontController.php?controller=utilisateur&amp;action=read&amp;login=<?= rawurlencode($trajet->getConducteurLogin()) ?>"><?= htmlspecialchars($trajet->getConducteurLogin()) ?></a>
</p>
<p>
    <a href="frontController.php?controller=trajet&amp;action=update&amp;id=<?= rawurlencode((string)$trajet->getId()) ?>">Modifier</a> |
    <a href="frontController.php?controller=trajet&amp;action=delete&amp;id=<?= rawurlencode((string)$trajet->getId()) ?>">Supprimer</a> |
    <a href="frontController.php?controller=trajet&amp;action=readAll">Retour à la liste des trajets</a>
</p>
