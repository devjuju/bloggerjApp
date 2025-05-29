<?php

namespace App\Models;

class Contact
{
    public $lastname;
    public $firstname;
    public $email;
    public $subject;
    public $message;

    public function __construct($data)
    {

        $this->setLastname($data['lastname']);
        $this->setFirstname($data['firstname']);
        $this->setSubject($data['sujet']);
        $this->setEmail($data['email']);
        $this->setMessage($data['message']);
    }


    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }
    public function getLastname()
    {
        return $this->lastname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }
    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }
    public function getSubject()
    {
        return $this->subject;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }
    public function getMessage()
    {
        return $this->message;
    }
}
