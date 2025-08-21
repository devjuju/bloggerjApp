<?php

namespace App\Core;

/**
 * Classe Auth
 * 
 * Fournit des méthodes statiques pour gérer les sessions utilisateur.
 * 
 * - Stocker des données dans la session
 * - Récupérer des valeurs
 * - Vérifier l'existence de clés
 * - Supprimer des données
 * - Détruire complètement la session
 */
class Auth
{
    /**
     * Récupère une valeur stockée en session
     *
     * @param string $name Nom du "groupe" (clé principale dans $_SESSION)
     * @param string $key  Clé spécifique à récupérer dans ce groupe
     * @return mixed|null  La valeur correspondante ou null si inexistante
     */
    public static function get(string $name, string $key)
    {
        return isset($_SESSION[$name][$key]) ? $_SESSION[$name][$key] : null;
    }

    /**
     * Définit une valeur dans la session
     *
     * @param string $name  Nom du "groupe" (clé principale)
     * @param string $key   Clé spécifique
     * @param mixed  $value Valeur à stocker
     */
    public static function set(string $name, string $key, $value): void
    {
        $_SESSION[$name][$key] = $value;
    }

    /**
     * Supprime une valeur spécifique de la session
     *
     * @param string $name Nom du "groupe"
     * @param string $key  Clé à supprimer
     */
    public static function delete(string $name, string $key): void
    {
        if (isset($_SESSION[$name][$key])) {
            unset($_SESSION[$name][$key]);
        }
    }

    /**
     * Vérifie si une clé ou un groupe existe en session
     *
     * @param string $name Nom du "groupe"
     * @param string|false $key Clé spécifique (facultatif). 
     *                          Si false → vérifie seulement l’existence du groupe.
     * @return bool
     */
    public static function has(string $name, $key = false): bool
    {
        if ($key) {
            return isset($_SESSION[$name][$key]);
        }
        return isset($_SESSION[$name]);
    }

    /**
     * Détruit complètement la session en cours
     */
    public static function destroy(): void
    {
        session_unset();
        session_destroy();
    }
}
