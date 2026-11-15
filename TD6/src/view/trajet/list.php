<!DOCTYPE html>
<html>
    <body>
        <?php
            foreach($trajets as $trajet){
                $departHTML = $trajet->getDepart();
                $arriveeHTML = $trajet->getArrivee();
                echo '<p> Trajet de ' . htmlspecialchars($departHTML) . ' à ' . htmlspecialchars($arriveeHTML) . '</p>';
            }
        ?>
    </body>
</html>