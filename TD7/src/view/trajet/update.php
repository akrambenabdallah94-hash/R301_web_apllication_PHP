<?php /** @var App\Covoiturage\Model\DataObject\Trajet $trajet */ ?>
<form method="get" action="frontController.php">
    <fieldset>
        <legend>Mise à jour d'un trajet :</legend>
        <input type="hidden" name="controller" value="trajet">
        <input type="hidden" name="action" value="updated">
        <input type="hidden" name="id" value="<?= htmlspecialchars($trajet->getId()) ?>">
        <p>
            <label for="depart_id">Ville de départ</label> :
            <input type="text" value="<?= htmlspecialchars($trajet->getVilleDepart()) ?>" name="depart" id="depart_id" required>
        </p>
        <p>
            <label for="arrivee_id">Ville d'arrivée</label> :
            <input type="text" value="<?= htmlspecialchars($trajet->getVilleArrivee()) ?>" name="arrivee" id="arrivee_id" required>
        </p>
        <p>
            <label for="date_id">Date</label> :
            <input type="date" value="<?= htmlspecialchars($trajet->getDateDepart()) ?>" name="date" id="date_id" required>
        </p>
        <p>
            <label for="nbPlaces_id">Nombre de places</label> :
            <input type="number" min="1" value="<?= htmlspecialchars($trajet->getNbPlaces()) ?>" name="nbPlaces" id="nbPlaces_id" required>
        </p>
        <p>
            <label for="prix_id">Prix (€)</label> :
            <input type="number" min="0" step="0.01" value="<?= htmlspecialchars($trajet->getPrix()) ?>" name="prix" id="prix_id" required>
        </p>
        <p>
            <label for="conducteur_id">Login du conducteur</label> :
            <input type="text" value="<?= htmlspecialchars($trajet->getConducteurLogin()) ?>" name="conducteurLogin" id="conducteur_id" required>
        </p>
        <p><input type="submit" value="Envoyer"></p>
    </fieldset>
</form>
