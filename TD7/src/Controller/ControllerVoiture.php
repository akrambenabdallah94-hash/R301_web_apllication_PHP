<?php
    namespace App\Covoiturage\Controller;
    use App\Covoiturage\Lib\MessageFlash;
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
            // Si un champ du formulaire est manquant : message de danger et retour au formulaire
            if (empty($_GET['immatriculation']) || empty($_GET['marque']) || empty($_GET['couleur']) || empty($_GET['nbSieges'])) {
                MessageFlash::ajouter("danger", "Immatriculation, marque, couleur ou nombre de sièges manquant.");
                GenericController::redirectionVersURL("frontController.php?controller=voiture&action=create");
            }
            // Si l'immatriculation existe déjà : message d'avertissement et retour au formulaire
            if ((new VoitureRepository())->select($_GET['immatriculation']) !== null) {
                MessageFlash::ajouter("warning", "Immatriculation existante.");
                GenericController::redirectionVersURL("frontController.php?controller=voiture&action=create");
            }
            $voiture = new Voiture($_GET['immatriculation'], $_GET['marque'], $_GET['couleur'], $_GET['nbSieges']);
            (new VoitureRepository())->sauvegarder($voiture);
            MessageFlash::ajouter("success", "La voiture a bien été créée !");
            GenericController::redirectionVersURL("frontController.php?controller=voiture&action=readAll");
        }

        public static function delete() : void {
            $immatriculation = $_GET['immatriculation'];
            (new VoitureRepository())->delete($immatriculation);
            MessageFlash::ajouter("success", "La voiture d'immatriculation " . $immatriculation . " a bien été supprimée.");
            GenericController::redirectionVersURL("frontController.php?controller=voiture&action=readAll");
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
            MessageFlash::ajouter("success", "La voiture d'immatriculation " . $voiture->getImmatriculation() . " a bien été mise à jour.");
            GenericController::redirectionVersURL("frontController.php?controller=voiture&action=readAll");
        }
    }

    
?>