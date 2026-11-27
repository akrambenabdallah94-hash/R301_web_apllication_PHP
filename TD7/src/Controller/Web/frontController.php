<?php
    require_once __DIR__ . '/../../Lib/Psr4AutoloaderClass.php';
    // instantiate the loader 
    $loader = new App\Covoiturage\Lib\Psr4AutoloaderClass(); 
    // register the base directories for the namespace prefix 
    $loader->addNamespace('App\Covoiturage', __DIR__ . '/../../'); 
    // register the autoloader 
    $loader->register();
    
    // 1. Contrôleur demandé dans l'URL
    // 2. Sinon préférence enregistrée dans le cookie 'controleur_defaut'
    // 3. Sinon 'voiture' par défaut
    if (!empty($_GET['controller'])) {
    $controller = $_GET['controller'];
    } elseif (App\Covoiturage\Lib\PreferenceControleur::existe()) {
        $controller = App\Covoiturage\Lib\PreferenceControleur::lire();
    } else {
        $controller = 'voiture';
    }
    // On récupère l'action depuis l'URL (par défaut 'readAll')
    $action = isset($_GET['action']) ? $_GET['action'] : 'readAll';

    // Construction dynamique du nom de la classe du contrôleur (ex: App\Covoiturage\Controller\ControllerVoiture)
    $controllerClassName = 'App\Covoiturage\Controller\Controller' . ucfirst($controller);

    // 1. On vérifie si la classe du contrôleur existe
    if (!class_exists($controllerClassName)) {
        // Si le contrôleur n'existe pas, on affiche une erreur via le contrôleur par défaut
        App\Covoiturage\Controller\GenericController::error("Contrôleur non reconnu : " . htmlspecialchars($controller));
        return;
    }

    // 2. On vérifie si la méthode (l'action) existe dans ce contrôleur
    $allMethods = get_class_methods($controllerClassName);
    if (!in_array($action, $allMethods)) {
        return;
    }

    // 3. On appelle dynamiquement la méthode du contrôleur
    $controllerClassName::$action();
?>