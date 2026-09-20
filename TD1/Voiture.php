<?php
    class Voiture {
        private $immatriculation;
        private $marque;
        private $couleur;
        private $nbSieges;

        //un getter
        public function getMarque(){
            return $this->marque;
        }

        public function setMarque($marque){
            $this->marque = $marque;
        }

        public function getImmatriculation(){
            return $this->immatriculation;
        }

        public function setImmatriculation($immatriculation){
            $this->immatriculation = substr($immatriculation, 0, 8); // On ne stock que les 8 premiers caractères de l'immatriculation
        }

        public function getCouleur(){
            return $this->couleur;
        }

        public function setCouleur($couleur){
            $this->couleur = $couleur;
        }

        public function getNbSieges(){
            return $this->nbSieges;
        }

        public function setNbSieges($nbSieges){
            $this->nbSieges = $nbSieges;
        }


        public function __construct($immatriculation, $marque, $couleur, $nbSieges){
            $this->immatriculation = substr($immatriculation,0, 8);
            $this->marque = $marque;
            $this->couleur = $couleur;
            $this->nbSieges = $nbSieges;
        }

        public function __toString(){
            return "Voiture {$this->immatriculation} de marque {$this->marque} (couleur {$this->couleur}, {$this->nbSieges} sièges)";
        }
    }   
?>