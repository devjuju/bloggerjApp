<?php

namespace App\Controllers;

use App\Core\Auth;


class DashboardController
{
    public function dashboard(): void
    {
        // Sécurité
        if (Auth::get('auth', 'role') != 'administrateur' && Auth::get('auth', 'role') != 'master administrateur') {
            header('Location: index.php');
            return;
        }


        require('../templates/backend/dashboard/index.php');
    }
}
