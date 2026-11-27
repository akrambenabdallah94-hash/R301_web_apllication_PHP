<?php
namespace App\Covoiturage\Controller;
use App\Covoiturage\Lib\MessageFlash;
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
        if (empty($_GET['login']) || empty($_GET['nom']) || empty($_GET['prenom'])) {
            MessageFlash::ajouter("danger", "Login, nom ou prénom manquant.");
            GenericController::redirectionVersURL("frontController.php?controller=utilisateur&action=create");
        }
        if ((new UtilisateurRepository())->select($_GET['login']) !== null) {
            MessageFlash::ajouter("warning", "Login existant.");
            GenericController::redirectionVersURL("frontController.php?controller=utilisateur&action=create");
        }
        $utilisateur = new Utilisateur($_GET['login'], $_GET['nom'], $_GET['prenom']);
        (new UtilisateurRepository())->sauvegarder($utilisateur);
        MessageFlash::ajouter("success", "L'utilisateur a bien été créé !");
        GenericController::redirectionVersURL("frontController.php?controller=utilisateur&action=readAll");
    }

    public static function delete() : void {
        $login = $_GET['login'];
        (new UtilisateurRepository())->delete($login);
        MessageFlash::ajouter("success", "L'utilisateur de login " . $login . " a bien été supprimé.");
        GenericController::redirectionVersURL("frontController.php?controller=utilisateur&action=readAll");
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
        MessageFlash::ajouter("success", "L'utilisateur de login " . $utilisateur->getLogin() . " a bien été mis à jour.");
        GenericController::redirectionVersURL("frontController.php?controller=utilisateur&action=readAll");
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

        
    // ---------- Actions TEMPORAIRES pour tester la classe Session (à supprimer après les tests) ----------
    public static function sessionEcrire() : void {
        $session = Session::getInstance();
        $session->enregistrer("texte", "Cathy Penneflamme");
        $session->enregistrer("nombre", 42);
        $session->enregistrer("tableau", ["rouge", "vert", "bleu"]);
        $session->enregistrer("objet", new Utilisateur("jdupont", "Dupont", "Jean"));
        GenericController::afficheVue('view.php', ['titre' => "Variables de session écrites", 'contenuSession' => print_r($_SESSION ?? [], true), 'pagetitle' => "Test session", 'cheminVueBody' => "utilisateur/testSession.php"]);
    }

    public static function sessionLire() : void {
        $session = Session::getInstance();
        $titre = "Lecture des variables de session";
        foreach (["texte", "nombre", "tableau", "objet"] as $cle) {
            $titre .= $session->contient($cle) ? " | $cle : oui" : " | $cle : NON";
        }
        GenericController::afficheVue('view.php', ['titre' => $titre, 'contenuSession' => print_r($_SESSION ?? [], true), 'pagetitle' => "Test session", 'cheminVueBody' => "utilisateur/testSession.php"]);
    }

    public static function sessionSupprimerVariable() : void {
        $session = Session::getInstance();
        $session->supprimer("tableau");
        GenericController::afficheVue('view.php', ['titre' => "Variable « tableau » supprimée", 'contenuSession' => print_r($_SESSION ?? [], true), 'pagetitle' => "Test session", 'cheminVueBody' => "utilisateur/testSession.php"]);
    }

    public static function sessionDetruire() : void {
        $session = Session::getInstance();
        $session->detruire();
        GenericController::afficheVue('view.php', ['titre' => "Session détruite", 'contenuSession' => print_r($_SESSION ?? [], true), 'pagetitle' => "Test session", 'cheminVueBody' => "utilisateur/testSession.php"]);
    }
    // ---------------------------------------------------------------------------------------------

    public static function supprimerCookie() : void {
        Cookie::supprimer('login');
        Cookie::supprimer('nom');
        Cookie::supprimer('prenom');
        GenericController::afficheVue('view.php', ['pagetitle' => "Suppression du cookie", 'cheminVueBody' => "utilisateur/supprimerCookie.php"]);
    }
}
?>
