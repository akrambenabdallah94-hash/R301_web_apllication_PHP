<?php
    class Trajet{
        private int $id;
        private string $villeDepart;
        private string $villeArrivee;
        private string $dateDepart;
        private int $nbPlaces;
        private float $prix;
        private string $conducteurLogin;

        public static function construire(array $trajetFormatTableau): Trajet {
            // Remarque : Si le tableau vient de la BDD, le champ 'login' ou 'utilisateur_login' 
            // devra être converti en objet Utilisateur si nécessaire (via Utilisateur::getUtilisateurByLogin par exemple).
            // Ici, on suppose que l'on récupère l'objet ou qu'on le charge.
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

        public static function getTrajets(): array {
            $model = new Model();
            $pdoStatement = $model->getPdo()->query('SELECT * FROM trajet');
            $trajets = [];
            foreach($pdoStatement as $trajetFormatTableau) {
                $trajets[] = self::construire($trajetFormatTableau);
            }
            return $trajets;
        }

        public function __construct(int $id, string $villeDepart, string $villeArrivee, string $dateDepart, int $nbPlaces, float $prix, string $login) {
            $this->id = $id;
            $this->villeDepart = $villeDepart;
            $this->villeArrivee = $villeArrivee;
            $this->dateDepart = $dateDepart;
            $this->nbPlaces = $nbPlaces;
            $this->prix = $prix;
            $this->conducteurLogin = $login;
        }

        public function __toString(): string {
            return "Trajet #{$this->id} : {$this->villeDepart} → {$this->villeArrivee}, le {$this->dateDepart}, " . "{$this->nbPlaces} places, {$this->prix}€, conducteur : {$this->conducteurLogin}";
        }
    }
?>