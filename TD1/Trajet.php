<?php
    class Trajet{
        private int $id;
        private string $villeDepart;
        private string $villeArrivee;
        private string $dateDepart;
        private string $dateArrivee;
        private int $nbPlaces;
        private float $prix;
        private Utilisateur $login;

        public function getId(): int {
            return $this->id;
        }   

        public function getVilleDepart(): string {
            return $this->villeDepart;
        }

        public function getVilleArrivee(): string {
            return $this->villeArrivee;
        }

        public function getDateDepart(): string {
            return $this->dateDepart;
        }

        public function getDateArrivee(): string {
            return $this->dateArrivee;
        }

        public function getNbPlaces(): int {
            return $this->nbPlaces;
        }

        public function getPrix(): float {
            return $this->prix;
        }

        public function getLogin(): Utilisateur {
            return $this->login;
        }

        public function setId(int $id): void {
            $this->id = $id;
        }

        public function setVilleDepart(string $villeDepart): void {
            $this->villeDepart = $villeDepart;
        }

        public function setVilleArrivee(string $villeArrivee): void {
            $this->villeArrivee = $villeArrivee;
        }

        public function setDateDepart(string $dateDepart): void {
            $this->dateDepart = $dateDepart;
        }

        public function setDateArrivee(string $dateArrivee): void {
            $this->dateArrivee = $dateArrivee;
        }

        public function setNbPlaces(int $nbPlaces): void {
            $this->nbPlaces = $nbPlaces;
        }

        public function setPrix(float $prix): void {
            $this->prix = $prix;
        }

        public function setLogin(Utilisateur $login): void {
            $this->login = $login;
        }

        public function __construct(int $id, string $villeDepart, string $villeArrivee, string $dateDepart, string $dateArrivee, int $nbPlaces, float $prix, Utilisateur $login) {
            $this->id = $id;
            $this->villeDepart = $villeDepart;
            $this->villeArrivee = $villeArrivee;
            $this->dateDepart = $dateDepart;
            $this->dateArrivee = $dateArrivee;
            $this->nbPlaces = $nbPlaces;
            $this->prix = $prix;
            $this->login = $login;
        }

        public function __toString(): string {
            return "Trajet : " . $this->id . ", Ville de départ : " . $this->villeDepart . ", Ville d'arrivée : " . $this->villeArrivee . ", Date de départ : " . $this->dateDepart . ", Date d'arrivée : " . $this->dateArrivee . ", Nombre de places : " . $this->nbPlaces . ", Prix : " . $this->prix . ", Login : " . $this->login;
        }

    }
?>