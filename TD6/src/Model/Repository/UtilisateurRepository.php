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

        // Méthode utile pour récupérer un utilisateur unique (nécessaire pour associer un Trajet à son créateur)
        public static function getUtilisateurByLogin(string $login): ?Utilisateur {
            $model = new DatabaseConnection();
            $pdoStatement = $model->getPdo()->prepare('SELECT * FROM utilisateur WHERE login = :loginTag');
            $pdoStatement->execute(['loginTag' => $login]);
            $utilisateurFormatTableau = $pdoStatement->fetch();
            
            if ($utilisateurFormatTableau) {
                return self::construire($utilisateurFormatTableau);
            }
            return null;
        }
    }
?>