<?php
namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Model\DataObject\Trajet;

class TrajetRepository extends AbstractRepository {

    protected function construire(array $trajetFormatTableau): Trajet {
        return new Trajet(
            $trajetFormatTableau["id"],
            $trajetFormatTableau["depart"],
            $trajetFormatTableau["arrivee"],
            $trajetFormatTableau["date"],
            $trajetFormatTableau["nbPlaces"],
            $trajetFormatTableau["prix"],
            $trajetFormatTableau["conducteurLogin"]
        );
    }

    protected function getNomTable(): string {
        return "trajet";
    }

    protected function getNomClePrimaire(): string {
        return "id";
    }

    protected function getNomsColonnes(): array {
        return ["id", "depart", "arrivee", "date", "nbPlaces", "prix", "conducteurLogin"];
    }
}
