<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Classe Request
 * 
 * Cette classe encapsule les données des superglobales $_POST et $_GET
 * pour simplifier l'accès aux valeurs envoyées via HTTP.
 */
class Request
{
    /**
     * Tableau contenant les données POST
     * @var array
     */
    private array $_post;

    /**
     * Tableau contenant les données GET
     * @var array
     */
    private array $_get;

    /**
     * Constructeur
     * Initialise les tableaux $_post et $_get à partir des superglobales PHP
     */
    public function __construct()
    {
        $this->_post = $_POST;
        $this->_get = $_GET;
    }

    /**
     * Récupère une valeur spécifique de $_POST ou l'intégralité du tableau
     * 
     * @param string|null $key Clé spécifique à récupérer (optionnel)
     * @return mixed La valeur correspondante ou tout le tableau si la clé est nulle
     */
    public function post(?string $key = null): mixed
    {
        return $this->checkGlobal($this->_post, $key);
    }

    /**
     * Récupère une valeur spécifique de $_GET ou l'intégralité du tableau
     * 
     * @param string|null $key Clé spécifique à récupérer (optionnel)
     * @return mixed La valeur correspondante ou tout le tableau si la clé est nulle
     */
    public function get(?string $key = null): mixed
    {
        return $this->checkGlobal($this->_get, $key);
    }

    /**
     * Vérifie l'existence d'une clé dans un tableau global et retourne sa valeur
     * 
     * @param array $global Tableau à vérifier ($_POST ou $_GET)
     * @param string|null $key Clé à chercher (optionnel)
     * @return mixed La valeur si trouvée, sinon null, ou le tableau entier si clé nulle
     */
    private function checkGlobal(array $global, ?string $key = null): mixed
    {
        if ($key !== null) {
            return $global[$key] ?? null;
        }
        return $global;
    }
}
