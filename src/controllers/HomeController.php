<?php

namespace App\Controllers;

class HomeController
{

    public function home(): void
    {

        require('../templates/frontend/home/index.php');
    }
}
