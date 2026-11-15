<!DOCTYPE html>
<html>

<title>Erreur</title>

<body>
    <h1>Erreur</h1>

    <p>
        <?php
            if($errorMessage != ''){
                $errorMessage = "Problème avec le trajet : " . htmlspecialchars($errorMessage);
            }else{
                $errorMessage = "Problème avec le trajet";
            }

            echo $errorMessage;
        ?>
    </p>

    <p>
        <a href="frontController.php?action=readAll&controller=trajet">
            Retour à la liste des trajets
        </a>
    </p>
</body>
</html>
