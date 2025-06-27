<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Forms\FormComment;
use App\Forms\FormPost;
use App\Models\Comments;
use App\Core\Request;
use App\Models\Posts;


class PostsController
{
    /* frontend */

    public function blog(): void
    {
        // On instancie le modèle correspondant à la table 'posts'
        $post = new Posts();
        // On va chercher toutes les posts actifs
        $posts = $post->findBy(['active' => '1']);
        require('../templates/frontend/blog/index.php');
    }

    public function post(int $id): void
    {
        // On instancie le modèle
        $postModel = new Posts();

        // On va chercher 1 post
        $post = $postModel->find($id);


        $relatedPost = new Posts();
        $relatedPosts = $relatedPost->findBy([
            'active' => 1,

        ]);

        // les commentaires du post

        $commentsModels = new Comments();
        $comments = $commentsModels->findBy([
            'posts_id' => $id,
            'is_valid' => 1,

        ]);

        // Ajouter un commentaire
        $author = Auth::get('auth', 'username');
        $users_id = Auth::get('auth', 'id');
        $avatar = Auth::get('auth', 'image');




        $request = new Request;
        $submit = $request->post('add_comment');
        if (isset($submit)) {
            $addComment = new Comments($request->post('add_comment'));
            $formAddComment = new FormComment($addComment);
            $controle = $formAddComment->validate();

            var_dump($controle);
            if ($controle === true) {

                $addComment->setUsersId($users_id);
                $addComment->setAvatar($avatar);
                $addComment->setAuthor($author);
                $addComment->setTitle($post->title);

                $addComment->setStatus('en cours de validation');
                $addComment->setIsValid('0');
                $addComment->create();
            }
        }
        require('../templates/frontend/post/index.php');
    }




    /* Backend */

    public function posts(): void
    {

        // Sécurité
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }

        $post = new Posts();
        $posts = $post->findAll();

        require('../templates/backend/posts/index.php');
    }


    public function create(): void
    {
        // Sécurité
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }

        $request = new Request();
        $submit = $request->post('create_post');
        if (isset($submit)) {
            // test image
            $createPost = new Posts($request->post('create_post'));
            $formCreatePost = new FormPost($createPost);
            $controle = $formCreatePost->validate();

            //echo '</pre>';
            //print_r($_FILES);
            //die;
            if ($controle === true) {


                $username = Auth::get('auth', 'username');
                $users_id = Auth::get('auth', 'id');


                // ajouter l'image
                $img_name = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);


                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                $createPost->setImage($new_img_name);


                $createPost->setUsersId($users_id);
                $createPost->setAuthor($username);
                $createPost->setStatus('Publié');
                $createPost->setActive('1');
                $createPost->create();


                Auth::set('message', 'class', 'success');
                Auth::set('message', 'content', "Article ajouté");

                header('Location: index.php?action=posts');
                exit();
            }
        }

        require('../templates/backend/createpost/index.php');
    }

    public function update(int $id): void
    {
        // Sécurité
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }

        $posts = new Posts();
        $post = $posts->find($id);

        $request = new Request();
        $submit = $request->post('update_post');

        if (isset($submit)) {

            $updatePost = new Posts($request->post('update_post'));

            $formUpdatePost = new FormPost($updatePost);
            $controle = $formUpdatePost->validate2();

            if ($controle === true) {

                $updatePost->setId($post->id);

                $updatePost->update();

                Auth::set('message', 'class', 'success');
                Auth::set('message', 'content', "Article modifié");
                header('Location: index.php?action=posts');
                exit();
            }
        }


        require('../templates/backend/updatepost/index.php');
    }


    public function update_image_post(int $id): void
    {

        // Sécurité
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }

        // On instancie le modèle
        $postModel = new Posts();
        // On va chercher 1 annonce
        $post = $postModel->find($id);
        $request = new Request();
        $submit = $request->post('update_image_post');
        if (isset($submit)) {

            $updateImagePost = new Posts();
            $formCreatePost = new FormPost($updateImagePost);
            $controle = $formCreatePost->validate3();
            //  echo '<pre>';

            // nouveau post vide
            // print_r($updateImagePost);

            // article complet en cours de modification (original sans modif d'image)
            // print_r($post);

            // image uploadé
            // print_r($_FILES);
            // die;
            if ($controle === true) {

                if (unlink("uploads/$post->image")) {
                    $img_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);



                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'uploads/' . $new_img_name;



                    move_uploaded_file($tmp_name, $img_upload_path);
                }
                // Insert into Database
                $updateImagePost->setImage($new_img_name);
                $updateImagePost->setId($post->id);
                $updateImagePost->update();

                Auth::set('message', 'class', 'success');
                Auth::set('message', 'content', "Image modifiée");

                header('Location: index.php?action=posts');
                exit();
            }
        }

        require('../templates/backend/updateimagepost/index.php');
    }


    public function activate(int $id): void
    {
        // Sécurité
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }

        $post = new Posts();
        $post->setId($id);
        $post->setStatus('Publié');
        $post->setActive(1);

        $post->update();

        Auth::set('message', 'class', 'success');
        Auth::set('message', 'content', "Article activé");

        header('Location: index.php?action=posts');
        exit();
    }

    public function desactivate(int $id): void
    {
        // Sécurité
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }

        $post = new Posts();
        $post->setId($id);
        $post->setStatus('Désactivé');
        $post->setActive(0);

        $post->update();

        Auth::set('message', 'class', 'success');
        Auth::set('message', 'content', "Article désactivé");

        header('Location: index.php?action=posts');
    }

    public function delete(int $id): void
    {
        // Sécurité
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }

        // On instancie le modèle
        $post = new Posts();
        // On va chercher 1 annonce
        $post->delete($id);

        Auth::set('message', 'class', 'success');
        Auth::set('message', 'content', "Article supprimé");

        header('Location: index.php?action=posts');
        exit();
    }
}
