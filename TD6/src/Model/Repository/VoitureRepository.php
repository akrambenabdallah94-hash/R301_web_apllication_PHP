<?php
namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Model\DataObject\Voiture;

class VoitureRepository extends AbstractRepository {

    protected function construire(array $voitureFormatTableau): Voiture {
        return new Voiture(
            $voitureFormatTableau["immatriculation"],
            $voitureFormatTableau["marque"],
            $voitureFormatTableau["couleur"],
            $voitureFormatTableau["nbSieges"]
        );
    }

    protected function getNomTable(): string {
        return "voiture";
    }

    protected function getNomClePrimaire(): string {
        return "immatriculation";
    }

    protected function getNomsColonnes(): array {
        return ["immatriculation", "marque", "couleur", "nbSieges"];
    }
}
