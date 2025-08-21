<?php

namespace App\Forms;

use App\Validators\ValidatorUser;

/**
 * Classe FormUser
 *
 * Sert d'interface entre les données reçues (formulaires)
 * et le validateur `ValidatorUser`. 
 * Chaque méthode correspond à un scénario (login, register, create, update).
 *
 * ⚠️ Elle fait un post-traitement :
 * - Supprime les champs valides (= true)
 * - Ne conserve que les messages d'erreurs
 */

class FormUser
{
    /**
     * Données utilisateur (objet DTO, ou User)
     */
    public $data;

    /**
     * Constructeur : initialise avec les données utilisateur.
     *
     * @param object $data Objet contenant les getters (email, password, etc.)
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Validation du formulaire de connexion.
     *
     * @return array|bool Tableau d'erreurs ou true si tout est valide.
     */
    public function validateLogin(): array|bool
    {
        $validator = new ValidatorUser($this->data);
        $result = $validator->checkDataLogin();

        // Nettoie les champs qui sont déjà valides (true)
        if (is_array($result)) {
            foreach ($result as $key => $value) {
                if ($value === true) {
                    unset($result[$key]);
                }
            }
        }
        return $result;
    }

    /**
     * Validation du formulaire d'inscription.
     *
     * @return array|bool Tableau d'erreurs ou true si tout est valide.
     */
    public function validateRegister(): array|bool
    {
        $validator = new ValidatorUser($this->data);
        $result = $validator->checkDataRegister();

        // Nettoie les champs qui sont déjà valides (true)
        if (is_array($result)) {
            foreach ($result as $key => $value) {
                if ($value === true) {
                    unset($result[$key]);
                }
            }
        }
        return $result;
    }

    /**
     * Validation lors de la création d'un utilisateur (admin).
     *
     * @return array|bool Tableau d'erreurs ou true si tout est valide.
     */
    public function validateCreate(): array|bool
    {
        $validator = new ValidatorUser($this->data);
        $result = $validator->checkDataCreate();

        // Nettoie les champs qui sont déjà valides (true)
        if (is_array($result)) {
            foreach ($result as $key => $value) {
                if ($value === true) {
                    unset($result[$key]);
                }
            }
        }
        return $result;
    }

    /**
     * Validation lors de la mise à jour d'un utilisateur.
     *
     * @return array|bool Tableau d'erreurs ou true si tout est valide.
     */
    public function validateUpdate(): array|bool
    {
        $validator = new ValidatorUser($this->data);
        $result = $validator->checkDataUpdate();

        // Nettoie les champs qui sont déjà valides (true)
        if (is_array($result)) {
            foreach ($result as $key => $value) {
                if ($value === true) {
                    unset($result[$key]);
                }
            }
        }
        return $result;
    }
}
