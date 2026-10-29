<?php
    require_once __DIR__ . '/../../Lib/Psr4AutoloaderClass.php';
    // instantiate the loader 
    $loader = new App\Covoiturage\Lib\Psr4AutoloaderClass(); 
    // register the base directories for the namespace prefix 
    $loader->addNamespace('App\Covoiturage', __DIR__ . '/../../'); 
    // register the autoloader 
    $loader->register();
    
    // IMPORTANTE : On importe la classe avec son namespace complet 
    use App\Covoiturage\Controller\ControllerVoiture;
    
    //on récupère l'action passée dans l'URL
    $action = $_GET['action'] ?? 'readAll'; // Valeur par défaut si l'action n'est pas définie
    ControllerVoiture::$action(); // Appel de la méthode readAll() du contrôleur
?>