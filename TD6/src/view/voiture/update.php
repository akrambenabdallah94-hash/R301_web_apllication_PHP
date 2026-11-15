<?php /** @var App\Covoiturage\Model\DataObject\Voiture $voiture */ ?>
<form method="get" action="frontController.php">
    <fieldset>
        <legend>Mise à jour d'une voiture :</legend>
        <input type="hidden" name="controller" value="voiture">
        <input type="hidden" name="action" value="updated">
        <p>
            <label for="immat_id">Immatriculation</label> :
            <input type="text" value="<?= htmlspecialchars($voiture->getImmatriculation()) ?>" name="immatriculation" id="immat_id" readonly>
        </p>
        <p>
            <label for="marque_id">Marque</label> :
            <input type="text" value="<?= htmlspecialchars($voiture->getMarque()) ?>" name="marque" id="marque_id" required>
        </p>
        <p>
            <label for="couleur_id">Couleur</label> :
            <input type="text" value="<?= htmlspecialchars($voiture->getCouleur()) ?>" name="couleur" id="couleur_id" required>
        </p>
        <p>
            <label for="nbSieges_id">Nombre de sièges</label> :
            <input type="number" min="1" value="<?= htmlspecialchars($voiture->getNbSieges()) ?>" name="nbSieges" id="nbSieges_id" required>
        </p>
        <p><input type="submit" value="Envoyer"></p>
    </fieldset>
</form>
