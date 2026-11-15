<?php
/** @var App\Covoiturage\Model\DataObject\Trajet[] $trajets */
foreach ($trajets as $trajet) {
    $idURL = rawurlencode((string)$trajet->getId());
    ?>
    <p>
        Trajet de <?= htmlspecialchars($trajet->getVilleDepart()) ?> à <?= htmlspecialchars($trajet->getVilleArrivee()) ?> :
        <a href="frontController.php?controller=trajet&amp;action=read&amp;id=<?= $idURL ?>">Détails</a> |
        <a href="frontController.php?controller=trajet&amp;action=update&amp;id=<?= $idURL ?>">Modifier</a> |
        <a href="frontController.php?controller=trajet&amp;action=delete&amp;id=<?= $idURL ?>">Supprimer</a>
    </p>
<?php } ?>
<p><a href="frontController.php?controller=trajet&amp;action=create">Créer un trajet</a></p>
