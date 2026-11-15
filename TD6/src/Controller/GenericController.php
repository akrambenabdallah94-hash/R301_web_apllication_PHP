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

    /** Lit un paramètre de l'URL (chaîne vide s'il est absent ou invalide). */
    protected static function param(string $nom): string {
        $valeur = $_GET[$nom] ?? '';
        return is_string($valeur) ? trim($valeur) : '';
    }
}
