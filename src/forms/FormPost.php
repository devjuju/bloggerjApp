<?php

namespace App\Forms;


use App\Validators\ValidatorPost;

/**
 * Classe FormPost
 * ----------------
 * Cette classe sert d'interface entre les données reçues (ex: formulaire d'article)
 * et les règles de validation définies dans ValidatorPost.
 * 
 * Elle centralise la logique de validation lors de la création, la mise à jour 
 * et la mise à jour d'image d'un article.
 */
class FormPost
{
    // Données brutes du formulaire (objet contenant les champs du post)
    public object $data;

    /**
     * Constructeur
     *
     * @param object $data Données issues du formulaire (ex: $_POST transformé en objet)
     */
    public function __construct(object $data)
    {
        $this->data = $data;
    }

    /**
     * Validation des données lors de la création d'un article
     *
     * @return array|bool Tableau d'erreurs (clé => message) ou bool (false si aucune donnée à valider)
     */
    public function validateCreate(): array|bool
    {

        $validator = new ValidatorPost($this->data);
        $result = $validator->checkDataCreate();

        // Nettoie les validations réussies (valeurs true) pour ne garder que les erreurs
        if (is_array($result)) {
            foreach ($result as $key => $value) {
                if ($value === true) {
                    unset($result[$key]);
                }
            }
        }
        return $result; // Retourne seulement les erreurs éventuelles
    }

    /**
     * Validation des données lors de la mise à jour d'un article
     *
     * @return array|bool Tableau d'erreurs (clé => message) ou bool (false si aucune donnée à valider)
     */
    public function validateUpdate(): array|bool
    {
        $validator = new ValidatorPost($this->data);
        $result = $validator->checkDataUpdate();

        // Nettoie les validations réussies (valeurs true) pour ne garder que les erreurs
        if (is_array($result)) {
            foreach ($result as $key => $value) {
                if ($value === true) {
                    unset($result[$key]);
                }
            }
        }
        return $result; // Retourne seulement les erreurs éventuelles
    }

    /**
     * Validation spécifique à la mise à jour de l'image d'un article
     *
     * @return array|bool Tableau d'erreurs (clé => message) ou bool (false si aucune donnée à valider)
     */
    public function validateUpdateImage(): array|bool
    {
        $validator = new ValidatorPost($this->data);
        $result = $validator->checkDataUpdateImage();

        // Nettoie les validations réussies (valeurs true) pour ne garder que les erreurs
        if (is_array($result)) {
            foreach ($result as $key => $value) {
                if ($value === true) {
                    unset($result[$key]);
                }
            }
        }
        return $result; // Retourne seulement les erreurs éventuelles
    }
}
