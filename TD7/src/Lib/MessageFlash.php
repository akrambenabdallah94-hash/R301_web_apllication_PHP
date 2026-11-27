<?php
    namespace App\Covoiturage\Lib;

    use App\Covoiturage\Model\HTTP\Session;

    class MessageFlash
    {
        // Les messages sont enregistrés en session associée à la clé suivante
        private static string $cleFlash = "_messagesFlash";

        // $type parmi "success", "info", "warning" ou "danger"
        public static function ajouter(string $type, string $message): void
        {
            $session = Session::getInstance();
            $messagesFlash = $session->contient(static::$cleFlash) ? $session->lire(static::$cleFlash) : [];
            $messagesFlash[$type][] = $message;
            $session->enregistrer(static::$cleFlash, $messagesFlash);
        }

        public static function contientMessage(string $type): bool
        {
            $session = Session::getInstance();
            return $session->contient(static::$cleFlash)
                && !empty($session->lire(static::$cleFlash)[$type]);
        }

        // Attention : la lecture doit détruire le message
        public static function lireMessages(string $type): array
        {
            if (!static::contientMessage($type)) {
                return [];
            }
            $session = Session::getInstance();
            $messagesFlash = $session->lire(static::$cleFlash);
            $messages = $messagesFlash[$type];
            unset($messagesFlash[$type]); // Le message est détruit quand il est lu
            $session->enregistrer(static::$cleFlash, $messagesFlash);
            return $messages;
        }

        public static function lireTousMessages() : array
        {
            $messages = [];
            foreach (["success", "info", "warning", "danger"] as $type) {
                $messages[$type] = static::lireMessages($type);
            }
            return $messages;
        }
    }
