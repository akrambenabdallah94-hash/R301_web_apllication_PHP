<?php
    namespace App\Covoiturage\Controller;
    use App\Covoiturage\Model\ModelVoiture; // Indispensable pour que le contrôleur trouve la classe
    
    class ControllerVoiture{
        // Déclaration de type de retour void : la fonction ne retourne pas de valeur
        public static function readAll() : void {
            $voitures = ModelVoiture::getVoitures(); // Appel au modèle pour gerer la BDD
            ControllerVoiture::afficheVue('view.php', ['voitures' => $voitures, 'pagetitle' => 'Listes des voitures', 'cheminVueBody' => "voiture/list.php" ]);
        }

        public static function read() : void {
            $immatriculation = $_GET['immatriculation']; // Récupère l'immatriculation depuis l'URL, ou une chaîne vide si elle n'est pas définie
            $voiture = ModelVoiture::getVoitureParImmat($immatriculation);
            if($voiture == null){
                ControllerVoiture::afficheVue('view.php', ['pagetitle' => "Page d'erreur", 'cheminVueBody' => "voiture/error.php"]);
            }
            ControllerVoiture::afficheVue('view.php', ['voiture' => $voiture, 'pagetitle' => "Détail", 'cheminVueBody' => "voiture/detail.php"]);
        }

        public static function afficheVue(string $cheminVue, array $parametres=[]) : void{
            extract($parametres); // Crée des variables à partir du tableau $paramètres
            require __DIR__ . '/../view/'. $cheminVue; //Charge la vue spécifiée en paramètre
        }

        public static function create() : void {
            ControllerVoiture::afficheVue('view.php', ['pagetitle' => "Creations de voitures", 'chemiVueBody' => "voiture/create.php"]);
        }

        public static function delete() : void{
            ControllerVoiture::afficheVue('view.php', ['pagetitle' => "Suppressions des voitures par immatriculations", 'cheminVueBody' => "voiture/delete.php"]);// redirige vers la vue delete
        }

        public static function created() : void {
            $voiture = ModelVoiture::construire(array(
                'immatriculation' => $_GET['immatriculation'],
                'marque' => $_GET['marque'],
                'couleur' => $_GET['couleur'],
                'nbSieges' => $_GET['nbSieges']
            ));
            $voiture->sauvegarder();
            ControllerVoiture::readAll();
        }

        public static function deleted() : void {
            $immatriculation = $_GET['immatriculation'];
            $voiture = ModelVoiture::getVoitureParImmat($immatriculation);
            $voiture->supprimer();
            ControllerVoiture::readAll();
        }
    }

    
?>