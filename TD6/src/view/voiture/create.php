<form method="get" action="frontController.php">
    <fieldset>
        <legend>Création d'une voiture :</legend>
        <input type="hidden" name="controller" value="voiture">
        <input type="hidden" name="action" value="created">
        <p>
            <label for="immat_id">Immatriculation</label> :
            <input type="text" placeholder="256AB34" name="immatriculation" id="immat_id" maxlength="8" required>
        </p>
        <p>
            <label for="marque_id">Marque</label> :
            <input type="text" placeholder="Renault" name="marque" id="marque_id" required>
        </p>
        <p>
            <label for="couleur_id">Couleur</label> :
            <input type="text" placeholder="Rouge" name="couleur" id="couleur_id" required>
        </p>
        <p>
            <label for="nbSieges_id">Nombre de sièges</label> :
            <input type="number" min="1" placeholder="5" name="nbSieges" id="nbSieges_id" required>
        </p>
        <p><input type="submit" value="Envoyer"></p>
    </fieldset>
</form>
