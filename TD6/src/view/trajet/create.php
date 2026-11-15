<form method="get" action="frontController.php">
    <fieldset>
        <legend>Création d'un trajet :</legend>
        <input type="hidden" name="controller" value="trajet">
        <input type="hidden" name="action" value="created">
        <p>
            <label for="depart_id">Ville de départ</label> :
            <input type="text" placeholder="Montpellier" name="depart" id="depart_id" required>
        </p>
        <p>
            <label for="arrivee_id">Ville d'arrivée</label> :
            <input type="text" placeholder="Sète" name="arrivee" id="arrivee_id" required>
        </p>
        <p>
            <label for="date_id">Date</label> :
            <input type="date" name="date" id="date_id" required>
        </p>
        <p>
            <label for="nbPlaces_id">Nombre de places</label> :
            <input type="number" min="1" placeholder="3" name="nbPlaces" id="nbPlaces_id" required>
        </p>
        <p>
            <label for="prix_id">Prix (€)</label> :
            <input type="number" min="0" step="0.01" placeholder="10" name="prix" id="prix_id" required>
        </p>
        <p>
            <label for="conducteur_id">Login du conducteur</label> :
            <input type="text" name="conducteurLogin" id="conducteur_id" required>
        </p>
        <p><input type="submit" value="Envoyer"></p>
    </fieldset>
</form>
