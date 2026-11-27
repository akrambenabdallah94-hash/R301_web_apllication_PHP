<?php
namespace App\Covoiturage\Controller;
use App\Covoiturage\Lib\MessageFlash;
use App\Covoiturage\Lib\PreferenceControleur;

/**
 * Code commun à tous les contrôleurs.
 * Les méthodes protected ne sont pas visibles par get_class_methods() depuis le routeur :
 * elles ne peuvent donc pas être appelées depuis l'URL.
 */
abstract class GenericController {

    protected static function afficheVue(string $cheminVue, array $parametres = []): void {
        $parametres["messagesFlash"] = MessageFlash::lireTousMessages(); // Les messages flash sont lus (donc détruits) à l'affichage
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__ . '/../view/' . $cheminVue;
    }

    // Redirection HTTP : le navigateur reçoit l'en-tête Location et refait une requête vers $url
    protected static function redirectionVersURL(string $url) : void {
        header("Location: $url");
        exit(); // Le script n'a plus rien à faire après la redirection
    }

    // public pour que le contrôleur frontal puisse l'appeler en cas de contrôleur inconnu
    public static function error(string $errorMessage="") : void {
        GenericController::afficheVue('view.php', ['pagetitle' => "Page d'erreur", 'cheminVueBody' => "error.php", 'errorMessage' => $errorMessage]);
    }

    public static function formulairePreference() : void {
        $preferenceActuelle = PreferenceControleur::existe() ? PreferenceControleur::lire() : 'voiture';
        GenericController::afficheVue('view.php', ['pagetitle' => "Formulaire de préférence", 'preferenceActuelle' => $preferenceActuelle, 'cheminVueBody' => "formulairePreference.php"]);
    }

    public static function enregistrerPreference() : void {
        $controleur_default = $_GET['controleur_defaut'];
        PreferenceControleur::enregistrer($controleur_default);
        MessageFlash::ajouter("success", "La préférence de contrôleur est enregistrée !");
        // Redirection vers l'action par défaut du contrôleur par défaut (ni action ni contrôleur dans l'URL)
        GenericController::redirectionVersURL("frontController.php");
    }
}
