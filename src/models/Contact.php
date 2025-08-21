<?php

namespace App\Models;

/**
 * Représente un message de contact envoyé via le formulaire.
 */
class Contact
{
    /** Nom de famille */
    public string $lastname;

    /** Prénom */
    public string $firstname;

    /** Adresse email */
    public string $email;

    /** Sujet du message */
    public string $subject;

    /** Contenu du message */
    public string $message;

    /**
     * Hydrate un objet Contact à partir des données du formulaire.
     *
     * @param array $data Données du formulaire (lastname, firstname, email, sujet, message)
     */
    public function __construct($data)
    {

        $this->setLastname($data['lastname']);
        $this->setFirstname($data['firstname']);
        $this->setSubject($data['subject']);
        $this->setEmail($data['email']);
        $this->setMessage($data['message']);
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }
    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }
    public function getSubject(): string
    {
        return $this->subject;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
    public function getMessage(): string
    {
        return $this->message;
    }
}
