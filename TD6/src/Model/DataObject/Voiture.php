<?php
namespace App\Covoiturage\Model\DataObject;

class Voiture extends AbstractDataObject {
    private string $immatriculation;
    private string $marque;
    private string $couleur;
    private int $nbSieges;

    public function __construct(string $immatriculation, string $marque, string $couleur, int $nbSieges) {
        $this->immatriculation = substr($immatriculation, 0, 8); // 8 caractères maximum
        $this->marque = $marque;
        $this->couleur = $couleur;
        $this->nbSieges = $nbSieges;
    }

    public function getImmatriculation(): string {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): void {
        $this->immatriculation = substr($immatriculation, 0, 8);
    }

    public function getMarque(): string {
        return $this->marque;
    }

    public function setMarque(string $marque): void {
        $this->marque = $marque;
    }

    public function getCouleur(): string {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): void {
        $this->couleur = $couleur;
    }

    public function getNbSieges(): int {
        return $this->nbSieges;
    }

    public function setNbSieges(int $nbSieges): void {
        $this->nbSieges = $nbSieges;
    }

    public function formatTableau(): array {
        return [
            "immatriculationTag" => $this->getImmatriculation(),
            "marqueTag" => $this->getMarque(),
            "couleurTag" => $this->getCouleur(),
            "nbSiegesTag" => $this->getNbSieges(),
        ];
    }
}
