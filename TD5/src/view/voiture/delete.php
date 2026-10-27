<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Suppression d'une voiture par l'immatriculation</title>
    </head>
    <body>
        <form method="get" action="/../TD5/src/controller/web/frontController.php">
            <fieldset>
                <legend>Mon formulaire supprimer une voiture :</legend>

                <!-- On ajoute l'action dans un champ caché -->
                <input type="hidden" name="action" value="deleted"/>
                
                <p>
                    <label for="immat_id">Immatriculation</label> :
                    <input type="text" placeholder="256AB34" name="immatriculation" id="immat_id" required/>
                </p>
                
                <p>
                    <input type="submit" value="Envoyer"/>
                </p>

            </fieldset>
        </form>
    </body>
</html>