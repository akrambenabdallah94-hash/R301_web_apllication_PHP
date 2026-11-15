<!DOCTYPE html>
<html>
    <body>
        <?php
            foreach($trajets as $trajet){
                $departHTML = $trajet->getvilleDepart();
                $arriveeHTML = $trajet->getvilleArrivee();
                echo '<p> Trajet de ' . htmlspecialchars($departHTML) . ' à ' . htmlspecialchars($arriveeHTML) . '</p>';
            }
        ?>
    </body>
</html>