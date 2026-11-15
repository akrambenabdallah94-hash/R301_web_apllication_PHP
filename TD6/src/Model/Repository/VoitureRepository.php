<?php
    namespace App\Covoiturage\Model\Repository;
    use App\Covoiturage\Model\DataObject\Voiture;
    

    class VoitureRepository extends AbstractRepository {
       
        public static function sauvegarder(Voiture $voiture): bool{
            $model = new DatabaseConnection();
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
            $model = new DatabaseConnection();
            $sql = "DELETE FROM voiture WHERE immatriculation = :immatriculationTag";
            $pdoStatement = $model->getPdo()->prepare($sql);
            $pdoStatement->execute([
                "immatriculationTag" => $voiture->getImmatriculation(),
            ]); 
        }

        public static function mettreAJour(Voiture $voiture) : void {
            $model = new DatabaseConnection();
            $sql = "UPDATE voiture SET marque = :marqueTag, couleur = :couleurTag, nbSieges = :nbSiegesTag WHERE immatriculation = :immatriculationTag";
            $pdoStatement = $model->getPdo()->prepare($sql);
            $pdoStatement->execute([
                "immatriculationTag" => $voiture->getImmatriculation(),
                "marqueTag" => $voiture->getMarque(),
                "couleurTag" => $voiture->getCouleur(),
                "nbSiegesTag" => $voiture->getNbSieges()
            ]);
        }

        public function construire(array $voitureFormatTableau): Voiture{
            return new Voiture($voitureFormatTableau["immatriculation"], $voitureFormatTableau["marque"], $voitureFormatTableau["couleur"], $voitureFormatTableau["nbSieges"]);
        }

        public function getNomTable() : string {
            return "voiture";
        }

        public function getNomClePrimaire() : string {
            return "immatriculation";
        }
    }  
?>