<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Users;
use App\Core\Auth;
use App\Forms\FormUser;

class UsersController
{
    /* Frontend */

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

    public function accountSecurity(): void
    {

        require('../templates/frontend/accountsecurity/index.php');
    }

    public function accountSettings($id): void
    {
        // On instancie le modèle
        $userModel = new Users();

        // On va chercher 1 post
        $user = $userModel->find(Auth::get('auth', 'id') === $id);
        require('../templates/frontend/accountsettings/index.php');
    }


    /* Backend */
    public function users(): void
    {

        // Sécurité
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }

        $userModel = new Users();
        $username = Auth::get('auth', 'username');
        $email = Auth::get('auth', 'email');

        $auths = $userModel->findBy([
            'username' => $username,
            'email' => $email,
        ]);

        $users = $userModel->findAll();





        require('../templates/backend/users/index.php');
    }

    public function admin($id): void
    {

        $user = new Users;
        $user->setId($id);
        $user->setStatus('administrateur');

        $user->update();

        header('Location: index.php?action=users');
    }


    public function user($id): void
    {
        $user = new Users;
        $user->setId($id);
        $user->setStatus('utilisateur');

        $user->update();

        header('Location: index.php?action=users');
    }



    public function create(): void
    {
        // Sécurité
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }


        // Ajouter l'utilisateur

        $request = new Request();
        $submit = $request->post('create_user');
        if (isset($submit)) {
            // test image
            $createUser = new Users($request->post('create_user'));
            $formCreateUser = new FormUser($createUser);
            $controle = $formCreateUser->validateCreate();

            //echo '</pre>';
            //print_r($_FILES);
            //die;
            if ($controle === true) {

                // ajouter l'image
                $img_name = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);


                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                $createUser->setImage($new_img_name);
                $createUser->setStatus('1');

                // On chiffre le mot de passe
                $createUser->setPassword(password_hash($createUser->getPassword(), PASSWORD_BCRYPT));

                $createUser->create();

                Auth::set('message', 'class', 'success');
                Auth::set('message', 'content', "Utilisateur ajouté");

                header('Location: index.php?action=users');
            }
        }

        require('../templates/backend/createuser/index.php');
    }


    public function update($id): void
    {
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }

        $users = new Users();
        $user = $users->find($id);

        $request = new Request();
        $submit = $request->post('update_user');

        if (isset($submit)) {


            $updateUser = new Users($request->post('update_user'));
            // print_r($updatePost);
            $formUpdateUser = new FormUser($updateUser);
            $controle = $formUpdateUser->validateUpdate();
            //print_r($controle);
            if ($controle === true) {

                $updateUser->setId($user->id);

                // On chiffre le mot de passe
                $updateUser->setPassword(password_hash($updateUser->getPassword(), PASSWORD_BCRYPT));

                $updateUser->update();

                Auth::set('message', 'class', 'success');
                Auth::set('message', 'content', "Utilisateur modifié");
                header('Location: index.php?action=users');
                exit();
            }
        }

        require('../templates/backend/updateuser/index.php');
    }

    public function update_image_user($id)
    {

        // Sécurité
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }

        // On instancie le modèle
        $userModel = new Users();
        // On va chercher 1 annonce
        $user = $userModel->find($id);
        $request = new Request();
        $submit = $request->post('update_image_user');
        if (isset($submit)) {

            $updateImageUser = new Users();
            $formCreateUser = new FormUser($updateImageUser);
            $controle = $formCreateUser->validateUpdateImage();

            if ($controle === true) {

                if (unlink("uploads/$user->image")) {
                    $img_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);



                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'uploads/' . $new_img_name;



                    move_uploaded_file($tmp_name, $img_upload_path);
                }
                // Insert into Database
                $updateImageUser->setImage($new_img_name);
                $updateImageUser->setId($user->id);
                $updateImageUser->update();

                Auth::set('message', 'class', 'success');
                Auth::set('message', 'content', "Photo modifiée");

                header('Location: index.php?action=users');
                exit();
            }
        }

        require('../templates/backend/updateimageuser/index.php');
    }


    public function delete($id): void
    {
        // Sécurité
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }

        // On instancie le modèle
        $user = new Users();
        // On va chercher 1 annonce
        $user->delete($id);

        Auth::set('message', 'class', 'success');
        Auth::set('message', 'content', "Utilisateur supprimé");

        header('Location: index.php?action=users');
        exit();
    }
}
