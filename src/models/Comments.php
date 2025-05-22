<?php

namespace App\Model;

class Comments extends Model
{
    protected int|string|null $id = null;
    protected int|string|null $users_id = null;
    protected int|string|null $posts_id = null;
    protected ?string $author = null;
    protected ?string $content = null;
    protected ?string $created_at = null;
    protected int|bool|null $is_valid = null;
    protected ?string $status = null;

    public function __construct(?array $data = null)
    {
        $this->table = 'comments';

        $this->setId($data['id'] ?? null);
        $this->setUsersId($data['users_id'] ?? null);
        $this->setPostsId($data['posts_id'] ?? null);
        $this->setAuthor($data['author'] ?? null);
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

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): void
    {
        $this->author = $author;
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
