<?php

namespace App\Forms;

use App\Validators\ValidatorPass;

class FormPass
{

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function validateConfirmPass(): array|bool
    {
        $validator = new ValidatorPass($this->data);
        $result = $validator->checkDataCpass();
        print_r($result);

        // On supprime les éléments qui sont true
        foreach ($result as $key => $value) {
            if ($value === true) {
                unset($result[$key]);
            }
        }


        return $result;
    }
}
