<?php

namespace App\Models;

class Pass
{
    protected ?string $confirm_password = null;

    public function __construct(?array $data = null)
    {

        $this->setConfirmPass($data['confirm_password'] ?? 'null');
    }


    public function setConfirmPass($confirm_password)
    {
        $this->confirm_password = $confirm_password;
    }

    public function getPassword(): ?string
    {
        return $this->confirm_password;
    }
}
