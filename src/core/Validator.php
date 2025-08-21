<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Classe Validator
 * Fournit des méthodes pour valider des chaînes de caractères.
 */
class Validator
{
    /**
     * Vérifie si la longueur de la chaîne est inférieure à une valeur donnée.
     *
     * @param string $value  La chaîne à tester.
     * @param int    $length La longueur de référence.
     * @return bool  true si la chaîne est plus courte, sinon false.
     */
    public function isSmallerThan(string $value, int $length): bool
    {
        return strlen($value) < $length;
    }

    /**
     * Vérifie si la chaîne ne respecte pas un motif autorisé.
     * Le motif autorise uniquement des lettres, des espaces, des apostrophes et des tirets.
     *
     * @param string $value La chaîne à tester.
     * @return bool  true si le motif est invalide, sinon false.
     */
    public function isPatternInvalid(string $value): bool
    {
        return !preg_match("/^[A-Za-z '-]+$/", $value);
    }
}
