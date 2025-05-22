<?php

namespace App\Validators;

use App\Core\Validator;

class ValidatorPost extends Validator
{
    /**
     * @var object
     */
    public object $data;

    public function __construct(object $data)
    {
        $this->data = $data;
    }

    /**
     * @return true|array<string, string>
     */
    public function checkData(): true|array
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
     * @return true|array<string, string>
     */
    public function checkData2(): true|array
    {
        $resultTitle = $this->checkTitle($this->data->getTitle());
        $resultCategory = $this->checkCategory($this->data->getCategory());
        $resultExcerpt = $this->checkExcerpt($this->data->getExcerpt());
        $resultContent = $this->checkContent($this->data->getContent());

        $resultImage = true;
        if (!empty($_FILES["image"])) {
            // L'image est prise directement depuis $_FILES
        } else {
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
     * @return true|array<string, string>
     */
    public function checkData3(): true|array
    {
        $resultImage = $this->checkImage($this->data->getImage());

        if ($resultImage === true) {
            return true;
        }

        return [
            'image' => $resultImage,
        ];
    }

    /**
     * @param string|null $title
     * @return true|string
     */
    public function checkTitle(?string $title): true|string
    {
        if (empty($title)) {
            return "Entrer un titre";
        } elseif ($this->isSmallerThan($title, 5)) {
            return "5 caractères minimum";
        }

        return true;
    }

    /**
     * @param string|null $category
     * @return true|string
     */
    public function checkCategory(?string $category): true|string
    {
        return empty($category) ? "Veillez choisir une catégorie" : true;
    }

    /**
     * @param string|null $excerpt
     * @return true|string
     */
    public function checkExcerpt(?string $excerpt): true|string
    {
        if (empty($excerpt)) {
            return "Entrer un extrait";
        } elseif ($this->isSmallerThan($excerpt, 10)) {
            return "10 caractères minimum";
        }

        return true;
    }

    /**
     * @param string|null $content
     * @return true|string
     */
    public function checkContent(?string $content): true|string
    {
        if (empty($content)) {
            return "Entrer une description";
        } elseif ($this->isSmallerThan($content, 15)) {
            return "15 caractères minimum";
        }

        return true;
    }

    /**
     * @param mixed $image
     * @return true|string
     */
    public function checkImage(mixed $image): true|string
    {
        $target_dir = "uploads/";
        $imagePath = $target_dir . basename($_FILES["image"]["name"]);
        $img_ex = pathinfo($imagePath, PATHINFO_EXTENSION);
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
