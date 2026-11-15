<?php
    namespace App\Covoiturage\Model\Repository;
    use App\Covoiturage\Model\DataObject\Utilisateur;

    class UtilisateurRepository extends AbstractRepository { 
         public static function construire(array $utilisateurFormatTableau): Utilisateur {
            return new Utilisateur(
                $utilisateurFormatTableau["login"], 
                $utilisateurFormatTableau["nom"], 
                $utilisateurFormatTableau["prenom"]
            );
        }

        public static function getUtilisateurs(): array {
            $model = new DatabaseConnection();
            $pdoStatement = $model->getPdo()->query('SELECT * FROM utilisateur');
            $utilisateurs = [];
            foreach($pdoStatement as $utilisateurFormatTableau) {
                $utilisateurs[] = self::construire($utilisateurFormatTableau);
            }
            return $utilisateurs;
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