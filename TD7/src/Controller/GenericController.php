<?php
namespace App\Covoiturage\Controller;

/**
 * Code commun à tous les contrôleurs.
 * Les méthodes protected ne sont pas visibles par get_class_methods() depuis le routeur :
 * elles ne peuvent donc pas être appelées depuis l'URL.
 */
abstract class GenericController {

    protected static function afficheVue(string $cheminVue, array $parametres = []): void {
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__ . '/../view/' . $cheminVue;
    }

    protected static function error(string $errorMessage="") : void {
        GenericController::afficheVue('view.php', ['pagetitle' => "Page d'erreur", 'cheminVueBody' => "trajet/error.php", 'errorMessage' => $errorMessage]);
    }
}
