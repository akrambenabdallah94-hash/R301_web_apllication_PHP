<!DOCTYPE html>
<html>

<title>Erreur</title>

<body>
    <h1>Erreur</h1>

    <p>
        <?php
            if($errorMessage != ''){
                $errorMessage = "Problème avec l'utilisateur : " . htmlspecialchars($errorMessage);
            }else{
                $errorMessage = "Problème avec l'utilisateur";
            }

            echo $errorMessage;
        ?>
    </p>

    <p>
        <a href="frontController.php?action=readAll&controller=utilisateur">
            Retour à la liste des utilisateurs
        </a>
    </p>
</body>
</html>
