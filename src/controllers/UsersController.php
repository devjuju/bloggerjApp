<?php

namespace App\Controllers;

class UsersController
{
    public function register(): void
    {
        require('../templates/frontend/register/index.php');
    }
}
