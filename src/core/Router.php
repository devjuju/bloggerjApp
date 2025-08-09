<?php

namespace App\Core;

use App\Controllers\CommentsController;
use App\Controllers\ContactController;

use App\Controllers\DashboardController;
use App\Controllers\HomeController;
use App\Controllers\PostsController;
use App\Controllers\UsersController;
use App\Core\Request;

class Router
{
    protected $routes;
    public function run(): void
    {

        $request = new Request();
        try {
            if ($request->get('action')) {

                $routes = $request->get('action');
                switch ($routes) {

                    case 'contact':
                        $contact = new ContactController;
                        $contact->contact();
                        break;

                    case 'blog':
                        $blog = new PostsController();
                        $blog->blog();
                        break;

                    case 'post':
                        $post = new PostsController();
                        $post->post($request->get('id'));
                        break;


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










                    case 'account':
                        $account = new UsersController;
                        $account->account();
                        break;

                    case 'account_settings':
                        $accountSettings = new UsersController;
                        $accountSettings->accountSettings($request->get('id'));
                        break;


                    case 'account_profil':
                        $accountProfil = new UsersController;
                        $accountProfil->accountProfil($request->get('id'));
                        break;


                    case 'account_security':
                        $accountSecurity = new UsersController;
                        $accountSecurity->accountSecurity($request->get('id'));
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
                        $updateUser = new UsersController();
                        $updateUser->update($request->get('id'));
                        break;

                    case 'update_user_infos':
                        $updateUser = new UsersController();
                        $updateUser->update_user_infos($request->get('id'));
                        break;


                    case 'update_user_pass':
                        $updateUser = new UsersController();
                        $updateUser->update_user_pass($request->get('id'));
                        break;


                    case 'update_user_avatar':
                        $updateUser = new UsersController();
                        $updateUser->update_user_avatar($request->get('id'));
                        break;


                    case 'change_role_user':
                        $changeRoleUser = new UsersController();
                        $changeRoleUser->changeRoleUser($request->get('id'));
                        break;

                    case 'change_role_admin':
                        $changeRoleUser = new UsersController();
                        $changeRoleUser->changeRoleAdmin($request->get('id'));
                        break;


                    case 'delete_user':
                        $deleteUser = new UsersController();
                        $deleteUser->delete($request->get('id'));
                        break;


                    case 'dashboard':
                        $account = new DashboardController;
                        $account->dashboard();
                        break;


                    case 'home':
                        $home = new HomeController();
                        $home->home();
                        break;

                    default:
                        break;
                }
            } else {
                $home = new HomeController();
                $home->home();
            }
        } catch (\Exception $ex) {
            $code = $ex->getCode();
            $message = $ex->getMessage();
            $file = $ex->getFile();
            $line = $ex->getLine();

            require('../templates/error.php');
        }
    }
}
