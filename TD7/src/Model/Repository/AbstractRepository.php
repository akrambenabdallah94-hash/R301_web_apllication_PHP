<?php
    namespace App\Covoiturage\Model\Repository;
    use App\Covoiturage\Model\DataObject\AbstractDataObject;

    abstract class AbstractRepository {

        protected abstract function getNomTable() : string;

        protected abstract function getNomClePrimaire() : string;

        protected abstract function getNomsColonnes() : array;

        protected abstract function construire(array $objetFormatTableau) : AbstractDataObject;

        /**
         * @return AbstractDataObject[]
         */
        public function selectAll(): array{
            $model = new DatabaseConnection();
            $pdoStatement = $model->getPdo()->query('SELECT * FROM ' . $this->getNomTable());
            $objets = [];
            foreach($pdoStatement as $objetFormatTableau){
                $objets[] = $this->construire($objetFormatTableau);
            }
            return $objets;
        }

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

        public function delete(string $valeurClePrimaire): void{
            $sql = "DELETE FROM " . $this->getNomTable() . " WHERE " . $this->getNomClePrimaire() . " = :clePrimaireTag";
            $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
            $pdoStatement->execute([
                "clePrimaireTag" => $valeurClePrimaire
            ]);
        }

        public function update(AbstractDataObject $object): void {
            $clePrimaire = $this->getNomClePrimaire();
            $setParts = [];
            foreach($this->getNomsColonnes() as $nomColonne){
                if($nomColonne != $clePrimaire){
                    $setParts[] = "$nomColonne = :{$nomColonne}Tag";
                }
            }
            $sql = "UPDATE " . $this->getNomTable() . " SET " . implode(", ", $setParts) . " WHERE $clePrimaire = :{$clePrimaire}Tag";
            $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
            $pdoStatement->execute($object->formatTableau());
        }

        public function sauvegarder(AbstractDataObject $object): bool {
            $colonnes = $this->getNomsColonnes();
            $tags = [];
            foreach($colonnes as $nomColonne){
                $tags[] = ":{$nomColonne}Tag";
            }
            $sql = "INSERT INTO " . $this->getNomTable() . "(" . implode(", ", $colonnes) . ") VALUES(" . implode(", ", $tags) . ")";
            $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
            $pdoStatement->execute($object->formatTableau());
            return true;
        }
    }
?>
