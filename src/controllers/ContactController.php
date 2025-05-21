<?php

namespace App\Controllers;

class ContactController
{
    public function contact(): void
    {
        require('../templates/frontend/contact/index.php');
    }
}
