<?php
    namespace App\Covoiturage\Model\Repository;
    use App\Covoiturage\Model\DataObject\AbstractDataObject; // (si Model.php est aussi dans le même namespace)

    abstract class AbstractRepository {
        // Abstract methods for database operations

        public function select(string $valeurClePrimaire) : ?AbstractDataObject {
            $model = new DatabaseConnection();
            $sql = "SELECT * FROM " . $this->getNomTable() . " WHERE " . $this->getNomClePrimaire() . " = :valeurClePrimaireTag";
            $pdoStatement = $model->getPdo()->prepare($sql);
            $pdoStatement->execute([
                "valeurClePrimaireTag" => $valeurClePrimaire,
            ]);
            $objetFormatTableau = $pdoStatement->fetch();
            if($objetFormatTableau == false){
                return null;
            }
            return $this->construire($objetFormatTableau);
        } 
        
        public abstract function getNomClePrimaire() : string;

        public abstract function getNomTable() : string;

        protected abstract function construire(array $objetFormatTableau) : AbstractDataObject;

        public function selectAll(): array{
            $model = new DatabaseConnection();
            $pdoStatement = $model->getPdo()->query('SELECT * FROM ' . $this->getNomTable());
            $objets = [];
            foreach($pdoStatement as $objetFormatTableau){
                $objets[] = $this->construire($objetFormatTableau);
            }
            return $objets;
        }

        public function delete(string $valeurClePrimaire): void{
            $nomTable = $this->getNomTable();
            $nomClePrimaire = $this->getNomClePrimaire();

            $sql = "DELETE FROM $nomTable WHERE $nomClePrimaire = :clePrimaireTag";
            $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
            
            $pdoStatement->execute([
                "clePrimaireTag" => $valeurClePrimaire
            ]);
        }
    }
?>