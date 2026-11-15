<?php
/** @var App\Covoiturage\Model\DataObject\Voiture[] $voitures */
foreach ($voitures as $voiture) {
    $immatriculationHTML = htmlspecialchars($voiture->getImmatriculation());
    $immatriculationURL = rawurlencode($voiture->getImmatriculation());
    ?>
    <p>
        Voiture d'immatriculation <?= $immatriculationHTML ?> :
        <a href="frontController.php?controller=voiture&amp;action=read&amp;immatriculation=<?= $immatriculationURL ?>">Détails</a> |
        <a href="frontController.php?controller=voiture&amp;action=update&amp;immatriculation=<?= $immatriculationURL ?>">Modifier</a> |
        <a href="frontController.php?controller=voiture&amp;action=delete&amp;immatriculation=<?= $immatriculationURL ?>">Supprimer</a>
    </p>
<?php } ?>
<p><a href="frontController.php?controller=voiture&amp;action=create">Créer une voiture</a></p>
