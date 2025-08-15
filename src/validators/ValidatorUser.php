<?php

namespace App\Validators;

use App\Core\Request;
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


        // Récupérer le champ confirm_password depuis le POST
        $request = new Request();
        $confirmPassword = $request->post('confirm_password');

        $resultConfirm = true;

        // Vérifie si les mots de passe correspondent
        if ($this->data->getPassword() !== $confirmPassword) {
            $resultConfirm = "Les mots de passe ne correspondent pas.";
        }



        if ($resultUsername === true && $resultLastname === true && $resultFirstname === true && $resultEmail === true && $resultPassword === true && $resultConfirm === true && $resultImage === true) {
            return true;
        } else {
            return [
                'username' => $resultUsername,
                'lastname' => $resultLastname,
                'firstname' => $resultFirstname,
                'email' => $resultEmail,
                'password' => $resultPassword,
                'confirm_password' => $resultConfirm,
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


        // Récupérer le champ confirm_password depuis le POST
        $request = new Request();
        $confirmPassword = $request->post('confirm_password');

        $resultConfirm = true;

        // Vérifie si les mots de passe correspondent
        if ($this->data->getPassword() !== $confirmPassword) {
            $resultConfirm = "Les mots de passe ne correspondent pas.";
        }



        if ($resultRole === true && $resultUsername === true && $resultLastname === true && $resultFirstname === true && $resultEmail === true && $resultPassword === true && $resultConfirm === true && $resultImage === true) {
            return true;
        } else {
            return [
                'role' => $resultRole,
                'username' => $resultUsername,
                'lastname' => $resultLastname,
                'firstname' => $resultFirstname,
                'email' => $resultEmail,
                'password' => $resultPassword,
                'confirm_password' => $resultConfirm,
                'image' => $resultImage,
            ];
        }
    }

    // transformer l'utilisateur en admin
    public function checkDataUpdate()
    {
        $resultRole = $this->checkRole($this->data->getRole());

        $resultImage = true;

        if (isset($_FILES["image"])) {
            $resultImage = $this->checkImage($this->data->getImage());
        }

        if ($resultRole === true) {
            return true;
        } else {
            return [
                'role' => $resultRole,
                'image' => $resultImage,
            ];
        }
    }

    // validations

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


    // Confirmer le mot de passe

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



    public function confirmField(string $field1, string $field2): string|bool
    {
        $request = new Request();
        $value1 = $request->post($field1);
        $value2 = $request->post($field2);

        if ($value1 !== $value2) {
            return "Les champs $field1 et $field2 ne correspondent pas.";
        }

        return true;
    }








    public function checkImage(mixed $image): true|string
    {

        $target_dir = "uploads/";
        $image = $target_dir . basename($_FILES["image"]["name"]);
        $img_ex = pathinfo($image, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = ["jpg", "jpeg", "png"];

        $img_size = $_FILES['image']['size'] ?? 0;
        $error = $_FILES['image']['error'] ?? 4;

        if ($error === 4) {
            return "Veillez choisir une image";
        } elseif ($error === 0) {
            if ($img_size > 500000) {
                return "Désolé, votre fichier est trop volumineux.";
            } elseif (!in_array($img_ex_lc, $allowed_exs)) {
                return "Désolé, seuls les fichiers JPG, JPEG, et PNG sont autorisés.";
            }

            return true;
        }

        return "erreur lors de l'upload du fichier";
    }
}
