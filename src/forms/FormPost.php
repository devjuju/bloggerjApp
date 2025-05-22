<?php

namespace App\Forms;


use App\Validators\ValidatorPost;

class FormPost
{

    public object $data;


    public function __construct(object $data)
    {
        $this->data = $data;
    }


    public function validate(): array|bool
    {
        $validator = new ValidatorPost($this->data);
        $result = $validator->checkData();
        print_r($result);

        foreach ($result as $key => $value) {
            if ($value === true) {
                unset($result[$key]);
            }
        }

        return $result;
    }

    public function validate2(): array|bool
    {
        $validator = new ValidatorPost($this->data);
        $result = $validator->checkData2(); // $result devrait être un tableau d'erreurs ou un tableau vide si valide
        print_r($result);

        // Filtrage des erreurs où les valeurs sont "true" (indiquant une validation réussie)
        foreach ($result as $key => $value) {
            if ($value === true) {
                unset($result[$key]);  // Supprimer l'entrée si la validation a réussi
            }
        }

        return $result; // Retourne les erreurs restantes ou un tableau vide si tout est valide
    }

    public function validate3(): array|bool
    {
        $validator = new ValidatorPost($this->data);
        $result = $validator->checkData3();
        print_r($result);
        foreach ($result as $key => $value) {
            if ($value === true) {
                unset($result[$key]);
            }
        }

        return $result;
    }
}
