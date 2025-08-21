<?php

namespace App\Validators;

use App\Core\Request;
use App\Core\Validator;

/**
 * Classe ValidatorUser
 *
 * Valide les données liées aux utilisateurs :
 * - login
 * - inscription
 * - création (par admin)
 * - mise à jour (par admin ou utilisateur)
 *
 * Hérite de la classe Validator (fonctions utilitaires de validation).
 */

class ValidatorUser extends Validator
{
    /**
     * Données de l'utilisateur à valider.
     * Généralement un DTO ou un objet User.
     */
    public object $data;

    /**
     * Constructeur : initialise le validateur avec les données utilisateur.
     *
     * @param object $data Objet contenant les getters (email, password, etc.)
     */
    public function __construct(object $data)
    {
        $this->data = $data;
    }

    /**
     * Vérifie les données de connexion (login).
     *
     * @return true|array Retourne true si valide, sinon un tableau d'erreurs.
     */
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

    /**
     * Vérifie les données lors de l'inscription d'un utilisateur.
     *
     * @return true|array Retourne true si valide, sinon un tableau d'erreurs.
     */
    public function checkDataRegister(): bool|array
    {
        $resultUsername = $this->checkUsername($this->data->getUsername());
        $resultLastname = $this->checkLastname($this->data->getLastName());
        $resultFirstname = $this->checkFirstname($this->data->getFirstname());
        $resultEmail = $this->checkEmail($this->data->getEmail());
        $resultPassword = $this->checkPassword($this->data->getPassword());
        $resultImage = $this->checkImage($this->data->getImage());

        // Vérification du champ confirm_password
        $request = new Request();
        $confirmPassword = $request->post('confirm_password');

        $resultConfirm = true;

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

    /**
     * Vérifie les données lors de la création d’un utilisateur (par admin).
     *
     * @return true|array Retourne true si valide, sinon un tableau d'erreurs.
     */
    public function checkDataCreate(): bool|array
    {
        $resultRole = $this->checkRole($this->data->getRole());
        $resultUsername = $this->checkUsername($this->data->getUsername());
        $resultLastname = $this->checkLastname($this->data->getLastName());
        $resultFirstname = $this->checkFirstname($this->data->getFirstname());
        $resultEmail = $this->checkEmail($this->data->getEmail());
        $resultPassword = $this->checkPassword($this->data->getPassword());
        $resultImage = $this->checkImage($this->data->getImage());

        // Vérification du champ confirm_password
        $request = new Request();
        $confirmPassword = $request->post('confirm_password');

        $resultConfirm = true;

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

    /**
     * Vérifie les données lors de la mise à jour (rôle, image).
     *
     * @return true|array Retourne true si valide, sinon un tableau d'erreurs.
     */
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

    /** Vérifie que le rôle est présent. */
    public function checkRole(string $role): string|bool
    {
        if (empty($role)) {
            return "Choisir le role de l'utilisateur";
        } else {
            return true;
        }
    }

    /** Vérifie que le pseudo est présent et >= 5 caractères. */
    public function checkUsername(string $username): string|bool
    {
        if (empty($username)) {
            return "Veuillez entrer un nom d'utilisateur.";
        } elseif ($this->isSmallerThan($username, 5)) {
            return "Le nom d'utilisateur doit contenir au moins 5 caractères.";
        } else {
            return true;
        }
    }

    /** Vérifie que le nom est présent, >= 5 caractères et uniquement alphabétique. */
    public function checkLastname(string $lastname): string|bool
    {
        if (empty($lastname)) {
            return "Veuillez entrer votre nom.";
        } elseif ($this->isSmallerThan($lastname, 5)) {
            return "Le nom doit contenir au moins 5 caractères.";
        } elseif ($this->isPatternInvalid($lastname)) {
            return "Le nom doit contenir seulement des caractères";
        } else {
            return true;
        }
    }

    /** Vérifie que le prénom est présent, >= 5 caractères et uniquement alphabétique. */
    public function checkFirstname(string $firstname): string|bool
    {
        if (empty($firstname)) {
            return "Veuillez entrer votre prénom.";
        } elseif ($this->isSmallerThan($firstname, 5)) {
            return "Le prénom doit contenir au moins 5 caractères.";
        } elseif ($this->isPatternInvalid($firstname)) {
            return "Le prénom doit contenir seulement des caractères";
        } else {
            return true;
        }
    }

    /** Vérifie la validité de l’adresse email. */
    public function checkEmail(string $email): string|bool
    {
        if (empty($email)) {
            return "Veuillez entrer une adresse e-mail. ";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Veuillez entrer une adresse e-mail valide.";
        } else {
            return true;
        }
    }

    /** Vérifie la validité du mot de passe (>= 10 caractères). */
    public function checkPassword(string $password): string|bool
    {
        if (empty($password)) {
            return "Veuillez entrer un mot de passe.";
        } elseif ($this->isSmallerThan($password, 10)) {
            return "Le mot de passe doit contenir au moins 10 caractères.";
        } else {
            return true;
        }
    }

    /**
     * Vérifie qu'une image uploadée est valide :
     * - taille <= 500Ko
     * - extension JPG/JPEG/PNG
     *
     * @param mixed $image Nom ou objet image (non utilisé directement car $_FILES est vérifié)
     * @return true|string True si valide, sinon message d’erreur
     */
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
            return "Veuillez choisir une image.";
        } elseif ($error === 0) {
            if ($img_size > 500000) {
                return "Le fichier est trop volumineux (max 500 Ko).";
            } elseif (!in_array($img_ex_lc, $allowed_exs)) {
                return "Le format de l'image est invalide (formats autorisés : JPG, JPEG, PNG).";
            }
            return true;
        }
        return "Une erreur est survenue lors du téléchargement de l'image.";
    }
}
