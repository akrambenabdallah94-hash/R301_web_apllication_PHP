<?php
namespace App\Covoiturage\Model\DataObject;

abstract class AbstractDataObject {
    /**
     * Transforme l'objet en tableau utilisable par PDOStatement::execute().
     * Les clés sont de la forme "<nomColonne>Tag".
     */
    public abstract function formatTableau(): array;
}
