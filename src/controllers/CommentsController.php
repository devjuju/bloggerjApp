<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Models\Comments;

/**
 * Contrôleur CommentsController
 * 
 * Gère les actions liées aux commentaires :
 * - Affichage
 * - Suppression
 * - Validation
 * - Rejet
 */
class CommentsController
{
    /**
     * Affiche la liste de tous les commentaires
     *
     * @return void
     */
    public function comments(): void
    {
        // Vérification du rôle (seul "administrateur" peut supprimer)
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }

        $comment = new Comments();
        $comments = $comment->findAll();

        require('../templates/backend/comments/index.php');
    }

    /**
     * Supprime un commentaire par son identifiant
     *
     * @param int $id Identifiant du commentaire à supprimer
     * @return void
     */
    public function delete(int $id): void
    {
        // Vérification du rôle (seul "administrateur" peut supprimer)
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }

        $comment = new Comments();
        $comment->delete($id);

        Auth::set('message', 'class', 'success');
        Auth::set('message', 'content', "Commentaire supprimé");
        header('Location: index.php?action=comments');
        exit();
    }


    /**
     * Valide un commentaire (changement de statut et isValid=1)
     *
     * @param int $id Identifiant du commentaire à valider
     * @return void
     */
    public function validate(int $id): void
    {
        // Vérification du rôle (seul "administrateur" peut supprimer)
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }

        $comment = new Comments();
        $comment->setId($id);
        $comment->setStatus('approuvé');
        $comment->setIsValid(1);

        $comment->update();

        Auth::set('message', 'class', 'success');
        Auth::set('message', 'content', "Commentaire validé");
        header('Location: index.php?action=comments');
        exit();
    }


    /**
     * Rejette un commentaire (changement de statut et isValid=0)
     *
     * @param int $id Identifiant du commentaire à rejeter
     * @return void
     */
    public function reject(int $id): void
    {
        // Vérification du rôle (seul "administrateur" peut supprimer)
        if (Auth::get('auth', 'role') != 'administrateur') {
            header('Location: index.php');
            return;
        }

        $comment = new Comments();
        $comment->setId($id);
        $comment->setStatus('rejeté');
        $comment->setIsValid(0);

        $comment->update();

        Auth::set('message', 'class', 'success');
        Auth::set('message', 'content', "Commentaire rejeté");
        header('Location: index.php?action=comments');
        exit();
    }
}
