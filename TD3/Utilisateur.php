<?php
    class Utilisateur {
        private string $login;
        private string $nom;
        private string $prenom;

        public function getLogin(): string {
            return $this->login;
        }

        public function getNom(): string {
            return $this->nom;
        }

        public function getPrenom(): string {
            return $this->prenom;
        }

        public function setLogin(string $login): void {
            $this->login = $login;
        }

        public function setNom(string $nom): void {
            $this->nom = $nom;
        }

        public function setPrenom(string $prenom): void {
            $this->prenom = $prenom;
        }

        public static function construire(array $utilisateurFormatTableau): Utilisateur {
            return new Utilisateur(
                $utilisateurFormatTableau["login"], 
                $utilisateurFormatTableau["nom"], 
                $utilisateurFormatTableau["prenom"]
            );
        }

        public static function getUtilisateurs(): array {
            $model = new Model();
            $pdoStatement = $model->getPdo()->query('SELECT * FROM utilisateur');
            $utilisateurs = [];
            foreach($pdoStatement as $utilisateurFormatTableau) {
                $utilisateurs[] = self::construire($utilisateurFormatTableau);
            }
            return $utilisateurs;
        }

        // Méthode utile pour récupérer un utilisateur unique (nécessaire pour associer un Trajet à son créateur)
        public static function getUtilisateurByLogin(string $login): ?Utilisateur {
            $model = new Model();
            $pdoStatement = $model->getPdo()->prepare('SELECT * FROM utilisateur WHERE login = :loginTag');
            $pdoStatement->execute(['loginTag' => $login]);
            $utilisateurFormatTableau = $pdoStatement->fetch();
            
            if ($utilisateurFormatTableau) {
                return self::construire($utilisateurFormatTableau);
            }
            return null;
        }

        public function __construct(string $login, string $nom, string $prenom) {
            $this->login = $login;
            $this->nom = $nom;
            $this->prenom = $prenom;
        }


        public function __toString(): string {
            return "Utilisateur : " . $this->login . ", Nom : " . $this->nom . ", Prénom : " . $this->prenom;
        }
    }
?>