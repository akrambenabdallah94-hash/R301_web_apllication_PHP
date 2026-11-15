<?php /** @var App\Covoiturage\Model\DataObject\Voiture $voiture */ ?>
<p>
    Voiture <?= htmlspecialchars($voiture->getMarque()) ?>
    d'immatriculation <?= htmlspecialchars($voiture->getImmatriculation()) ?>,
    couleur <?= htmlspecialchars($voiture->getCouleur()) ?>,
    <?= htmlspecialchars($voiture->getNbSieges()) ?> sièges.
</p>
<p>
    <a href="frontController.php?controller=voiture&amp;action=update&amp;immatriculation=<?= rawurlencode($voiture->getImmatriculation()) ?>">Modifier</a> |
    <a href="frontController.php?controller=voiture&amp;action=delete&amp;immatriculation=<?= rawurlencode($voiture->getImmatriculation()) ?>">Supprimer</a> |
    <a href="frontController.php?controller=voiture&amp;action=readAll">Retour à la liste des voitures</a>
</p>
