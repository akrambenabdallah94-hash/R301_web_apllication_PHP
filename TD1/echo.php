<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> Insérer le titrer ici </title>
    </head>
    <body>
        <?php
            $voiture = array(
                'marque' => 'BMW',
                'couleur' => 'noir',
                'immatriculation' => 'BW-318-AB',
                'nbSieges' => 5
            );

            echo "<p> Voiture {$voiture['immatriculation']} de marque {$voiture['marque']} (couleur {$voiture['couleur']}, {$voiture['nbSieges']} sièges) </p>";
        ?>
    </body>
</html>



