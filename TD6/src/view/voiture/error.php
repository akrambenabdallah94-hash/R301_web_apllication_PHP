<!DOCTYPE html>
<html>

<title>Erreur</title>

<body>
    <h1>Erreur</h1>

    <p>
        <?php
            if($errorMessage != ''){
                $errorMessage = "Problème avec la voiture : " . htmlspecialchars($errorMessage);
            }else{
                $errorMessage = "Problème avec la voiture : ou juste Problème avec la voiture si le message est vide.";
            }

            echo $errorMessage;
        ?>
    </p>

    <p>
        <a href="frontController.php?action=readAll">
            Retour à la liste des voitures
        </a><br><br>

        <a href="frontController.php?action=readAll&controller=utilisateur">
            Retour à la liste des utilisateurs
        </a>
    </p>
</body>
</html>