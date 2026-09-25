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