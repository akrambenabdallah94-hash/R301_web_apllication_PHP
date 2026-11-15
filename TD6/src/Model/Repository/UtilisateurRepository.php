<?php
namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Model\DataObject\Utilisateur;

class UtilisateurRepository extends AbstractRepository {

    protected function construire(array $utilisateurFormatTableau): Utilisateur {
        return new Utilisateur(
            $utilisateurFormatTableau["login"],
            $utilisateurFormatTableau["nom"],
            $utilisateurFormatTableau["prenom"]
        );
    }

    protected function getNomTable(): string {
        return "utilisateur";
    }

    protected function getNomClePrimaire(): string {
        return "login";
    }

    protected function getNomsColonnes(): array {
        return ["login", "nom", "prenom"];
    }
}
