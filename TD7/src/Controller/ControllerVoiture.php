<?php
    namespace App\Covoiturage\Controller;
    use App\Covoiturage\Model\DataObject\Voiture;
    use App\Covoiturage\Model\Repository\VoitureRepository; // Indispensable pour que le contrôleur trouve la classe

    class ControllerVoiture extends GenericController {
        // Déclaration de type de retour void : la fonction ne retourne pas de valeur
        public static function readAll() : void {
            $voitures = (new VoitureRepository())->selectAll(); // Appel au modèle pour gerer la BDD
            GenericController::afficheVue('view.php', ['voitures' => $voitures, 'pagetitle' => 'Listes des voitures', 'cheminVueBody' => "voiture/list.php" ]);
        }

        public static function read() : void {
            $immatriculation = $_GET['immatriculation']; // Récupère l'immatriculation depuis l'URL, ou une chaîne vide si elle n'est pas définie
            $voiture = (new VoitureRepository())->select($immatriculation);
            if($voiture == null){
                GenericController::error("Aucune voiture trouvée avec l'immatriculation : " . $immatriculation);
                return;
            }
            GenericController::afficheVue('view.php', ['voiture' => $voiture, 'pagetitle' => "Détail", 'cheminVueBody' => "voiture/detail.php"]);
        }

        public static function create() : void {
            GenericController::afficheVue('view.php', ['pagetitle' => "Creations de voitures", 'cheminVueBody' => "voiture/create.php"]);
        }

        public static function created() : void {
            $voiture = new Voiture($_GET['immatriculation'], $_GET['marque'], $_GET['couleur'], $_GET['nbSieges']);
            (new VoitureRepository())->sauvegarder($voiture);
            $voitures = (new VoitureRepository())->selectAll();
            GenericController::afficheVue('view.php', ['voitures' => $voitures, 'pagetitle' => "Creation success", 'cheminVueBody' => "voiture/created.php"]);
        }

        public static function delete() : void {
            $immatriculation = $_GET['immatriculation'];
            (new VoitureRepository())->delete($immatriculation);
            $voitures = (new VoitureRepository())->selectAll();
            GenericController::afficheVue('view.php', ['immatriculation' => $immatriculation, 'voitures' => $voitures, 'pagetitle' => "Voiture supprimée", 'cheminVueBody' => "voiture/deleted.php"]);
        }

        public static function update() : void {
            $immatriculation = $_GET['immatriculation'];
            $voiture = (new VoitureRepository())->select($immatriculation);
            if($voiture == null){
                GenericController::error("Aucune voiture trouvée avec l'immatriculation : " . $immatriculation);
                return;
            }
            GenericController::afficheVue('view.php', ['voiture' => $voiture, 'pagetitle' => "Mise à jour", 'cheminVueBody' => "voiture/update.php"]);
        }

        public static function updated() : void {
            $voiture = new Voiture($_GET['immatriculation'], $_GET['marque'], $_GET['couleur'], $_GET['nbSieges']);
            (new VoitureRepository())->update($voiture);
            $voitures = (new VoitureRepository())->selectAll();
            GenericController::afficheVue('view.php', ['immatriculation' => $voiture->getImmatriculation(), 'voitures' => $voitures, 'pagetitle' => "Mise à jour réussie", 'cheminVueBody' => "voiture/updated.php"]);
        }
    }

    
?>