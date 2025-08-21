<?php

namespace App\Validators;

use App\Core\Validator;

/**
 * Classe ValidatorContact
 * -----------------------
 * Valide les données d'un formulaire de contact.
 * Retourne toujours un tableau d'erreurs : vide si tout est valide.
 */
class ValidatorContact extends Validator
{
    /** @var object Données du formulaire de contact */
    public object $data;

    public function __construct(object $data)
    {
        $this->data = $data;
    }

    /**
     * Vérifie la validité globale du formulaire de contact.
     *
     * @return array Tableau d'erreurs, vide si tout est valide
     */
    public function checkData(): true|array
    {
        $resultLastname = $this->checkLastname($this->data->getLastname());
        $resultFirstname = $this->checkFirstname($this->data->getFirstname());
        $resultEmail = $this->checkEmail($this->data->getEmail());
        $resultSujet = $this->checkSujet($this->data->getSubject());
        $resultMessage = $this->checkMessage($this->data->getMessage());

        if ($resultEmail && $resultSujet && $resultFirstname && $resultLastname && $resultMessage === true) {
            return true;
        } else {
            $errors = [
                'email' => $resultEmail,
                'subject' => $resultSujet,
                'firstname' => $resultFirstname,
                'lastname' => $resultLastname,
                'message' => $resultMessage,
            ];
            return $errors;
        }
    }

    /** Vérifie la validité de l’adresse email. */
    public function checkEmail(string $email): true|string
    {
        if (empty($email)) {
            return "Le mail est requis";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return  "La valeur du mail est invalide";
        } else {
            return true;
        }
    }

    /** Vérifie que le sujet est présent, >= 5 caractères */
    public function checkSujet(string $subject): true|string
    {
        if (empty($subject)) {
            return "Le sujet est requis";
        } elseif ($this->isSmallerThan($subject, 5)) {
            return "Le sujet doit contenir au moins 5 caractères.";
        } else {
            return true;
        }
    }

    /** Vérifie que le prénom est présent, >= 5 caractères et uniquement alphabétique. */
    public function checkFirstname(string $firstname): true|string
    {
        if (empty($firstname)) {
            return "Le prénom est requis";
        } elseif ($this->isSmallerThan($firstname, 5)) {
            return "Le prénom doit contenir au moins 5 caractères.";
        } elseif ($this->isPatternInvalid($firstname)) {
            return "Le prénom doit contenir seulement des caractères";
        } else {
            return true;
        }
    }

    /** Vérifie que le nom est présent, >= 5 caractères et uniquement alphabétique. */
    public function checkLastname(string $lastname): true|string
    {
        if (empty($lastname)) {
            return "Le nom est requis";
        } elseif ($this->isSmallerThan($lastname, 5)) {
            return "Le nom doit contenir au moins 5 caractères.";
        } elseif ($this->isPatternInvalid($lastname)) {
            return "Le nom doit contenir seulement des caractères";
        } else {
            return true;
        }
    }

    /** Vérifie que le contenu du message est présent, >= 15 caractères */
    public function checkMessage(string $message): true|string
    {
        if (empty($message)) {
            return "Le message est requis";
        } elseif ($this->isSmallerThan($message, 15)) {
            return "Le message doit contenir au moins 15 caractères.";
        } else {
            return true;
        }
    }
}
