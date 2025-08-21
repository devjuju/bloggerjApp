<?php

declare(strict_types=1);

namespace App\Validators;

use App\Core\Validator;

/**
 * Classe ValidatorComment
 * -----------------------
 * Valide les données d'un commentaire.
 * Hérite de la classe Validator pour utiliser des méthodes utilitaires communes.
 */
class ValidatorComment extends Validator
{
    /** 
     * @var object Données du formulaire, typiquement un objet Comment 
     */
    public object $data;

    /**
     * Constructeur
     *
     * @param object $data Données du commentaire à valider
     */
    public function __construct(object $data)
    {
        $this->data = $data;
    }

    /**
     * Vérifie la validité globale du commentaire.
     *
     * @return true|array<string, string> Retourne true si toutes les validations passent, sinon un tableau associatif d'erreurs.
     */
    public function checkData(): true|array
    {
        // Vérifie le contenu du commentaire
        $resultContent = $this->checkComment($this->data->getContent());

        // Si tout est correct, on retourne true
        if ($resultContent === true) {
            return true;
        }

        // Sinon, on retourne un tableau d'erreurs avec la clé 'content'
        return [
            'content' => $resultContent,
        ];
    }

    /**
     * Vérifie le contenu du commentaire.
     *
     * @param string|null $content
     * @return true|string
     */
    public function checkComment(?string $content): true|string
    {
        if (empty($content)) {
            return "Veuillez entrer votre commentaire.";
        }

        if ($this->isSmallerThan($content, 15)) {
            return "Le commentaire doit contenir au moins 15 caractères.";
        }

        return true;
    }
}
