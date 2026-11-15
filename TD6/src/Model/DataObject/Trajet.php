<?php
namespace App\Covoiturage\Model\DataObject;

class Trajet extends AbstractDataObject {
    private ?int $id; // null tant que le trajet n'est pas en base (AUTO_INCREMENT)
    private string $villeDepart;
    private string $villeArrivee;
    private string $dateDepart;
    private int $nbPlaces;
    private float $prix;
    private string $conducteurLogin;

    public function __construct(?int $id, string $villeDepart, string $villeArrivee, string $dateDepart,
                                int $nbPlaces, float $prix, string $conducteurLogin) {
        $this->id = $id;
        $this->villeDepart = $villeDepart;
        $this->villeArrivee = $villeArrivee;
        $this->dateDepart = $dateDepart;
        $this->nbPlaces = $nbPlaces;
        $this->prix = $prix;
        $this->conducteurLogin = $conducteurLogin;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getVilleDepart(): string {
        return $this->villeDepart;
    }

    public function setVilleDepart(string $villeDepart): void {
        $this->villeDepart = $villeDepart;
    }

    public function getVilleArrivee(): string {
        return $this->villeArrivee;
    }

    public function setVilleArrivee(string $villeArrivee): void {
        $this->villeArrivee = $villeArrivee;
    }

    public function getDateDepart(): string {
        return $this->dateDepart;
    }

    public function setDateDepart(string $dateDepart): void {
        $this->dateDepart = $dateDepart;
    }

    public function getNbPlaces(): int {
        return $this->nbPlaces;
    }

    public function setNbPlaces(int $nbPlaces): void {
        $this->nbPlaces = $nbPlaces;
    }

    public function getPrix(): float {
        return $this->prix;
    }

    public function setPrix(float $prix): void {
        $this->prix = $prix;
    }

    public function getConducteurLogin(): string {
        return $this->conducteurLogin;
    }

    public function setConducteurLogin(string $conducteurLogin): void {
        $this->conducteurLogin = $conducteurLogin;
    }

    public function formatTableau(): array {
        return [
            "idTag" => $this->getId(),
            "departTag" => $this->getVilleDepart(),
            "arriveeTag" => $this->getVilleArrivee(),
            "dateTag" => $this->getDateDepart(),
            "nbPlacesTag" => $this->getNbPlaces(),
            "prixTag" => $this->getPrix(),
            "conducteurLoginTag" => $this->getConducteurLogin(),
        ];
    }
}
