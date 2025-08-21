<?php

namespace App\Forms;

use App\Validators\ValidatorContact;

/**
 * Classe FormContact
 * -------------------
 * Sert d'interface entre les données d'un message et le validateur.
 * Retourne toujours un tableau d'erreurs : vide si aucune erreur.
 */
class FormContact
{
    /** 
     * @var object Données du formulaire, typiquement un objet contenant firstname, lastname, email, subject et message
     */
    public object $data;


    /**
     * Constructeur de la classe FormContact.
     * Initialise l'objet avec les données du formulaire.
     *
     * @param object $data Données du formulaire à valider
     */
    public function __construct(object $data)
    {
        $this->data = $data;
    }

    /**
     * Valide les données du formulaire Contact.
     *
     * @return array|bool Retourne un tableau d'erreurs si certaines validations échouent, ou true si toutes les validations passent.
     */
    public function validate(): array|bool
    {

        $validator = new ValidatorContact($this->data);
        $result = $validator->checkData();

        // Nettoie les validations réussies (valeurs true) pour ne garder que les erreurs
        if (is_array($result)) {
            foreach ($result as $key => $value) {
                if ($value === true) {
                    unset($result[$key]);
                }
            }
        }
        return $result; // Retourne seulement les erreurs éventuelles
    }
}
