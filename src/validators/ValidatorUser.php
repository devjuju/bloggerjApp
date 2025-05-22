<?php

namespace App\Validators;

use App\Core\Validator;

class ValidatorUser extends Validator
{
    public object $data;

    public function __construct(object $data)
    {
        $this->data = $data;
    }

    // Typage de la méthode pour retourner un tableau d'erreurs ou un booléen
    public function checkDataLogin(): array|bool
    {
        $resultEmail = $this->checkEmail($this->data->getEmail());
        $resultPassword = $this->checkPassword($this->data->getPassword());


        if ($resultEmail === true && $resultPassword === true) {
            return true;
        } else {
            return [
                'email' => $resultEmail,
                'password' => $resultPassword,
            ];
        }
    }


    public function checkDataRegister(): bool|array
    {
        $resultUsername = $this->checkUsername($this->data->getUsername());
        $resultLastname = $this->checkLastname($this->data->getLastName());
        $resultFirstname = $this->checkFirstname($this->data->getFirstname());
        $resultEmail = $this->checkEmail($this->data->getEmail());
        $resultPassword = $this->checkPassword($this->data->getPassword());
        $resultImage = $this->checkImage($this->data->getImage());

        if ($resultUsername === true && $resultLastname === true && $resultFirstname === true && $resultEmail === true && $resultPassword === true && $resultImage === true) {
            return true;
        } else {
            return [
                'username' => $resultUsername,
                'lastname' => $resultLastname,
                'firstname' => $resultFirstname,
                'email' => $resultEmail,
                'password' => $resultPassword,
                'image' => $resultImage,
            ];
        }
    }

    public function checkDataCreate(): bool|array
    {
        $resultRole = $this->checkRole($this->data->getRole());
        $resultUsername = $this->checkUsername($this->data->getUsername());
        $resultLastname = $this->checkLastname($this->data->getLastName());
        $resultFirstname = $this->checkFirstname($this->data->getFirstname());
        $resultEmail = $this->checkEmail($this->data->getEmail());
        $resultPassword = $this->checkPassword($this->data->getPassword());
        $resultImage = $this->checkImage($this->data->getImage());

        if ($resultRole === true && $resultUsername === true && $resultLastname === true && $resultFirstname === true && $resultEmail === true && $resultPassword === true && $resultImage === true) {
            return true;
        } else {
            return [
                'role' => $resultRole,
                'username' => $resultUsername,
                'lastname' => $resultLastname,
                'firstname' => $resultFirstname,
                'email' => $resultEmail,
                'password' => $resultPassword,
                'image' => $resultImage,
            ];
        }
    }

    public function checkDataUpdate(): bool|array
    {
        $resultRole = $this->checkRole($this->data->getRole());
        $resultUsername = $this->checkUsername($this->data->getUsername());
        $resultLastname = $this->checkLastname($this->data->getLastName());
        $resultFirstname = $this->checkFirstname($this->data->getFirstname());
        $resultEmail = $this->checkEmail($this->data->getEmail());
        $resultPassword = $this->checkPassword($this->data->getPassword());

        $resultImage = !empty($_FILES["image"]) ? null : $this->checkImage($this->data->getImage());

        if ($resultRole === true && $resultUsername === true && $resultLastname === true && $resultFirstname === true && $resultEmail === true && $resultPassword === true) {
            return true;
        } else {
            return [
                'role' => $resultRole,
                'username' => $resultUsername,
                'lastname' => $resultLastname,
                'firstname' => $resultFirstname,
                'email' => $resultEmail,
                'password' => $resultPassword,
                'image' => $resultImage,
            ];
        }
    }

    public function checkDataUpdateImage(): bool|array
    {
        $resultImage = $this->checkImage($this->data->getImage());

        if ($resultImage === true) {
            echo 'ok';
            return true;
        } else {
            return [
                'image' => $resultImage,
            ];
        }
    }

    public function checkRole(string $role): string|bool
    {
        if (empty($role)) {
            return "Choisir le role de l'utilisateur";
        } else {
            return true;
        }
    }

    public function checkUsername(string $username): string|bool
    {
        if (empty($username)) {
            return "Entrer le pseudo";
        } elseif ($this->isSmallerThan($username, 5)) {
            return "c'est plus petit que 5 caractères";
        } else {
            return true;
        }
    }

    public function checkLastname(string $lastname): string|bool
    {
        if (empty($lastname)) {
            return "Entrer le nom";
        } elseif ($this->isSmallerThan($lastname, 5)) {
            return "c'est plus petit que 5 caractères";
        } elseif ($this->isPatternInvalid($lastname)) {
            return "Le nom doit contenir seulement des caractères";
        } else {
            return true;
        }
    }

    public function checkFirstname(string $firstname): string|bool
    {
        if (empty($firstname)) {
            return "Entrer le prénom";
        } elseif ($this->isSmallerThan($firstname, 5)) {
            return "c'est plus petit que 5 caractères";
        } elseif ($this->isPatternInvalid($firstname)) {
            return "Le prénom doit contenir seulement des caractères";
        } else {
            return true;
        }
    }

    public function checkEmail(string $email): string|bool
    {
        if (empty($email)) {
            return "Entrer une adresse email ";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Adresse email invalide";
        } else {
            return true;
        }
    }

    public function checkPassword(string $password): string|bool
    {
        if (empty($password)) {
            return "Entrer le mot de passe ";
        } elseif ($this->isSmallerThan($password, 10)) {
            return "10 caractères minimum";
        } else {
            return true;
        }
    }

    public function checkImage($image): string|bool
    {
        $target_dir = "uploads/";
        $image = $target_dir . basename($_FILES["image"]["name"]);
        $img_ex = pathinfo($image, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = ["jpg", "jpeg", "png"];
        $img_size = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];

        if ($error === 4) {
            return "Choisir une photo de profil";
        } elseif ($error === 0) {
            if ($img_size > 500000) {
                return "Désolé, votre fichier est trop volumineux.";
            } elseif (!in_array($img_ex_lc, $allowed_exs)) {
                return "Désolé, seuls les fichiers JPG, JPEG, et PNG sont autorisés.";
            } else {
                return true;
            }
        } else {
            return "erreur lors de l'upload du fichier";
        }
    }
}
