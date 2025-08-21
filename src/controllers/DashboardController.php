<?php

namespace App\Controllers;

use App\Core\Auth;

/**
 * Contrôleur DashboardController
 * 
 * Gère l’accès au tableau de bord de l’administration.
 * L’accès est restreint aux utilisateurs ayant le rôle :
 * - administrateur
 * - master administrateur
 */
class DashboardController
{
    /**
     * Affiche le tableau de bord si l’utilisateur est autorisé.
     * Redirige vers l’accueil sinon.
     *
     * @return void
     */
    public function dashboard(): void
    {
        // Vérifie les rôles autorisés pour accéder au dashboard
        if (Auth::get('auth', 'role') != 'administrateur' && Auth::get('auth', 'role') != 'master administrateur') {
            // Si l’utilisateur n’est pas autorisé → redirection vers la page d’accueil
            header('Location: index.php');
            return;
        }

        // Si autorisé, on affiche la vue du tableau de bord
        require('../templates/backend/dashboard/index.php');
    }
}
