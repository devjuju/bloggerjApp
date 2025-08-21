<?php

namespace App\Controllers;

/**
 * Contrôleur HomeController
 * 
 * Gère l’affichage de la page d’accueil du site.
 */
class HomeController
{
    /**
     * Affiche la page d’accueil (vue frontend).
     *
     * @return void
     */
    public function home(): void
    {
        require('../templates/frontend/home/index.php');
    }
}
