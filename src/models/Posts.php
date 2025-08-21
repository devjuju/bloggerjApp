<?php

namespace App\Models;

use App\Models\Model;

/**
 * Classe représentant un article de blog.
 *
 * Cette classe mappe les colonnes de la table `posts` 
 * et fournit des getters/setters pour manipuler les données.
 */
class Posts extends Model
{
    /** Identifiant unique du post */
    protected int|string|null $id = null;

    /** Identifiant de l’utilisateur auteur */
    protected int|string|null $users_id = null;

    /** Nom de l’auteur */
    protected ?string $author = null;

    /** Titre de l’article */
    protected ?string $title = null;

    /** Catégorie de l’article */
    protected ?string $category = null;

    /** Extrait (résumé du contenu) */
    protected ?string $excerpt = null;

    /** Contenu complet de l’article */
    protected ?string $content = null;

    /** Nom/chemin de l’image associée */
    protected ?string $image = null;

    /** Date de création */
    protected ?string $created_at = null;

    /** Date de dernière modification */
    protected ?string $updated_at = null;

    /** État actif/inactif (1, 0 ou null) */
    protected int|bool|null $active = null;

    /** Statut de l’article (ex: 'draft', 'published') */
    protected ?string $status = null;

    /**
     * Constructeur
     *
     * @param array|null $data Données initiales pour hydrater l'objet
     */
    public function __construct(?array $data = null)
    {
        $this->table = 'posts';

        $this->setId($data['id'] ?? null);
        $this->setUsersId($data['users_id'] ?? null);
        $this->setAuthor($data['author'] ?? null);
        $this->setTitle($data['title'] ?? null);
        $this->setCategory($data['category'] ?? null);
        $this->setExcerpt($data['excerpt'] ?? null);
        $this->setContent($data['content'] ?? null);
        $this->setImage($data['image'] ?? null);
        $this->setCreatedAt($data['created_at'] ?? null);
        $this->setUpdatedAt($data['updated_at'] ?? null);
        $this->setActive($data['active'] ?? null);
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

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): void
    {
        $this->category = $category;
    }

    public function getExcerpt(): ?string
    {
        return $this->excerpt;
    }

    public function setExcerpt(?string $excerpt): void
    {
        $this->excerpt = $excerpt;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function setCreatedAt(?string $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?string $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    public function getActive(): int|bool|null
    {
        return $this->active;
    }

    public function setActive(int|bool|null $active): void
    {
        $this->active = $active;
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
