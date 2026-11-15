<?php
    namespace App\Covoiturage\Model\Repository;
    use App\Covoiturage\Model\DataObject\AbstractDataObject; // (si Model.php est aussi dans le même namespace)

    abstract class AbstractRepository {
         // Abstract methods for database operations
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
    }
?>