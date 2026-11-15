<?php
namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Model\DataObject\AbstractDataObject;
use PDOException;

abstract class AbstractRepository {

    protected abstract function getNomTable(): string;

    protected abstract function getNomClePrimaire(): string;

    /** @return string[] tous les noms de colonnes de la table (clé primaire comprise) */
    protected abstract function getNomsColonnes(): array;

    protected abstract function construire(array $objetFormatTableau): AbstractDataObject;

    /**
     * @return AbstractDataObject[]
     */
    public function selectAll(): array {
        $pdoStatement = DatabaseConnection::getPdo()->query("SELECT * FROM " . $this->getNomTable());
        $objets = [];
        foreach ($pdoStatement as $objetFormatTableau) {
            $objets[] = $this->construire($objetFormatTableau);
        }
        return $objets;
    }

    public function select(string $valeurClePrimaire): ?AbstractDataObject {
        $sql = "SELECT * FROM " . $this->getNomTable() . " WHERE " . $this->getNomClePrimaire() . " = :clePrimaireTag";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $pdoStatement->execute(["clePrimaireTag" => $valeurClePrimaire]);
        $objetFormatTableau = $pdoStatement->fetch();
        if ($objetFormatTableau === false) {
            return null;
        }
        return $this->construire($objetFormatTableau);
    }

    public function delete(string $valeurClePrimaire): void {
        $sql = "DELETE FROM " . $this->getNomTable() . " WHERE " . $this->getNomClePrimaire() . " = :clePrimaireTag";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $pdoStatement->execute(["clePrimaireTag" => $valeurClePrimaire]);
    }

    /**
     * Construit : UPDATE table SET col1 = :col1Tag, col2 = :col2Tag WHERE clePrimaire = :clePrimaireTag
     */
    public function update(AbstractDataObject $object): void {
        $clePrimaire = $this->getNomClePrimaire();
        $setParts = [];
        foreach ($this->getNomsColonnes() as $nomColonne) {
            if ($nomColonne !== $clePrimaire) {
                $setParts[] = "$nomColonne = :{$nomColonne}Tag";
            }
        }
        $sql = "UPDATE " . $this->getNomTable()
            . " SET " . implode(", ", $setParts)
            . " WHERE $clePrimaire = :{$clePrimaire}Tag";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $pdoStatement->execute($object->formatTableau());
    }

    /**
     * Construit : INSERT INTO table (col1, col2, ...) VALUES (:col1Tag, :col2Tag, ...)
     * @return bool false si l'insertion échoue (ex : clé primaire déjà utilisée)
     */
    public function sauvegarder(AbstractDataObject $object): bool {
        $colonnes = $this->getNomsColonnes();
        $tags = array_map(fn(string $c) => ":{$c}Tag", $colonnes);
        $sql = "INSERT INTO " . $this->getNomTable()
            . " (" . implode(", ", $colonnes) . ") VALUES (" . implode(", ", $tags) . ")";
        try {
            $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
            $pdoStatement->execute($object->formatTableau());
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
