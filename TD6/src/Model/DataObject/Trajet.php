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

        /*public function __toString(): string {
            return "Trajet #{$this->id} : {$this->villeDepart} → {$this->villeArrivee}, le {$this->dateDepart}, " . "{$this->nbPlaces} places, {$this->prix}€, conducteur : {$this->conducteurLogin}";
        }*/
    }
?>