<?php
namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\DataObject\Trajet;
use App\Covoiturage\Model\Repository\TrajetRepository;
use PDOException;

class ControllerTrajet extends GenericController {

    public static function readAll(): void {
        $trajets = (new TrajetRepository())->selectAll();
        self::afficheVue('view.php', [
            'trajets' => $trajets,
            'pagetitle' => 'Liste des trajets',
            'cheminVueBody' => 'trajet/list.php'
        ]);
    }

    public static function read(): void {
        $id = self::param('id');
        $trajet = (new TrajetRepository())->select($id);
        if ($trajet === null) {
            self::error("Aucun trajet trouvé avec l'id : " . $id);
            return;
        }
        self::afficheVue('view.php', [
            'trajet' => $trajet,
            'pagetitle' => 'Détail du trajet',
            'cheminVueBody' => 'trajet/detail.php'
        ]);
    }

    public static function create(): void {
        self::afficheVue('view.php', [
            'pagetitle' => "Création d'un trajet",
            'cheminVueBody' => 'trajet/create.php'
        ]);
    }

    public static function created(): void {
        $trajet = self::trajetDepuisUrl(false);
        if ($trajet === null) {
            self::error("Les données du formulaire sont invalides.");
            return;
        }
        $repository = new TrajetRepository();
        if (!$repository->sauvegarder($trajet)) {
            self::error("Le trajet n'a pas pu être créé (le conducteur existe-t-il ?).");
            return;
        }
        self::afficheVue('view.php', [
            'trajets' => $repository->selectAll(),
            'pagetitle' => 'Trajet créé',
            'cheminVueBody' => 'trajet/created.php'
        ]);
    }

    public static function update(): void {
        $id = self::param('id');
        $trajet = (new TrajetRepository())->select($id);
        if ($trajet === null) {
            self::error("Aucun trajet trouvé avec l'id : " . $id);
            return;
        }
        self::afficheVue('view.php', [
            'trajet' => $trajet,
            'pagetitle' => "Mise à jour d'un trajet",
            'cheminVueBody' => 'trajet/update.php'
        ]);
    }

    public static function updated(): void {
        $trajet = self::trajetDepuisUrl(true);
        $repository = new TrajetRepository();
        if ($trajet === null) {
            self::error("Les données du formulaire sont invalides.");
            return;
        }
        if ($repository->select((string)$trajet->getId()) === null) {
            self::error("Aucun trajet trouvé avec l'id : " . $trajet->getId());
            return;
        }
        try {
            $repository->update($trajet);
        } catch (PDOException $e) {
            self::error("Le trajet n'a pas pu être mis à jour (le conducteur existe-t-il ?).");
            return;
        }
        self::afficheVue('view.php', [
            'id' => $trajet->getId(),
            'trajets' => $repository->selectAll(),
            'pagetitle' => 'Trajet mis à jour',
            'cheminVueBody' => 'trajet/updated.php'
        ]);
    }

    public static function delete(): void {
        $id = self::param('id');
        $repository = new TrajetRepository();
        if ($repository->select($id) === null) {
            self::error("Aucun trajet trouvé avec l'id : " . $id);
            return;
        }
        try {
            $repository->delete($id);
        } catch (PDOException $e) {
            self::error("Impossible de supprimer le trajet " . $id . " (il a peut-être des passagers).");
            return;
        }
        self::afficheVue('view.php', [
            'id' => $id,
            'trajets' => $repository->selectAll(),
            'pagetitle' => 'Trajet supprimé',
            'cheminVueBody' => 'trajet/deleted.php'
        ]);
    }

    public static function error(string $errorMessage = ""): void {
        self::afficheVue('view.php', [
            'errorMessage' => $errorMessage,
            'pagetitle' => "Page d'erreur",
            'cheminVueBody' => 'trajet/error.php'
        ]);
    }

    /** @param bool $avecId true pour une mise à jour (id obligatoire), false pour une création (id généré) */
    private static function trajetDepuisUrl(bool $avecId): ?Trajet {
        $id = self::param('id');
        $depart = self::param('depart');
        $arrivee = self::param('arrivee');
        $date = self::param('date');
        $nbPlaces = self::param('nbPlaces');
        $prix = self::param('prix');
        $conducteurLogin = self::param('conducteurLogin');
        if ($depart === '' || $arrivee === '' || $date === '' || $conducteurLogin === ''
            || !ctype_digit($nbPlaces) || !is_numeric($prix)) {
            return null;
        }
        if ($avecId && !ctype_digit($id)) {
            return null;
        }
        return new Trajet($avecId ? (int)$id : null, $depart, $arrivee, $date, (int)$nbPlaces, (float)$prix, $conducteurLogin);
    }
}
