<?php

namespace App\Validators;

use App\Core\Validator;


class ValidatorContact extends Validator
{
    public object $data;

    public function __construct(object $data)
    {
        $this->data = $data;
    }


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
                'sujet' => $resultSujet,
                'firstname' => $resultFirstname,
                'lastname' => $resultLastname,
                'message' => $resultMessage,
            ];
            return $errors;
        }
    }

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

    public function checkSujet(string $subject): true|string
    {
        if (empty($subject)) {
            return "Le sujet est requis";
        } elseif ($this->isSmallerThan($subject, 5)) {
            return "5 caractères minimum";
        } else {
            return true;
        }
    }

    public function checkFirstname(string $firstname): true|string
    {
        if (empty($firstname)) {
            return "Le prénom est requis";
        } elseif ($this->isSmallerThan($firstname, 5)) {
            return "c'est plus petit que 5 caractères";
        } elseif ($this->isPatternInvalid($firstname)) {
            return "Le prénom doit contenir seulement des caractères";
        } else {
            return true;
        }
    }


    public function checkLastname(string $lastname): true|string
    {
        if (empty($lastname)) {
            return "Le nom est requis";
        } elseif ($this->isSmallerThan($lastname, 5)) {
            return "c'est plus petit que 5 caractères";
        } elseif ($this->isPatternInvalid($lastname)) {
            return "Le nom doit contenir seulement des caractères";
        } else {
            return true;
        }
    }

    public function checkMessage(string $message): true|string
    {
        if (empty($message)) {
            return "Le message est requis";
        } elseif ($this->isSmallerThan($message, 15)) {
            return "15 caractères minimum";
        } else {
            return true;
        }
    }
}
