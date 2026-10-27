<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Création d'une voiture</title>
    </head>
    <body>
        <form method="get" action="/../TD5/src/controller/web/frontController.php">
            <fieldset>
                <legend>Mon formulaire :</legend>

                <!-- On ajoute l'action dans un champ caché -->
                <input type="hidden" name="action" value="created"/>
                
                <p>
                    <label for="immat_id">Immatriculation</label> :
                    <input type="text" placeholder="256AB34" name="immatriculation" id="immat_id" required/>
                </p>

                <p>
                    <label for="marque_id">Marque</label> :
                    <input type="text" placeholder="Renault" name="marque" id="marque_id" required/>
                </p>

                <p>
                    <label for="couleur_id">Couleur</label> :
                    <input type="text" placeholder="Rouge" name="couleur" id="couleur_id" required/>
                </p>

                <p>
                    <label for="nbSieges_id">Nombre de sièges</label> :
                    <input type="number" placeholder="5" name="nbSieges" id="nbSieges_id" required/>
                </p>

                <p>
                    <input type="submit" value="Envoyer"/>
                </p>

            </fieldset>
        </form>
    </body>
</html>