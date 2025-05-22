<?php

namespace App\Core;

class DateFormatter
{
    /**
     * Convertit une date au format YYYY-MM-DD HH:MM:SS en français.
     */
    public static function enFrancais(string $datetime): string
    {
        // Créer un objet DateTime à partir de la chaîne
        $date = \DateTime::createFromFormat('Y-m-d H:i:s', $datetime);

        // Si la date est invalide, retourne un message d'erreur
        if (!$date) {
            return 'Date invalide';
        }

        // Définir la locale française
        $locale = 'fr_FR';

        // Créer un formateur de date avec IntlDateFormatter
        $formatter = new \IntlDateFormatter(
            $locale,
            \IntlDateFormatter::FULL,
            \IntlDateFormatter::SHORT,
            $date->getTimezone(),
            \IntlDateFormatter::GREGORIAN,
            "d-MM-yyyy"
        );

        // Formater la date
        $dateStr = $formatter->format($date);

        return $dateStr ?: 'Date invalide';
    }
}
