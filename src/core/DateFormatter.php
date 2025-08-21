<?php

namespace App\Core;

/**
 * Classe DateFormatter
 * 
 * Fournit des méthodes pour formater les dates en français.
 */
class DateFormatter
{
    /**
     * Convertit une date au format 'YYYY-MM-DD HH:MM:SS' en format français lisible.
     * 
     * @param string $datetime Date au format 'YYYY-MM-DD HH:MM:SS'
     * @return string Date formatée en français ou message d'erreur si invalide
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
        // - Locale : fr_FR
        // - Format date complet, heure courte
        // - Fuseau horaire de la date
        // - Calendrier grégorien
        // - Pattern personnalisé 'jour-mois-année'
        $formatter = new \IntlDateFormatter(
            $locale,
            \IntlDateFormatter::FULL,
            \IntlDateFormatter::SHORT,
            $date->getTimezone(),
            \IntlDateFormatter::GREGORIAN,
            "d-MM-yyyy"
        );

        // Formater la date en chaîne
        $dateStr = $formatter->format($date);

        // Retourner la date formatée ou un message d'erreur si le formatage échoue
        return $dateStr ?: 'Date invalide';
    }
}
