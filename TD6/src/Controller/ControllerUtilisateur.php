<?php
namespace App\Covoiturage\Controller;
use App\Covoiturage\Model\Repository\UtilisateurRepository; // Indispensable pour que le contrôleur trouve la classe

class ControllerUtilisateur{
    public static function readAll() : void {
        $utilisateurs = UtilisateurRepository::getUtilisateurs(); // Appel au modèle pour gerer la BDD
        ControllerUtilisateur::afficheVue('view.php', ['utilisateurs' => $utilisateurs, 'pagetitle' => 'Listes des utilisateurs', 'cheminVueBody' => "utilisateur/list.php" ]);
    }

    public static function afficheVue(string $cheminVue, array $parametres=[]) : void{
        extract($parametres); // Crée des variables à partir du tableau $paramètres
        require __DIR__ . '/../view/'. $cheminVue; //Charge la vue spécifiée en paramètre
    }

    public static function error(string $errorMessage = "") : void {
        ControllerUtilisateur::afficheVue('view.php', ['pagetitle' => "Page d'erreur", 'cheminVueBody' => "utilisateur/error.php", 'errorMessage' => $errorMessage]);
    }
}

?>