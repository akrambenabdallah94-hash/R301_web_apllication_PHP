<?php
namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\DataObject\Utilisateur;
use App\Covoiturage\Model\Repository\UtilisateurRepository;
use PDOException;

class ControllerUtilisateur extends GenericController {

    public static function readAll(): void {
        $utilisateurs = (new UtilisateurRepository())->selectAll();
        self::afficheVue('view.php', [
            'utilisateurs' => $utilisateurs,
            'pagetitle' => 'Liste des utilisateurs',
            'cheminVueBody' => 'utilisateur/list.php'
        ]);
    }

    public static function read(): void {
        $login = self::param('login');
        $utilisateur = (new UtilisateurRepository())->select($login);
        if ($utilisateur === null) {
            self::error("Aucun utilisateur trouvé avec le login : " . $login);
            return;
        }
        self::afficheVue('view.php', [
            'utilisateur' => $utilisateur,
            'pagetitle' => "Détail de l'utilisateur",
            'cheminVueBody' => 'utilisateur/detail.php'
        ]);
    }

    public static function create(): void {
        self::afficheVue('view.php', [
            'pagetitle' => "Création d'un utilisateur",
            'cheminVueBody' => 'utilisateur/create.php'
        ]);
    }

    public static function created(): void {
        $utilisateur = self::utilisateurDepuisUrl();
        if ($utilisateur === null) {
            self::error("Les données du formulaire sont invalides.");
            return;
        }
        $repository = new UtilisateurRepository();
        if (!$repository->sauvegarder($utilisateur)) {
            self::error("L'utilisateur n'a pas pu être créé (login déjà utilisé ?).");
            return;
        }
        self::afficheVue('view.php', [
            'login' => $utilisateur->getLogin(),
            'utilisateurs' => $repository->selectAll(),
            'pagetitle' => 'Utilisateur créé',
            'cheminVueBody' => 'utilisateur/created.php'
        ]);
    }

    public static function update(): void {
        $login = self::param('login');
        $utilisateur = (new UtilisateurRepository())->select($login);
        if ($utilisateur === null) {
            self::error("Aucun utilisateur trouvé avec le login : " . $login);
            return;
        }
        self::afficheVue('view.php', [
            'utilisateur' => $utilisateur,
            'pagetitle' => "Mise à jour d'un utilisateur",
            'cheminVueBody' => 'utilisateur/update.php'
        ]);
    }

    public static function updated(): void {
        $utilisateur = self::utilisateurDepuisUrl();
        $repository = new UtilisateurRepository();
        if ($utilisateur === null) {
            self::error("Les données du formulaire sont invalides.");
            return;
        }
        if ($repository->select($utilisateur->getLogin()) === null) {
            self::error("Aucun utilisateur trouvé avec le login : " . $utilisateur->getLogin());
            return;
        }
        $repository->update($utilisateur);
        self::afficheVue('view.php', [
            'login' => $utilisateur->getLogin(),
            'utilisateurs' => $repository->selectAll(),
            'pagetitle' => 'Utilisateur mis à jour',
            'cheminVueBody' => 'utilisateur/updated.php'
        ]);
    }

    public static function delete(): void {
        $login = self::param('login');
        $repository = new UtilisateurRepository();
        if ($repository->select($login) === null) {
            self::error("Aucun utilisateur trouvé avec le login : " . $login);
            return;
        }
        try {
            $repository->delete($login);
        } catch (PDOException $e) {
            // Ex : l'utilisateur est encore conducteur ou passager d'un trajet (clé étrangère)
            self::error("Impossible de supprimer l'utilisateur " . $login . " (il est peut-être lié à un trajet).");
            return;
        }
        self::afficheVue('view.php', [
            'login' => $login,
            'utilisateurs' => $repository->selectAll(),
            'pagetitle' => 'Utilisateur supprimé',
            'cheminVueBody' => 'utilisateur/deleted.php'
        ]);
    }

    public static function error(string $errorMessage = ""): void {
        self::afficheVue('view.php', [
            'errorMessage' => $errorMessage,
            'pagetitle' => "Page d'erreur",
            'cheminVueBody' => 'utilisateur/error.php'
        ]);
    }

    private static function utilisateurDepuisUrl(): ?Utilisateur {
        $login = self::param('login');
        $nom = self::param('nom');
        $prenom = self::param('prenom');
        if ($login === '' || $nom === '' || $prenom === '') {
            return null;
        }
        return new Utilisateur($login, $nom, $prenom);
    }
}
