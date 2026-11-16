<?php
    namespace App\Covoiturage\Model\DataObject;
    use App\Covoiturage\Model\Repository\DatabaseConnection; // (si Model.php est aussi dans le même namespace)

    class Trajet extends AbstractDataObject{

        private int $id;
        private string $villeDepart;
        private string $villeArrivee;
        private string $dateDepart;
        private int $nbPlaces;
        private float $prix;
        private string $conducteurLogin;

        public function __construct(int $id, string $villeDepart, string $villeArrivee, string $dateDepart, int $nbPlaces, float $prix, string $login) {
            $this->id = $id;
            $this->villeDepart = $villeDepart;
            $this->villeArrivee = $villeArrivee;
            $this->dateDepart = $dateDepart;
            $this->nbPlaces = $nbPlaces;
            $this->prix = $prix;
            $this->conducteurLogin = $login;
        }

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

        public function getNbPlaces(): int {
            return $this->nbPlaces;
        }

        public function getPrix(): float {
            return $this->prix;
        }

        public function getConducteurLogin(): string {
            return $this->conducteurLogin;
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

        public function setNbPlaces(int $nbPlaces): void {
            $this->nbPlaces = $nbPlaces;
        }

        public function setPrix(float $prix): void {
            $this->prix = $prix;
        }

        public function setConducteurLogin(string $conducteurLogin): void {
            $this->conducteurLogin = $conducteurLogin;
        }

        public function formatTableau(): array {
            return array(
                "idTag" => $this->getId(),
                "departTag" => $this->getVilleDepart(),
                "arriveeTag" => $this->getVilleArrivee(),
                "dateTag" => $this->getDateDepart(),
                "nbPlacesTag" => $this->getNbPlaces(),
                "prixTag" => $this->getPrix(),
                "conducteurLoginTag" => $this->getConducteurLogin(),
            );
        }

        /*public function __toString(): string {
            return "Trajet #{$this->id} : {$this->villeDepart} → {$this->villeArrivee}, le {$this->dateDepart}, " . "{$this->nbPlaces} places, {$this->prix}€, conducteur : {$this->conducteurLogin}";
        }*/
    }
?>