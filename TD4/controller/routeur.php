<?php
    require_once 'ControllerVoiture.php';
    //on récupère l'action passée dans l'URL
    $action = $_GET['action'] ?? 'readAll'; // Valeur par défaut si l'action n'est pas définie
    ControllerVoiture::$action(); // Appel de la méthode readAll() du contrôleur
?>