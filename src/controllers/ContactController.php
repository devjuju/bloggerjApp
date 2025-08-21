<?php

namespace App\Controllers;

use App\Core\Request;
use App\Forms\FormContact;
use App\Models\Contact;

/**
 * Contrôleur ContactController
 * 
 * Gère la page de contact :
 * - Affiche le formulaire
 * - Traite et valide l'envoi du formulaire
 */
class ContactController
{
    /**
     * Affiche la page de contact et gère la soumission du formulaire
     *
     * @return void
     */
    public function contact(): void
    {
        $request = new Request();

        // Vérifie si le formulaire de contact a été soumis
        $submit = $request->post('contact');
        if (isset($submit)) {
            // Hydrate l'entité Contact avec les données envoyées
            $contact = new Contact($request->post('contact'));

            // Initialise le validateur de formulaire
            $formContact = new FormContact($contact);

            // Lance la validation du formulaire
            $controle = $formContact->validate();
        }

        // Charge la vue du formulaire de contact
        require('../templates/frontend/contact/index.php');
    }
}
