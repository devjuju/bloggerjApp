<?php

namespace App\Controllers;

class UsersController
{
    public function register(): void
    {
        require('../templates/frontend/register/index.php');
    }

    public function login(): void
    {
        require('../templates/frontend/login/index.php');
    }
}
