<!DOCTYPE html>
<html>
    <body>
        <form method="get" action="frontController.php">
            <fieldset>
                <legend>Mon formulaire :</legend>

                <!-- On ajoute l'action dans un champ caché -->
                <input type="hidden" name="action" value="updated"/>
                
                <p>
                    <label for="immat_id">Immatriculation</label> :
                    <input type="text" value="<?= htmlspecialchars($voiture->getImmatriculation()) ?>" name="immatriculation" id="immat_id" readonly/>
                </p>

                <p>
                    <label for="marque_id">Marque</label> :
                    <input type="text" value="<?= htmlspecialchars($voiture->getMarque()) ?>" name="marque" id="marque_id"/>
                </p>

                <p>
                    <label for="couleur_id">Couleur</label> :
                    <input type="text" value="<?= htmlspecialchars($voiture->getCouleur()) ?>" name="couleur" id="couleur_id"/>
                </p>

                <p>
                    <label for="nbSieges_id">Nombre de sièges</label> :
                    <input type="number" value="<?= htmlspecialchars($voiture->getNbSieges()) ?>" name="nbSieges" id="nbSieges_id"/>
                </p>

                <p>
                    <input type="submit" value="Envoyer"/>
                </p>

            </fieldset>
        </form>
    </body>
</html>