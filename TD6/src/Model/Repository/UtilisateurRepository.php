<?php
    namespace App\Covoiturage\Model\Repository;
    use App\Covoiturage\Model\DataObject\Utilisateur;

    class UtilisateurRepository extends AbstractRepository { 
        
         public function construire(array $utilisateurFormatTableau): Utilisateur {
            return new Utilisateur(
                $utilisateurFormatTableau["login"], 
                $utilisateurFormatTableau["nom"], 
                $utilisateurFormatTableau["prenom"]
            );
        }

        public function getNomTable() : string {
            return "utilisateur";
        }

        public function getNomClePrimaire() : string {
            return "login";
        }
    }
?>