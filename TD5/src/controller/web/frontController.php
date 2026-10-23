<?php
    // instantiate the loader 
    $loader = new App\Covoiturage\Lib\Psr4AutoloaderClass(); 
    // register the base directories for the namespace prefix 
    $loader->addNamespace('App\Covoiturage', __DIR__ . '/../src'); 
    // register the autoloader 
    $loader->register();
    
    require_once __DIR__ . '/../ControllerVoiture.php';
    //on récupère l'action passée dans l'URL
    $action = $_GET['action'] ?? 'create'; // Valeur par défaut si l'action n'est pas définie
    ControllerVoiture::$action(); // Appel de la méthode readAll() du contrôleur
?>