<!DOCTYPE html>
<html>

    <title>Suppression d'un utilisateur par login</title>

    <body>
        <form method="get" action="/../TD6/src/controller/web/frontController.php">
            <fieldset>
                <legend>Mon formulaire supprimer un utilisateur :</legend>

                <!-- On précise le contrôleur cible -->
                <input type="hidden" name="controller" value="utilisateur"/>

                <!-- On ajoute l'action dans un champ caché -->
                <input type="hidden" name="action" value="deleted"/>
                
                <p>
                    <label for="login_id">login</label> :
                    <input type="text" placeholder="ak94u" name="login" id="login_id" required/>
                </p>
                
                <p>
                    <input type="submit" value="Envoyer"/>
                </p>

            </fieldset>
        </form>
    </body>
</html>