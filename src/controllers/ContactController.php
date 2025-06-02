<?php

namespace App\Controllers;

use App\Core\Request;
use App\Forms\FormContact;
use App\Models\Contact;

class ContactController
{
    public function contact(): void
    {

        $request = new Request();
        $submit = $request->post('contact');
        //var_dump($request);
        if (isset($submit)) {

            $contact = new Contact($request->post('contact'));
            $formContact = new FormContact($contact);
            $controle = $formContact->validate();
        }


        require('../templates/frontend/contact/index.php');
    }
}
