<?php

namespace App\Core;

// On "importe" PDO et PDOException pour gérer la connexion
use PDO;
use PDOException;

class Db extends PDO
{
    // Instance unique de la classe (Singleton)
    private static ?self $instance = null;

    // Constantes pour les infos de connexion à la BDD
    private const DBHOST = 'localhost';  // Hôte de la base
    private const DBUSER = 'root';  // Utilisateur
    private const DBPASS = 'Mycode8535pass'; // Mot de passe
    private const DBNAME = 'bloggerj';  // Nom de la base de données

    /**
     * Constructeur privé pour empêcher l'instanciation directe
     * On configure la connexion PDO ici
     */
    private function __construct()
    {
        // Chaîne DSN (Data Source Name) pour se connecter à MySQL
        $_dsn = 'mysql:dbname=' . self::DBNAME . ';host=' . self::DBHOST;

        // On appelle le constructeur PDO avec nos paramètres
        try {
            parent::__construct($_dsn, self::DBUSER, self::DBPASS);

            // Configuration des options PDO :
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8'); // Encodage UTF-8
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // Récupère les résultats sous forme d’objets
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Active les exceptions en cas d’erreur
        } catch (PDOException $e) {
            // Si la connexion échoue, on arrête le script avec un message d’erreur
            die($e->getMessage());
        }
    }

    /**
     * Méthode qui renvoie l’instance unique de la connexion (Singleton)
     * Si aucune instance n’existe encore → on la crée
     * Sinon → on réutilise la même
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
