<?php

namespace App\Forms;

use App\Validators\ValidatorComment;

/**
 * Classe FormComment
 * -------------------
 * Sert d'interface entre les données d'un commentaire et le validateur.
 * Retourne toujours un tableau d'erreurs : vide si aucune erreur.
 */
class FormComment
{
    /** @var object Données du formulaire, typiquement un objet Comment */
    public object $data;

    public function __construct(object $data)
    {
        $this->data = $data;
    }

    /**
     * Valide les données du commentaire.
     *
     * @return array Tableau d'erreurs, vide si tout est valide
     */
    public function validate(): array|bool
    {
        // Instancie le validateur avec les données du commentaire
        $validator = new ValidatorComment($this->data);

        // Récupère les erreurs éventuelles
        $result = $validator->checkData();

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
