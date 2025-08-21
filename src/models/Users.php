<?php

namespace App\Models;

use App\Models\Model;

/**
 * Représente un utilisateur du site (table `users`).
 *
 * Contient les propriétés principales d’un utilisateur
 * ainsi que les méthodes d’accès et de recherche.
 */
class Users extends Model
{
    /** Identifiant unique de l’utilisateur */
    protected int|string|null $id = null;

    /** Rôle de l’utilisateur (ex: admin, user) */
    protected ?string $role = null;

    /** Image de profil (URL/chemin) */
    protected ?string $image = null;

    /** Nom d’utilisateur (login) */
    protected ?string $username = null;

    /** Nom de famille */
    protected ?string $lastname = null;

    /** Prénom */
    protected ?string $firstname = null;

    /** Adresse email */
    protected ?string $email = null;

    /** Mot de passe (haché) */
    protected ?string $password = null;

    /** Statut de l’utilisateur (ex: actif, suspendu) */
    protected ?string $status = null;

    /**
     * Hydrate un objet User à partir d’un tableau associatif.
     *
     * @param array|null $data Données initiales
     */
    public function __construct(?array $data = null)
    {
        $this->table = 'users';

        $this->setId($data['id'] ?? null);
        $this->setImage($data['image'] ?? null);
        $this->setUsername($data['username'] ?? null);
        $this->setLastname($data['lastname'] ?? null);
        $this->setFirstname($data['firstname'] ?? null);
        $this->setRole($data['role'] ?? null);
        $this->setPassword($data['password'] ?? null);
        $this->setEmail($data['email'] ?? null);
        $this->setStatus($data['status'] ?? null);
    }

    /**
     * Recherche un utilisateur par son email.
     *
     * @return object|null L’utilisateur trouvé ou null si aucun
     */
    public function findOneByEmail(): ?object
    {
        return $this->requete("SELECT * FROM {$this->table} WHERE email = ?", [$this->getEmail()])->fetch();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): void
    {
        $this->role = $role;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }
}
