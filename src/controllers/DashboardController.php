<?php

namespace App\Controllers;

use App\Core\Auth;


class DashboardController
{
    public function dashboard(): void
    {
        // Sécurité
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }

        require('../templates/backend/dashboard/index.php');
    }
}
