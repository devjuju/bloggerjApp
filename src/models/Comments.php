<?php

namespace App\Models;

use App\Models\Model;

/**
 * Représente un commentaire d’un article (table `comments`).
 *
 * Cette classe contient les propriétés principales d’un commentaire,
 * ainsi que les getters et setters pour manipuler ses données.
 */
class Comments extends Model
{
    /** Identifiant unique du commentaire */
    protected int|string|null $id = null;

    /** Identifiant de l’utilisateur auteur (si connecté) */
    protected int|string|null $users_id = null;

    /** Identifiant du post associé */
    protected int|string|null $posts_id = null;

    /** Avatar de l’auteur (URL/chemin) */
    protected ?string $avatar = null;

    /** Nom de l’auteur */
    protected ?string $author = null;

    /** Email de l’auteur */
    protected ?string $email = null;

    /** Titre du commentaire */
    protected ?string $title = null;

    /** Contenu du commentaire */
    protected ?string $content = null;

    /** Date de création */
    protected ?string $created_at = null;

    /** Validation du commentaire (1, 0 ou null) */
    protected int|bool|null $is_valid = null;

    /** Statut du commentaire (ex: 'pending', 'approved') */
    protected ?string $status = null;

    /**
     * Hydrate un objet Comment à partir d’un tableau associatif.
     *
     * @param array|null $data Données initiales
     */
    public function __construct(?array $data = null)
    {
        $this->table = 'comments';

        $this->setId($data['id'] ?? null);
        $this->setUsersId($data['users_id'] ?? null);
        $this->setPostsId($data['posts_id'] ?? null);
        $this->setAvatar($data['avatar'] ?? null);
        $this->setAuthor($data['author'] ?? null);
        $this->setEmail($data['email'] ?? null);
        $this->setTitle($data['title'] ?? null);
        $this->setContent($data['content'] ?? null);
        $this->setCreatedAt($data['created_at'] ?? null);
        $this->setIsValid($data['is_valid'] ?? null);
        $this->setStatus($data['status'] ?? null);
    }

    public function getId(): int|string|null
    {
        return $this->id;
    }

    public function setId(int|string|null $id): void
    {
        $this->id = $id;
    }

    public function getUsersId(): int|string|null
    {
        return $this->users_id;
    }

    public function setUsersId(int|string|null $users_id): void
    {
        $this->users_id = $users_id;
    }

    public function getPostsId(): int|string|null
    {
        return $this->posts_id;
    }

    public function setPostsId(int|string|null $posts_id): void
    {
        $this->posts_id = $posts_id;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): void
    {
        $this->avatar = $avatar;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function setCreatedAt(?string $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getIsValid(): int|bool|null
    {
        return $this->is_valid;
    }

    public function setIsValid(int|bool|null $is_valid): void
    {
        $this->is_valid = $is_valid;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }
}
