<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> Insérer le titrer ici </title>
    </head>
    <body>
        <?php
            $BMW = array(
                'immatriculation' => 'AB-123-CD',
                'marque' => 'BMW',
                'couleur' => 'noir',
                'nbSieges' => 5
            );

            $Renault = array(
                'immatriculation' => 'EF-456-GH',
                'marque' => 'Renault',
                'couleur' => 'blanc',
                'nbSieges' => 4
            );

            $voiture = array(
            );

            var_dump($voiture);

            if(empty($voiture)){
                echo "Le tableau est vide";
            } else {
                echo "Le tableau n'est pas vide";
            }

            echo "<ul>
                <li>Voiture 1 : {$voiture['1']['immatriculation']} de marque {$voiture['1']['marque']} (couleur {$voiture['1']['couleur']}, {$voiture['1']['nbSieges']} sièges) </li>
                <li>Voiture 2 : {$voiture['2']['immatriculation']} de marque {$voiture['2']['marque']} (couleur {$voiture['2']['couleur']}, {$voiture['2']['nbSieges']} sièges) </li>
                </ul>";
        ?>
    </body> 
</html>



