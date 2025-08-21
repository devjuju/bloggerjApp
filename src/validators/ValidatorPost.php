<?php

namespace App\Validators;

use App\Core\Validator;

/**
 * Classe ValidatorPost
 *
 * Valide les données liées aux articles (posts) :
 * - création
 * - mise à jour
 * - mise à jour uniquement de l'image
 */
class ValidatorPost extends Validator
{
    /**
     * Données du post à valider
     */
    public object $data;

    /**
     * Constructeur : initialise avec les données du post.
     *
     * @param object $data Objet contenant les getters (title, content, etc.)
     */
    public function __construct(object $data)
    {
        $this->data = $data;
    }


    /**
     * Vérifie les données lors de la création d’un article.
     *
     * @return true|array True si tout est valide, sinon un tableau d'erreurs.
     */
    public function checkDataCreate(): true|array
    {
        $resultTitle = $this->checkTitle($this->data->getTitle());
        $resultCategory = $this->checkCategory($this->data->getCategory());
        $resultExcerpt = $this->checkExcerpt($this->data->getExcerpt());
        $resultContent = $this->checkContent($this->data->getContent());
        $resultImage = $this->checkImage($this->data->getImage());

        if (
            $resultTitle === true &&
            $resultCategory === true &&
            $resultExcerpt === true &&
            $resultContent === true &&
            $resultImage === true
        ) {
            return true;
        }

        return [
            'title' => $resultTitle,
            'category' => $resultCategory,
            'excerpt' => $resultExcerpt,
            'content' => $resultContent,
            'image' => $resultImage,
        ];
    }

    /**
     * Vérifie les données lors de la mise à jour d’un article.
     *
     * ⚠️ L’image est optionnelle (ne doit pas bloquer si non changée).
     *
     * @return true|array
     */
    public function checkDataUpdate(): true|array
    {
        $resultTitle = $this->checkTitle($this->data->getTitle());
        $resultCategory = $this->checkCategory($this->data->getCategory());
        $resultExcerpt = $this->checkExcerpt($this->data->getExcerpt());
        $resultContent = $this->checkContent($this->data->getContent());

        $resultImage = true;

        if (isset($_FILES["image"])) {
            $resultImage = $this->checkImage($this->data->getImage());
        }

        if (
            $resultTitle === true &&
            $resultCategory === true &&
            $resultExcerpt === true &&
            $resultContent === true
        ) {
            return true;
        }

        return [
            'title' => $resultTitle,
            'category' => $resultCategory,
            'excerpt' => $resultExcerpt,
            'content' => $resultContent,
            'image' => $resultImage,
        ];
    }

    /**
     * Vérifie uniquement l’image (cas mise à jour de l’image d’un article).
     *
     * @return true|array
     */
    public function checkDataUpdateImage(): true|array
    {
        $resultImage = $this->checkImage($this->data->getImage());

        if ($resultImage === true) {
            return true;
        }

        return [
            'image' => $resultImage,
        ];
    }

    /** Vérifie le titre (obligatoire, min 5 caractères). */
    public function checkTitle(?string $title): true|string
    {
        if (empty($title)) {
            return "Veuillez entrer un titre.";
        } elseif ($this->isSmallerThan($title, 5)) {
            return "Le titre doit contenir au moins 5 caractères.";
        }

        return true;
    }

    /** Vérifie la catégorie (obligatoire). */
    public function checkCategory(?string $category): true|string
    {
        return empty($category) ? "Veuillez choisir la catégorie" : true;
    }

    /** Vérifie l'extrait (obligatoire, min 10 caractères). */
    public function checkExcerpt(?string $excerpt): true|string
    {
        if (empty($excerpt)) {
            return "Veuillez entrer un extrait.";
        } elseif ($this->isSmallerThan($excerpt, 10)) {
            return "L'extrait doit contenir au moins 10 caractères.";
        }

        return true;
    }

    /** Vérifie le contenu (obligatoire, min 15 caractères). */
    public function checkContent(?string $content): true|string
    {
        if (empty($content)) {
            return "Veuillez entrer une description.";
        } elseif ($this->isSmallerThan($content, 15)) {
            return "La description doit contenir au moins 15 caractères.";
        }

        return true;
    }

    /**
     * Vérifie une image uploadée :
     * - doit exister
     * - taille <= 500Ko
     * - extension parmi JPG/JPEG/PNG
     *
     * @param mixed $image Nom ou chemin (mais $_FILES est vérifié directement)
     * @return true|string
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
