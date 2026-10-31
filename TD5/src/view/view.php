<!DOCTYPE html> 
<html> 
   <head> 
      <meta charset="UTF-8"> 
      <title><?php echo $pagetitle; ?></title>
      <link rel="stylesheet" href="/TD5/src/assets/css/style.css"> 
   </head> 
   <body> 
      <header> 
            <nav> 
                <ul>
                  <li><a href="frontController.php?action=create">crée</a></li>
                  <li><a href="frontController.php?action=readAll">liste</a></li>
                  <li><a href="frontController.php?action=readAll&controller=utilisateur">accueil</a></li>
                  <li><a href="frontController.php?action=readAll&controller=trajet">accueil trajets</a></li>
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