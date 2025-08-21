<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Users;
use App\Core\Auth;
use App\Forms\FormUser;

/**
 * Contrôleur UsersController
 * 
 * Gère l’inscription, la connexion et la gestion des utilisateurs.
 * Séparé en deux parties :
 * - Frontend : register, login, logout
 * - Backend : gestion CRUD des utilisateurs
 */
class UsersController
{

    /* ====================== FRONTEND ====================== */

    /**
     * Inscription d’un nouvel utilisateur
     *
     * - Validation du formulaire
     * - Upload d’image de profil
     * - Hashage du mot de passe
     * - Création du compte en base
     */
    public function register(): void
    {
        $request = new Request();
        $submit = $request->post('register');
        if (isset($submit)) {
            $register = new Users($request->post('register'));
            $formRegister = new FormUser($register);
            $controle = $formRegister->validateRegister();

            if ($controle === true) {

                // Gestion de l’upload image
                $img_name = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Enregistrement utilisateur
                $register->setImage($new_img_name);
                $register->setRole('utilisateur');
                $register->setStatus('1');
                $register->setPassword(password_hash($register->getPassword(), PASSWORD_BCRYPT));

                $register->create();

                Auth::set('message', 'class', 'success');
                Auth::set('message', 'content', "Compte crée");

                header('Location: index.php');
            }
        }

        require('../templates/frontend/register/index.php');
    }

    /**
     * Connexion utilisateur
     *
     * - Validation du formulaire
     * - Vérification email + mot de passe
     * - Stockage des infos utilisateur dans la session
     */
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
                if ($user) {
                    if (password_verify($login->getPassword(), $user->password)) {
                        if ($user->status == '1') {
                            // Stockage des infos utilisateur dans la session
                            Auth::set('auth', 'id', $user->id);
                            Auth::set('auth', 'role', $user->role);
                            Auth::set('auth', 'image', $user->image);
                            Auth::set('auth', 'lastname', $user->lastname);
                            Auth::set('auth', 'firstname', $user->firstname);
                            Auth::set('auth', 'email', $user->email);
                            Auth::set('auth', 'username', $user->username);

                            // Message qui s'affiche en cas de succès
                            Auth::set('message', 'class', 'success');
                            Auth::set('message', 'content', "Vous êtes connecté");

                            // Redirection selon le rôle
                            if (Auth::get('auth', 'role') === 'administrateur') {
                                header('Location: index.php?action=dashboard');
                            } else {
                                header('Location: index.php');
                            }
                        } else {
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

    /**
     * Déconnexion (destruction de la session)
     */
    public function logout(): void
    {
        Auth::destroy(); //unset($_SESSION);  session_destroy();
        header('Location: index.php');
    }

    /* ====================== BACKEND ====================== */

    /**
     * Liste les utilisateurs (réservé admin)
     */
    public function users(): void
    {
        if (Auth::get('auth', 'role') != 'administrateur' && Auth::get('auth', 'role') != 'master administrateur') {
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

        $users = $userModel->findBy([
            'role' => "utilisateur"
        ]);

        require('../templates/backend/users/index.php');
    }


    /**
     * Création d’un utilisateur (réservé admin)
     */
    public function create(): void
    {
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }
        $request = new Request();
        $submit = $request->post('create_user');
        if (isset($submit)) {
            $createUser = new Users($request->post('create_user'));
            $formCreateUser = new FormUser($createUser);
            $controle = $formCreateUser->validateCreate();
            if ($controle === true) {

                // Upload image
                $img_name = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                $createUser->setImage($new_img_name);
                $createUser->setStatus('1');

                $createUser->setPassword(password_hash($createUser->getPassword(), PASSWORD_BCRYPT));

                $createUser->create();

                Auth::set('message', 'class', 'success');
                Auth::set('message', 'content', "Utilisateur ajouté");

                header('Location: index.php?action=users');
            }
        }

        require('../templates/backend/createuser/index.php');
    }

    /**
     * Mise à jour d’un utilisateur (réservé admin)
     *
     * @param int $id ID de l’utilisateur à modifier
     */
    public function update(int $id): void
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
            $formUpdateUser = new FormUser($updateUser);
            $controle = $formUpdateUser->validateUpdate();

            if ($controle === true) {

                $updateUser->setId($user->id);
                $updateUser->update();

                Auth::set('message', 'class', 'success');
                Auth::set('message', 'content', "Utilisateur modifié");
                header('Location: index.php?action=users');
                exit();
            }
        }
        require('../templates/backend/updateuser/index.php');
    }

    /**
     * Suppression d’un utilisateur (réservé admin)
     *
     * @param int $id ID de l’utilisateur à supprimer
     */
    public function delete(int $id): void
    {
        // Sécurité
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }

        $user = new Users();
        $user->delete($id);

        Auth::set('message', 'class', 'success');
        Auth::set('message', 'content', "Utilisateur supprimé");

        header('Location: index.php?action=users');
        exit();
    }
}
