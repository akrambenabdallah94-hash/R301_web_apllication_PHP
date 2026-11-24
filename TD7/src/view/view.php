<!DOCTYPE html> 
<html> 
   <head> 
      <meta charset="UTF-8"> 
      <title><?php echo $pagetitle; ?></title>
      <link rel="stylesheet" href="/TD7/src/assets/css/style.css"> 
   </head> 
   <body> 
      <header> 
            <nav> 
                <ul>
                  <li><a href="frontController.php?action=formulairePreference"><img src="/TD7/src/assets/img/coeur.jpg" alt="Préférences"></a></li>
                  <li><a href="frontController.php?action=readAll&controller=voiture">Voitures</a></li>
                  <li><a href="frontController.php?action=readAll&controller=utilisateur">Utilisateurs</a></li>
                  <li><a href="frontController.php?action=readAll&controller=trajet">Trajets</a></li>
                </ul>
            </nav> 
      </header> 
      <main> 
            <?php 
            require __DIR__ . "/{$cheminVueBody}"; 
            ?> 
      </main> 
      <footer>
         <p>
            Site de Covoiturage 100% Made in France
         </p> 
      </footer> 
   </body> 
</html>