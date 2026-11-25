<!DOCTYPE html>
<html>
    <body>
        <form method="get" action="frontController.php">
            <fieldset>
                <legend>Choisir un contrôleur par défaut :</legend>

                <input type="hidden" name="action" value="enregistrerPreference">

                <p>
                    <input type="radio" id="voitureId" name="controleur_defaut" value="voiture"
                        <?= $preferenceActuelle === 'voiture' ? 'checked' : '' ?>>
                    <label for="voitureId">Voiture</label>
                </p>

                <p>
                    <input type="radio" id="utilisateurId" name="controleur_defaut" value="utilisateur"
                        <?= $preferenceActuelle === 'utilisateur' ? 'checked' : '' ?>>
                    <label for="utilisateurId">Utilisateur</label>
                </p>

                <p>
                    <input type="radio" id="trajetId" name="controleur_defaut" value="trajet"
                        <?= $preferenceActuelle === 'trajet' ? 'checked' : '' ?>>
                    <label for="trajetId">Trajet</label>
                </p>

                <p>
                    <input type="submit" value="Envoyer">
                </p>
            </fieldset>
        </form>
    </body>
</html>