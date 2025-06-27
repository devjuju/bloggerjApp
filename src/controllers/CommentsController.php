<?php

namespace App\Controllers;

use App\Models\Comments;

class CommentsController
{


    // Méthode pour afficher tous les commentaires
    public function comments(): void
    {
        $comment = new Comments();
        $comments = $comment->findAll();

        require('../templates/backend/comments/index.php');
    }




    // Méthode pour supprimer un commentaire
    public function delete(int $id): void
    {
        // On instancie le modèle
        $comment = new Comments();
        // On va chercher 1 commentaire et on le supprime
        $comment->delete($id);

        header('Location: index.php?action=comments');
    }


    // Méthode pour valider un commentaire
    public function validate(int $id): void
    {
        $comment = new Comments();
        $comment->setId($id);
        $comment->setStatus('approuvé');
        $comment->setIsValid(1);

        $comment->update();

        header('Location: index.php?action=comments');
    }


    // Méthode pour rejeter un commentaire
    public function reject(int $id): void
    {
        $comment = new Comments();
        $comment->setId($id);
        $comment->setStatus('rejeté');
        $comment->setIsValid(0);

        $comment->update();

        header('Location: index.php?action=comments');
    }
}
