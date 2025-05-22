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
        $request = new Request();
        $submit = $request->post('login');
        if (isset($submit)) {

            $login = new Users($request->post('login'));
            $formLogin = new FormUser($login);
            $controle = $formLogin->validateLogin();

            if ($controle === true) {


                $user = $login->findOneByEmail();

                // Si l'utilisateur n'existe pas
                if ($user) {

                    // faire en sorte que l'adresse email reste dans le formulaire -> index.php de la vue
                    // par contre pas le mot de passe
                    if (password_verify($login->getPassword(), $user->password)) {
                        // Le mot de passe est bon
                        echo 'pass ok';
                        print_r($user);

                        if ($user->status == '1') {
                            Auth::set('auth', 'id', $user->id);
                            Auth::set('auth', 'role', $user->role);
                            Auth::set('auth', 'image', $user->image);
                            Auth::set('auth', 'lastname', $user->lastname);
                            Auth::set('auth', 'firstname', $user->firstname);
                            Auth::set('auth', 'email', $user->email);
                            Auth::set('auth', 'username', $user->username);

                            Auth::set('message', 'class', 'success');
                            Auth::set('message', 'content', "Vous êtes connecté");

                            if (Auth::get('auth', 'role') === 'administrateur') {
                                header('Location: index.php?action=dashboard');
                            } else {
                                header('Location: index.php');
                            }
                        } else { // statut = 0
                            $controle = [
                                'email' => 'Compte non validé'
                            ];
                        }
                    } else {
                        // Mauvais mot de passe

                        $controle = [
                            'email' => 'Identifiants incorrects'
                        ];
                    }
                } else {
                    // Utilisateur n'existe pas

                    $controle = [
                        'email' => 'Identifiants incorrects'
                    ];
                }
            }
        }
        require('../templates/frontend/login/index.php');
    }

    public function logout(): void
    {

        Auth::destroy(); //unset($_SESSION);  session_destroy();
        header('Location: index.php');
    }

    public function account(): void
    {

        require('../templates/frontend/account/index.php');
    }
}
