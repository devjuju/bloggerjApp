<?php

namespace App\Core;

use App\Controllers\CommentsController;
use App\Controllers\ContactController;
use App\Controllers\DashboardController;
use App\Controllers\HomeController;
use App\Controllers\PostsController;
use App\Controllers\UsersController;
use App\Core\Request;

/**
 * Classe Router
 * 
 * Permet de gérer la navigation de l'application en fonction du paramètre "action"
 * passé dans l'URL (GET).
 * Chaque action correspond à une méthode d'un contrôleur spécifique.
 */
class Router
{
    /**
     * Exécute le routeur : lit l'action depuis la requête
     * et appelle le contrôleur/méthode correspondants.
     */
    public function run(): void
    {

        $request = new Request();
        try {
            if ($request->get('action')) {

                $routes = $request->get('action');
                switch ($routes) {

                    // ---- Pages publiques ----

                    case 'contact':
                        $contact = new ContactController;
                        $contact->contact();
                        break;

                    case 'blog':
                        $blog = new PostsController();
                        $blog->blog();
                        break;

                    case 'blog_posts_web':
                        $blog = new PostsController();
                        $blog->blogPostsWeb();
                        break;

                    case 'blog_posts_apps':
                        $blog = new PostsController();
                        $blog->blogPostsApps();
                        break;

                    case 'post':
                        $post = new PostsController();
                        $post->post($request->get('id'));
                        break;

                    case 'home':
                        $home = new HomeController();
                        $home->home();
                        break;

                    // ---- Gestion des articles ----

                    case 'posts':
                        $posts = new PostsController();
                        $posts->posts();
                        break;

                    case 'create_post':
                        $createPost = new PostsController();
                        $createPost->create();
                        break;

                    case 'update_image_post':
                        $updateImagePost = new PostsController();
                        $updateImagePost->update_image_post($request->get('id'));
                        break;

                    case 'update_post':
                        $updatePost = new PostsController();
                        $updatePost->update($request->get('id'));
                        break;

                    case 'delete_post':
                        $deletePost = new PostsController();
                        $deletePost->delete($request->get('id'));
                        break;

                    case 'active_post':
                        $activePost = new PostsController();
                        $activePost->activate($request->get('id'));
                        break;

                    case 'desactive_post':
                        $activePost = new PostsController();
                        $activePost->desactivate($request->get('id'));
                        break;

                    // ---- Gestion des commentaires ----

                    case 'comments':
                        $comments = new CommentsController();
                        $comments->comments();
                        break;

                    case 'delete_comment':
                        $comments = new CommentsController();
                        $comments->delete($request->get('id'));
                        break;

                    case 'validate_comment':
                        $validateComment = new CommentsController();
                        $validateComment->validate($request->get('id'));
                        break;

                    case 'reject_comment':
                        $rejectComment = new CommentsController();
                        $rejectComment->reject($request->get('id'));
                        break;

                    // ---- Gestion des utilisateurs ----

                    case 'register':
                        $home = new UsersController();
                        $home->register();
                        break;

                    case 'login':
                        $login = new UsersController();
                        $login->login();
                        break;

                    case 'logout':
                        $logout = new UsersController();
                        $logout->logout();
                        break;

                    case 'users':
                        $users = new UsersController();
                        $users->users();
                        break;

                    case 'create_user':
                        $createUser = new UsersController();
                        $createUser->create();
                        break;

                    case 'update_user':
                        $UpdateUser = new UsersController();
                        $UpdateUser->update($request->get('id'));
                        break;

                    case 'delete_user':
                        $deleteUser = new UsersController();
                        $deleteUser->delete($request->get('id'));
                        break;

                    // ---- Tableau de bord ----

                    case 'dashboard':
                        $account = new DashboardController;
                        $account->dashboard();
                        break;

                    default:
                        break;
                }
            } else {
                // Si aucune action, on affiche la page d'accueil
                $home = new HomeController();
                $home->home();
            }
        } catch (\Exception $ex) {
            // Gestion des erreurs : inclusion d'un template error.php
            $code = $ex->getCode();
            $message = $ex->getMessage();
            $file = $ex->getFile();
            $line = $ex->getLine();

            require('../templates/error.php');
        }
    }
}
