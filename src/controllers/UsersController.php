<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Request;
use App\Forms\FormUser;
use App\Models\Users;


require "../src/models/users.php";




class UsersController
{
    public function register(): void
    {
        $request = new Request();
        $submit = $request->post('register');
        if (isset($submit)) {
            // test image
            $register = new Users($request->post('register'));
            $formRegister = new FormUser($register);
            $controle = $formRegister->validateRegister();

            if ($controle === true) {

                // photo de profil
                $img_name = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);


                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                $register->setImage($new_img_name);
                $register->setRole('administrateur');
                $register->setStatus('1');

                // On chiffre le mot de passe
                $register->setPassword(password_hash($register->getPassword(), PASSWORD_BCRYPT));

                $register->create();

                Auth::set('message', 'class', 'success');
                Auth::set('message', 'content', "Compte crée");

                header('Location: index.php');
            }
        }

        require('../templates/frontend/register/index.php');
    }

    public function login(): void
    {
        require('../templates/frontend/login/index.php');
    }
}
