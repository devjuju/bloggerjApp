<?php

declare(strict_types=1);

namespace App\Validators;

use App\Core\Validator;

class ValidatorComment extends Validator
{
    /** @var object Données du formulaire, typiquement un objet Comment */
    public object $data;

    public function __construct(object $data)
    {
        $this->data = $data;
    }

    /**
     * Vérifie la validité des données du commentaire.
     *
     * @return true|array<string, string> Retourne true si tout est valide, sinon un tableau d'erreurs.
     */
    public function checkData(): true|array
    {
        $resultContent = $this->checkComment($this->data->getContent());
        $resultStatus = $this->checkStatus($this->data->getStatus());

        if ($resultContent === true && $resultStatus === true) {
            return true;
        }

        return [
            'content' => $resultContent === true ? '' : $resultContent,
            'status' => $resultStatus === true ? '' : $resultStatus,
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
            return "Le commentaire est requis";
        }

        if ($this->isSmallerThan($content, 15)) {
            return "15 caractères minimum";
        }

        return true;
    }

    /**
     * Vérifie le statut du commentaire.
     *
     * @param string|null $status
     * @return true|string
     */
    public function checkStatus(?string $status): true|string
    {
        if (empty($status)) {
            return "valider le commentaire";
        }

        return true;
    }
}
