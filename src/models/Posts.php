<?php

namespace App\Model;

class Posts extends Model
{
    protected int|string|null $id = null;
    protected int|string|null $users_id = null;
    protected ?string $author = null;
    protected ?string $title = null;
    protected ?string $category = null;
    protected ?string $excerpt = null;
    protected ?string $content = null;
    protected ?string $image = null;
    protected ?string $created_at = null;
    protected int|bool|null $active = null;
    protected ?string $status = null;

    /**
     * @param array|null $data
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
