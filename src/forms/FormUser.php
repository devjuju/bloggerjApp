<?php

namespace App\Forms;

use App\Validators\ValidatorUser;

class FormUser
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function validateLogin(): array|bool
    {
        $validator = new ValidatorUser($this->data);
        $result = $validator->checkDataLogin();
        print_r($result);

        // On supprime les éléments qui sont true
        foreach ($result as $key => $value) {
            if ($value === true) {
                unset($result[$key]);
            }
        }


        return $result;
    }

    public function validateRegister(): array|bool
    {
        $validator = new ValidatorUser($this->data);
        $result = $validator->checkDataRegister();
        print_r($result);

        foreach ($result as $key => $value) {
            if ($value === true) {
                unset($result[array_search($key, $result)]);
            }
        }
        return $result;
    }


    public function validateCreate(): array|bool
    {
        $validator = new ValidatorUser($this->data);
        $result = $validator->checkDataCreate();
        print_r($result);

        foreach ($result as $key => $value) {
            if ($value === true) {
                unset($result[array_search($key, $result)]);
            }
        }
        return $result;
    }

    public function validateUpdate(): array|bool
    {
        $validator = new ValidatorUser($this->data);
        $result = $validator->checkDataUpdate();
        print_r($result);

        foreach ($result as $key => $value) {
            if ($value === true) {
                unset($result[array_search($key, $result)]);
            }
        }
        return $result;
    }

    public function validateUpdateImage(): array|bool
    {
        $validator = new ValidatorUser($this->data);
        $result = $validator->checkDataUpdateImage();
        print_r($result);

        foreach ($result as $key => $value) {
            if ($value === true) {
                unset($result[array_search($key, $result)]);
            }
        }
        return $result;
    }
}
