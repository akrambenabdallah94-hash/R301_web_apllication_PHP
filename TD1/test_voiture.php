<DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> Insérer le titrer ici </title>
    </head>
    <body>
        <?php
            require_once "C:\wamp64\www\R301_web\TD1\Voiture.php";

            $BMW = new Voiture('AB-123-CD', 'BMW', 'noir', 5);
            $Renault = new Voiture('EF-458-GH', 'Ranault', 'blanc', 5);

            echo $BMW;
            echo "<br>$Renault</br>";

        ?>
    </body> 
</html>