<?php

namespace App\Models;

use App\Core\Db;
use PDO;
use PDOStatement;

class Model extends Db
{
    // Nom de la table associée au modèle
    protected string $table;

    // Instance de PDO pour exécuter les requêtes
    private ?PDO $db = null;

    // ID de l'enregistrement courant 
    protected int|string|null $id = null;

    /**
     * Retourne tous les enregistrements de la table
     */
    public function findAll(): array
    {
        $query = $this->requete('SELECT * FROM ' . $this->table);
        return $query->fetchAll();
    }

    /**
     * Retourne les enregistrements correspondant à des critères
     */
    public function findBy(array $criteres): array
    {
        $champs = [];
        $valeurs = [];

        foreach ($criteres as $champ => $valeur) {
            $champs[] = "$champ = ?";
            $valeurs[] = $valeur;
        }

        $liste_champs = implode(' AND ', $champs);

        return $this->requete('SELECT * FROM ' . $this->table . ' WHERE ' . $liste_champs, $valeurs)->fetchAll();
    }

    /**
     * Retourne un enregistrement par son ID
     */
    public function find(int $id): object|false
    {
        return $this->requete("SELECT * FROM {$this->table} WHERE id = ?", [$id])->fetch();
    }

    /**
     * Crée un nouvel enregistrement dans la table
     */
    public function create(): PDOStatement|false
    {
        $champs = [];
        $inter = [];
        $valeurs = [];

        foreach ($this as $champ => $valeur) {
            if ($valeur !== null && $champ !== 'db' && $champ !== 'table') {
                $champs[] = $champ;
                $inter[] = "?";
                $valeurs[] = $valeur;
            }
        }

        $liste_champs = implode(', ', $champs);
        $liste_inter = implode(', ', $inter);

        return $this->requete('INSERT INTO ' . $this->table . ' (' . $liste_champs . ') VALUES (' . $liste_inter . ')', $valeurs);
    }

    /**
     * Met à jour un enregistrement existant
     */
    public function update(): PDOStatement|false
    {
        $champs = [];
        $valeurs = [];

        foreach ($this as $champ => $valeur) {
            if ($valeur !== null && $champ !== 'db' && $champ !== 'table') {
                $champs[] = "$champ = ?";
                $valeurs[] = $valeur;
            }
        }
        $valeurs[] = $this->id;

        $liste_champs = implode(', ', $champs);

        return $this->requete('UPDATE ' . $this->table . ' SET ' . $liste_champs . ' WHERE id = ?', $valeurs);
    }

    /**
     * Supprime un enregistrement par son ID
     */
    public function delete(int $id): PDOStatement|false
    {
        return $this->requete("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }

    /**
     * Exécute une requête SQL (préparée si $attributs != null)
     */
    public function requete(string $sql, ?array $attributs = null): PDOStatement|false
    {
        $this->db = Db::getInstance();

        if ($attributs !== null) {
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        }

        return $this->db->query($sql);
    }
}
