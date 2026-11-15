<?php
namespace App\Covoiturage\Controller;
use App\Covoiturage\Model\Repository\UtilisateurRepository; // Indispensable pour que le contrôleur trouve la classe

class ControllerUtilisateur{
    public static function readAll() : void {
        $utilisateurs = (new UtilisateurRepository())->selectAll(); // Appel au modèle pour gerer la BDD
        ControllerUtilisateur::afficheVue('view.php', ['utilisateurs' => $utilisateurs, 'pagetitle' => 'Listes des utilisateurs', 'cheminVueBody' => "utilisateur/list.php" ]);
    }

    public static function read() : void {
        $login = $_GET['login'] ?? ""; // Récupère le login depuis l'URL, ou une chaîne vide si elle n'est pas définie
        $utilisateur = (new UtilisateurRepository())->select($login);
        if($utilisateur == null){
            ControllerUtilisateur::error("Aucun utilisateur trouvé avec le login : " . htmlspecialchars($login));
            return;
        }
        ControllerUtilisateur::afficheVue('view.php', ['utilisateur' => $utilisateur, 'pagetitle' => "Détail", 'cheminVueBody' => "utilisateur/detail.php"]);
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