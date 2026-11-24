<?php
namespace App\Covoiturage\Controller;
use App\Covoiturage\Lib\PreferenceControleur;

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
        GenericController::afficheVue('view.php', ['pagetitle' => "Page d'erreur", 'cheminVueBody' => "error.php", 'errorMessage' => $errorMessage]);
    }

    public static function formulairePreference() : void {
        GenericController::afficheVue('view.php', ['pagetitle' => "Formulaire de préférence", 'cheminVueBody' => "formulairePreference.php"]);
    }

    public static function enregistrerPreference() : void {
        $controleur_default = $_GET['controleur_defaut'];
        PreferenceControleur::enregistrer($controleur_default);
        GenericController::afficheVue('view.php', ['pagetitle' => "Préférence enregistrée", 'cheminVueBody' => "enregistrerPreference.php"]);
    }
}
