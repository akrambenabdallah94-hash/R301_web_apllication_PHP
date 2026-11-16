<form method="get" action="frontController.php">
    <fieldset>
        <legend>Mise à jour d'un utilisateur :</legend>

        <input type="hidden" name="controller" value="utilisateur"/>
        <input type="hidden" name="action" value="updated"/>

        <p>
            <label for="login_id">Login</label> :
            <input type="text" value="<?= htmlspecialchars($utilisateur->getLogin()) ?>" name="login" id="login_id" readonly/>
        </p>
        <p>
            <label for="nom_id">Nom</label> :
            <input type="text" value="<?= htmlspecialchars($utilisateur->getNom()) ?>" name="nom" id="nom_id" required/>
        </p>
        <p>
            <label for="prenom_id">Prénom</label> :
            <input type="text" value="<?= htmlspecialchars($utilisateur->getPrenom()) ?>" name="prenom" id="prenom_id" required/>
        </p>
        <p>
            <input type="submit" value="Envoyer"/>
        </p>
    </fieldset>
</form>
