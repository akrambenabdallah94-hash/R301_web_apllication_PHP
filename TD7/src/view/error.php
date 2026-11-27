<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Erreur</title>
</head>
<body>
    <h1>Erreur</h1>

    <p>
        <?php
            if (isset($errorMessage) && $errorMessage !== '') {
                $errorMessage = "Problème : " . htmlspecialchars($errorMessage);
            } else {
                $errorMessage = "Une erreur est survenue";
            }

            echo $errorMessage;
        ?>
    </p>

    <p>
        <a href="frontController.php?action=readAll&controller=voiture">
            Retour à la liste des voitures
        </a><br><br>

        <a href="frontController.php?action=readAll&controller=utilisateur">
            Retour à la liste des utilisateurs
        </a>
    </p>
</body>
</html>