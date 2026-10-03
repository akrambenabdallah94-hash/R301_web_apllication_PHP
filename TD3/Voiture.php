<?php
        class Voiture {
            private string $immatriculation;
            private string $marque;
            private string $couleur;
            private int $nbSieges;

            //un getter
            public function getMarque(): string{
                return $this->marque;
            }

            public function setMarque(string $marque): void{
                $this->marque = $marque;
            }

            public function getImmatriculation(): string{
                return $this->immatriculation;
            }

            public function setImmatriculation(string $immatriculation): void{
                $this->immatriculation = substr($immatriculation, 0, 8); // On ne stock que les 8 premiers caractères de l'immatriculation
            }

            public function getCouleur(): string{
                return $this->couleur;
            }

            public function setCouleur(string $couleur): void{
                $this->couleur = $couleur;
            }

            public function getNbSieges(): int{
                return $this->nbSieges;
            }

            public function setNbSieges(int $nbSieges): void{
                $this->nbSieges = $nbSieges;
            }

            public static function construire(array $voitureFormatTableau): Voiture{
                return new Voiture($voitureFormatTableau["immatriculation"], $voitureFormatTableau["marque"], $voitureFormatTableau["couleur"], $voitureFormatTableau["nbSieges"]);
            }

            public static function getVoitures(): array{
                $model = new Model();
                $pdoStatement = $model->getPdo()->query('SELECT * FROM voiture');
                $voitures = [];
                foreach($pdoStatement as $voitureFormatTableau){
                    $voitures[] = self::construire($voitureFormatTableau);
                }
                return $voitures;
            }

            public static function getVoitureParImmat(string $immatriculation) : Voiture | null{ 
                $sql = "SELECT * FROM voiture WHERE immatriculation = :immatriculationTag";
                // Préparation de la requête
                $pdoStatement = Model::getPdo()->prepare($sql);

                $values = array(
                    "immatriculationTag" => $immatriculation,
                );

                $pdoStatement->execute($values);
                //On récupère les résultats comme précédemment
                //Note : fetch() renvoie false si pas de voiture correspondante

                $voiture = $pdoStatement->fetch();

                if($voiture == false){
                    echo "Aucune voiture trouvée avec l'immatriculation : {$immatriculation}: ";
                    return null;
                }

                return static::construire($voiture);
            }

            public function sauvegarder(): void{
                $model = new Model();
                $sql = "INSERT INTO voiture(immatriculation, marque, couleur, nbSieges) VALUES(:immatriculationTag, :marqueTag, :couleurTag, :nbSiegesTag)";
                $pdostatement = $model->getPdo()->prepare($sql);
                $pdostatement->execute([
                    "immatriculationTag" => $this->immatriculation,
                    "marqueTag" => $this->marque,
                    "couleurTag" => $this->couleur,
                    "nbSiegesTag" => $this->nbSieges
                ]);
            }
            
            public function __construct(string $immatriculation, string $marque, string $couleur, int $nbSieges){
                $this->immatriculation = substr($immatriculation,0, 8);
                $this->marque = $marque;
                $this->couleur = $couleur;
                $this->nbSieges = $nbSieges;
            }

            public function __toString(): string{
                return "Voiture {$this->immatriculation} de marque {$this->marque} (couleur {$this->couleur}, {$this->nbSieges} sièges)";
            }
        }   
?>