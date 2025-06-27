<?php

namespace App\Validators;

use App\Core\Request;
use App\Core\Validator;

class ValidatorPass extends Validator
{

    public object $data;


    public function __construct(object $data)
    {
        $this->data = $data;
    }

    public function checkDataUpdatePass(): bool|array
    {
        $resultPassword = $this->checkPassword($this->data->getPassword());

        // Récupérer le champ confirm_password depuis le POST
        $request = new Request();
        $confirmPassword = $request->post('confirm_password');

        $resultConfirm = true;

        // Vérifie si les mots de passe correspondent
        if ($this->data->getPassword() !== $confirmPassword) {
            $resultConfirm = "Les mots de passe ne correspondent pas.";
        }

        if ($resultPassword === true && $resultConfirm === true) {
            return true;
        } else {
            return [
                'password' => $resultPassword,
                'confirm_password' => $resultConfirm,
            ];
        }
    }


    public function checkPassword(string $password): string|bool
    {
        if (empty($password)) {
            return "Entrer le mot de passe ";
        } elseif ($this->isSmallerThan($password, 10)) {
            return "10 caractères minimum";
        } else {
            return true;
        }
    }
}
