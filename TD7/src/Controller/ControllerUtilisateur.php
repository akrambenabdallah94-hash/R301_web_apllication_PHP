<?php
namespace App\Covoiturage\Controller;
use App\Covoiturage\Model\DataObject\Utilisateur;
use App\Covoiturage\Model\Repository\UtilisateurRepository; // Indispensable pour que le contrôleur trouve la classe
use App\Covoiturage\Model\HTTP\Cookie;
use App\Covoiturage\Model\HTTP\Session;

class ControllerUtilisateur extends GenericController {
    public static function readAll() : void {
        $utilisateurs = (new UtilisateurRepository())->selectAll(); // Appel au modèle pour gerer la BDD
        GenericController::afficheVue('view.php', ['utilisateurs' => $utilisateurs, 'pagetitle' => 'Listes des utilisateurs', 'cheminVueBody' => "utilisateur/list.php" ]);
    }

    public static function read() : void {
        $login = $_GET['login'];
        $utilisateur = (new UtilisateurRepository())->select($login);
        if($utilisateur == null){
            GenericController::error("Aucun utilisateur trouvé avec le login : " . $login);
            return;
        }
        GenericController::afficheVue('view.php', ['utilisateur' => $utilisateur, 'pagetitle' => "Détail", 'cheminVueBody' => "utilisateur/detail.php"]);
    }


    public static function create() : void {
        GenericController::afficheVue('view.php', ['pagetitle' => "Création d'un utilisateur", 'cheminVueBody' => "utilisateur/create.php"]);
    }

    public static function created() : void {
        $utilisateur = new Utilisateur($_GET['login'], $_GET['nom'], $_GET['prenom']);
        (new UtilisateurRepository())->sauvegarder($utilisateur);
        $utilisateurs = (new UtilisateurRepository())->selectAll();
        GenericController::afficheVue('view.php', ['utilisateurs' => $utilisateurs, 'pagetitle' => "Utilisateur créé", 'cheminVueBody' => "utilisateur/created.php"]);
    }

    public static function delete() : void {
        $login = $_GET['login'];
        (new UtilisateurRepository())->delete($login);
        $utilisateurs = (new UtilisateurRepository())->selectAll();
        GenericController::afficheVue('view.php', ['login' => $login, 'utilisateurs' => $utilisateurs, 'pagetitle' => 'Utilisateur supprimé', 'cheminVueBody' => 'utilisateur/deleted.php']);
    }

    public static function update() : void {
        $login = $_GET['login'];
        $utilisateur = (new UtilisateurRepository())->select($login);
        if($utilisateur == null){
            GenericController::error("Aucun utilisateur trouvé avec le login : " . $login);
            return;
        }
        GenericController::afficheVue('view.php', ['utilisateur' => $utilisateur, 'pagetitle' => "Mise à jour", 'cheminVueBody' => "utilisateur/update.php"]);
    }

    public static function updated() : void {
        $utilisateur = new Utilisateur($_GET['login'], $_GET['nom'], $_GET['prenom']);
        (new UtilisateurRepository())->update($utilisateur);
        $utilisateurs = (new UtilisateurRepository())->selectAll();
        GenericController::afficheVue('view.php', ['login' => $utilisateur->getLogin(), 'utilisateurs' => $utilisateurs, 'pagetitle' => "Mise à jour réussie", 'cheminVueBody' => "utilisateur/updated.php"]);
    }

    /*public static function deposerCookie() : void { 
        $login = $_GET['login'];
        $utilisateur = (new UtilisateurRepository())->select($login);
        if($utilisateur == null){
            GenericController::error("Aucun utilisateur trouvé avec le login : " . $login);
            return;
        }
        Cookie::enregistrer('login', $utilisateur->getLogin(), time() + 3600); // Cookie valable 1 heure
        Cookie::enregistrer('nom', $utilisateur->getNom(), time() + 3600);
        Cookie::enregistrer('prenom', $utilisateur->getPrenom(), time() + 3600);
        GenericController::afficheVue('view.php', ['utilisateur' => $utilisateur, 'pagetitle' => "Cookie déposé", 'cheminVueBody' => "utilisateur/deposerCookie.php"]);
    }

    public static function lireCookie() : void {
        if(Cookie::contient('login') && Cookie::contient('nom') && Cookie::contient('prenom')) {
            $login = Cookie::lire('login');
            $nom = Cookie::lire('nom');
            $prenom = Cookie::lire('prenom');
            GenericController::afficheVue('view.php', ['login' => $login, 'nom' => $nom, 'prenom' => $prenom, 'pagetitle' => "Lecture du cookie", 'cheminVueBody' => "utilisateur/lireCookie.php"]);
        } else {
            GenericController::error("Aucun cookie trouvé.");
        }
    }*/

    public static function session(){
        $login = $_GET['login'];
        $session = Session::getInstance();
        $session->enregistrer("Utilisateur", $login);
        GenericController::afficheVue('view.php', [ 'login' => $login, 'pagetitle' => "Succès Session created !!!", 'cheminVueBody' => "utilisateur/Session_created.php" ]);
    }

        
    public static function supprimerCookie() : void {
        Cookie::supprimer('login');
        Cookie::supprimer('nom');
        Cookie::supprimer('prenom');
        GenericController::afficheVue('view.php', ['pagetitle' => "Suppression du cookie", 'cheminVueBody' => "utilisateur/supprimerCookie.php"]);
    }
}
?>
