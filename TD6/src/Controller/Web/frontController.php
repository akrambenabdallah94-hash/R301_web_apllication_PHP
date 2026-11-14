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
    $action = isset($_GET['action']) ? $_GET['action'] : 'readAll'; // Si aucune action n'est précisée, on prend l'action par défaut "readAll"
    $Allmethods = get_class_methods(ControllerVoiture::class);
    if(!in_array($action, $Allmethods)){
        ControllerVoiture::error("Action non reconnue : " . htmlspecialchars($action));
        return;
    }
    ControllerVoiture::$action();

    $Controller = isset($_GET['controller']) ? $_GET['controller'] : 'voiture';// Si aucun contrôleur n'est précisé, on prend le contrôleur par défaut "voiture"

    if($Controller == 'voiture'){
        $controllerClassName = ucfirst('App\Covoiturage\Controller\ControllerVoiture::class');
        class_exists($controllerClassName);
        }else{
            ControllerVoiture::error("Contrôleur non reconnu : " . htmlspecialchars($Controller));
            return;
        }


?>