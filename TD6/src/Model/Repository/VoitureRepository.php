<?php
    namespace App\Covoiturage\Model\Repository;
    

    class VoitureRepository{
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
                return null;
            }

            return static::construire($voiture);
        }

        public static function sauvegarder(Voiture $voiture): bool{
            $model = new Model();
            $sql = "INSERT INTO voiture(immatriculation, marque, couleur, nbSieges) VALUES(:immatriculationTag, :marqueTag, :couleurTag, :nbSiegesTag)";
            $pdostatement = $model->getPdo()->prepare($sql);
            $pdostatement->execute([
                "immatriculationTag" => $voiture->getImmatriculation(),
                "marqueTag" => $voiture->getMarque(),
                "couleurTag" => $voiture->getCouleur(),
                "nbSiegesTag" => $voiture->getNbSieges()
            ]);
            return true;
        }



        public static function supprimer(Voiture $voiture) : void {
            $model = new Model();
            $sql = "DELETE FROM voiture WHERE immatriculation = :immatriculationTag";
            $pdoStatement = $model->getPdo()->prepare($sql);
            $pdoStatement->execute([
                "immatriculationTag" => $voiture->getImmatriculation(),
            ]); 
        }

        public static function construire(array $voitureFormatTableau): Voiture{
            return new Voiture($voitureFormatTableau["immatriculation"], $voitureFormatTableau["marque"], $voitureFormatTableau["couleur"], $voitureFormatTableau["nbSieges"]);
        }
    }  
?>