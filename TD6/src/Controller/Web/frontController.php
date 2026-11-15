<?php
require_once __DIR__ . '/../../Lib/Psr4AutoloaderClass.php';

$loader = new App\Covoiturage\Lib\Psr4AutoloaderClass();
$loader->addNamespace('App\Covoiturage', __DIR__ . '/../../');
$loader->register();

use App\Covoiturage\Controller\ControllerVoiture;

// Contrôleur (par défaut : voiture) et action (par défaut : readAll)
$controller = (isset($_GET['controller']) && is_string($_GET['controller'])) ? $_GET['controller'] : 'voiture';
$action = (isset($_GET['action']) && is_string($_GET['action'])) ? $_GET['action'] : 'readAll';

// Ex : "voiture" => "App\Covoiturage\Controller\ControllerVoiture"
$controllerClassName = 'App\Covoiturage\Controller\Controller' . ucfirst($controller);

// 1. Le contrôleur existe-t-il ? (on n'accepte que des lettres pour éviter les noms de classe farfelus)
if (!preg_match('/^[A-Za-z]+$/', $controller) || !class_exists($controllerClassName)) {
    ControllerVoiture::error("Contrôleur non reconnu : " . $controller);
    return;
}

// 2. L'action est-elle une méthode publique de ce contrôleur ?
if (!in_array($action, get_class_methods($controllerClassName), true)) {
    $controllerClassName::error("Action non reconnue : " . $action);
    return;
}

// 3. On appelle l'action
$controllerClassName::$action();
