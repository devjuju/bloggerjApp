<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Forms\FormComment;
use App\Forms\FormPost;
use App\Models\Comments;
use App\Core\Request;
use App\Models\Posts;

/**
 * Contrôleur PostsController
 * 
 * Gère l'affichage d'un post, des posts'.
 * Séparé en deux parties :
 * - Frontend : blog, posts triés par catégorie, page d'un post et des commentaires validés
 * - Backend : gestion CRUD des posts
 */
class PostsController
{
    /* ====================== FRONTEND ====================== */

    /**
     * Affiche tous les articles publiés (blog général).
     */
    public function blog(): void
    {
        // Récupérer les articles actifs
        $post = new Posts();
        $posts = $post->findBy(['active' => '1']);
        require('../templates/frontend/blog/index.php');
    }

    /**
     * Affiche les articles de la catégorie "Développement de sites web".
     */
    public function blogPostsWeb(): void
    {
        $post = new Posts();
        $posts = $post->findBy([
            'active' => 1,
            'category' => "Développement de sites web"
        ]);
        require('../templates/frontend/blogpostsweb/index.php');
    }

    /**
     * Affiche les articles de la catégorie "Développement d'applications web".
     */
    public function blogPostsApps(): void
    {
        $post = new Posts();
        $posts = $post->findBy([
            'active' => 1,
            'category' => "Développement d'applications web"
        ]);
        require('../templates/frontend/blogpostsapps/index.php');
    }

    /**
     * Affiche le détail d’un article et gère l’ajout de commentaires.
     *
     * @param int $id  Identifiant de l’article
     */
    public function post(int $id): void
    {
        // Récupérer l'article
        $postModel = new Posts();
        $post = $postModel->find($id);

        // Récupérer d'autres articles pour suggestions
        $relatedPost = new Posts();
        $relatedPosts = $relatedPost->findBy([
            'active' => 1,

        ]);

        // Récupérer les commentaires validés liés à l’article
        $commentsModels = new Comments();
        $comments = $commentsModels->findBy([
            'posts_id' => $id,
            'is_valid' => 1,
        ]);

        // Récupérer les infos de l’utilisateur connecté
        $author = Auth::get('auth', 'username');
        $users_id = Auth::get('auth', 'id');
        $avatar = Auth::get('auth', 'image');
        $email = Auth::get('auth', 'email');

        $title = $post->title;

        // Gestion du formulaire d’ajout de commentaire
        $request = new Request;
        $submit = $request->post('add_comment');
        if (isset($submit)) {
            $addComment = new Comments($request->post('add_comment'));
            $formAddComment = new FormComment($addComment);
            $controle = $formAddComment->validate();
            if ($controle === true) {
                // Remplir les infos automatiques du commentaire
                $addComment->setUsersId($users_id);
                $addComment->setAvatar($avatar);
                $addComment->setAuthor($author);
                $addComment->setEmail($email);
                $addComment->setTitle($title);

                $addComment->setStatus('en cours de validation');
                $addComment->setIsValid('0');

                // Enregistrer en BDD
                $addComment->create();

                // Message de succès
                Auth::set('message', 'class', 'success');
                Auth::set('message', 'content', "Commentaire ajouté et en cours de validation");

                header('Location: index.php');
                exit();
            }
        }
        require('../templates/frontend/post/index.php');
    }

    /* ====================== BACKEND ====================== */

    /**
     * Affiche tous les articles (partie admin).
     */
    public function posts(): void
    {
        // Vérification du rôle (sécurité)
        if (Auth::get('auth', 'role') != 'administrateur' && Auth::get('auth', 'role') != 'master administrateur') {
            header('Location: index.php');
            return;
        }

        $post = new Posts();
        $posts = $post->findAll();

        require('../templates/backend/posts/index.php');
    }

    /**
     * Création d’un nouvel article (formulaire admin).
     */
    public function create(): void
    {
        // Vérification du rôle
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }

        $request = new Request();
        $submit = $request->post('create_post');
        if (isset($submit)) {

            $createPost = new Posts($request->post('create_post'));
            $formCreatePost = new FormPost($createPost);
            $controle = $formCreatePost->validateCreate();

            if ($controle === true) {

                // Infos auteur
                $username = Auth::get('auth', 'username');
                $users_id = Auth::get('auth', 'id');

                // Upload de l’image
                $img_name = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Sauvegarde article
                $createPost->setImage($new_img_name);
                $createPost->setUsersId($users_id);
                $createPost->setAuthor($username);
                $createPost->setUpdatedAt(date("Y-m-d H:i:s"));
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

    /**
     * Mise à jour d’un article existant.
     *
     * @param int $id Identifiant de l’article
     */
    public function update(int $id): void
    {
        // Vérification du rôle
        if (Auth::get('auth', 'role') != 'administrateur' && Auth::get('auth', 'role') != 'master administrateur') {
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
            $controle = $formUpdatePost->validateUpdate();

            if ($controle === true) {

                $updatePost->setUpdatedAt(date("Y-m-d H:i:s"));

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

    /**
     * Mise à jour de l’image d’un article.
     *
     * @param int $id Identifiant de l’article
     */
    public function update_image_post(int $id): void
    {
        // Vérification du rôle
        if (Auth::get('auth', 'role') != 'administrateur' && Auth::get('auth', 'role') != 'master administrateur') {
            header('Location: index.php');
            return;
        }

        $postModel = new Posts();
        $post = $postModel->find($id);
        $request = new Request();
        $submit = $request->post('update_image_post');
        if (isset($submit)) {

            $updateImagePost = new Posts();
            $formCreatePost = new FormPost($updateImagePost);
            $controle = $formCreatePost->validateUpdateImage();

            if ($controle === true) {
                // Supprimer l’ancienne image et uploader la nouvelle
                if (unlink("uploads/$post->image")) {
                    $img_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);

                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'uploads/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                }
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

    /**
     * Active un article (rend visible).
     */
    public function activate(int $id): void
    {
        // Vérification du rôle
        if (Auth::get('auth', 'role') != 'administrateur' && Auth::get('auth', 'role') != 'master administrateur') {
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

    /**
     * Désactive un article (rend invisible).
     */
    public function desactivate(int $id): void
    {
        // Vérification du rôle
        if (Auth::get('auth', 'role') != 'administrateur' && Auth::get('auth', 'role') != 'master administrateur') {
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

    /**
     * Supprime définitivement un article.
     */
    public function delete(int $id): void
    {
        // Vérification du rôle (seul "administrateur" peut supprimer)
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }

        $post = new Posts();
        $post->delete($id);

        Auth::set('message', 'class', 'success');
        Auth::set('message', 'content', "Article supprimé");

        header('Location: index.php?action=posts');
        exit();
    }
}
