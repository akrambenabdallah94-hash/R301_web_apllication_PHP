<?php
namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\DataObject\Voiture;
use App\Covoiturage\Model\Repository\VoitureRepository;
use PDOException;

class ControllerVoiture extends GenericController {

    public static function readAll(): void {
        $voitures = (new VoitureRepository())->selectAll();
        self::afficheVue('view.php', [
            'voitures' => $voitures,
            'pagetitle' => 'Liste des voitures',
            'cheminVueBody' => 'voiture/list.php'
        ]);
    }

    public static function read(): void {
        $immatriculation = self::param('immatriculation');
        $voiture = (new VoitureRepository())->select($immatriculation);
        if ($voiture === null) {
            self::error("Aucune voiture trouvée avec l'immatriculation : " . $immatriculation);
            return;
        }
        self::afficheVue('view.php', [
            'voiture' => $voiture,
            'pagetitle' => 'Détail de la voiture',
            'cheminVueBody' => 'voiture/detail.php'
        ]);
    }

    public static function create(): void {
        self::afficheVue('view.php', [
            'pagetitle' => 'Création d\'une voiture',
            'cheminVueBody' => 'voiture/create.php'
        ]);
    }

    public static function created(): void {
        $voiture = self::voitureDepuisUrl();
        if ($voiture === null) {
            self::error("Les données du formulaire sont invalides.");
            return;
        }
        $repository = new VoitureRepository();
        if (!$repository->sauvegarder($voiture)) {
            self::error("La voiture n'a pas pu être créée (immatriculation déjà utilisée ?).");
            return;
        }
        self::afficheVue('view.php', [
            'immatriculation' => $voiture->getImmatriculation(),
            'voitures' => $repository->selectAll(),
            'pagetitle' => 'Voiture créée',
            'cheminVueBody' => 'voiture/created.php'
        ]);
    }

    public static function update(): void {
        $immatriculation = self::param('immatriculation');
        $voiture = (new VoitureRepository())->select($immatriculation);
        if ($voiture === null) {
            self::error("Aucune voiture trouvée avec l'immatriculation : " . $immatriculation);
            return;
        }
        self::afficheVue('view.php', [
            'voiture' => $voiture,
            'pagetitle' => 'Mise à jour d\'une voiture',
            'cheminVueBody' => 'voiture/update.php'
        ]);
    }

    public static function updated(): void {
        $voiture = self::voitureDepuisUrl();
        $repository = new VoitureRepository();
        if ($voiture === null) {
            self::error("Les données du formulaire sont invalides.");
            return;
        }
        if ($repository->select($voiture->getImmatriculation()) === null) {
            self::error("Aucune voiture trouvée avec l'immatriculation : " . $voiture->getImmatriculation());
            return;
        }
        $repository->update($voiture);
        self::afficheVue('view.php', [
            'immatriculation' => $voiture->getImmatriculation(),
            'voitures' => $repository->selectAll(),
            'pagetitle' => 'Voiture mise à jour',
            'cheminVueBody' => 'voiture/updated.php'
        ]);
    }

    public static function delete(): void {
        $immatriculation = self::param('immatriculation');
        $repository = new VoitureRepository();
        if ($repository->select($immatriculation) === null) {
            self::error("Aucune voiture trouvée avec l'immatriculation : " . $immatriculation);
            return;
        }
        try {
            $repository->delete($immatriculation);
        } catch (PDOException $e) {
            self::error("Impossible de supprimer la voiture " . $immatriculation . ".");
            return;
        }
        self::afficheVue('view.php', [
            'immatriculation' => $immatriculation,
            'voitures' => $repository->selectAll(),
            'pagetitle' => 'Voiture supprimée',
            'cheminVueBody' => 'voiture/deleted.php'
        ]);
    }

    public static function error(string $errorMessage = ""): void {
        self::afficheVue('view.php', [
            'errorMessage' => $errorMessage,
            'pagetitle' => "Page d'erreur",
            'cheminVueBody' => 'voiture/error.php'
        ]);
    }

    /** Construit une Voiture à partir de l'URL, ou renvoie null si les données sont invalides. */
    private static function voitureDepuisUrl(): ?Voiture {
        $immatriculation = self::param('immatriculation');
        $marque = self::param('marque');
        $couleur = self::param('couleur');
        $nbSieges = self::param('nbSieges');
        if ($immatriculation === '' || $marque === '' || $couleur === '' || !ctype_digit($nbSieges)) {
            return null;
        }
        return new Voiture($immatriculation, $marque, $couleur, (int)$nbSieges);
    }
}
