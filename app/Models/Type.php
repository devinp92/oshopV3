<?php

namespace oShop\Models;

use oShop\Utils\Database;
use PDO;

// Le nom de ma class reprend le nom de la table correspondante
class Type extends CoreModel {

    // Le nom des propriétés reprend le nom des champs de la table
    protected $footer_order;

    /**
     * Méthode pour chercher 1 type en fonction de son ID
     *
     * @param [int] $type_id
     * @return Type
     */
    public function find($type_id)
    {
        $sql = "SELECT * FROM type WHERE id = {$type_id};";

        // Database::getPDO() me retourne l'instance PDO contenant la connexion à la BDD
        $pdo = Database::getPDO();

        // Je donne à PDO ma requete SQL
        // PDO me répond sous la forme d'un "jeu de résultat"
        $pdoStatement = $pdo->query($sql);

        // SI je souhaite récuperer une seule marque sous la forme d'un tableau assoc
        // je fait un fetch....
        // Si je souhaite récuperer une seule marque sous la forme d'une instance
        // je fait un fetchObject
        return $pdoStatement->fetchObject('oShop\Models\Type');
    }

    /**
     * Méthode pour chercher TOUT les types
     *
     * @return array[Type]
     */
    public function findAll()
    {
        $sql = 'SELECT * FROM type;';

        // Database::getPDO() me retourne l'instance PDO contenant la connexion à la BDD
        $pdo = Database::getPDO();

        // Je donne à PDO ma requete SQL
        // PDO me répond sous la forme d'un "jeu de résultat"
        $pdoStatement = $pdo->query($sql);

        // Je récupere tout les résultats sous la forme d'un tableau
        // indexé qui contient des tableau associatifs
        // Cool mais pas super pratique...
        // return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        // Je récupere TOUT les résultats sous la forme d'un tableau
        // indexé, qui contient des instances de la classe Type
        // avec les propriétés déjà bien renseignées par PDO
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\Models\Type');
    }

    /**
     * Méthode qui retourne les 5 Type pour le pied de page
     *
     * @return array[Type]
     */
    public function findFooterFive()
    {
        $sql = 'SELECT *
                FROM type
                WHERE footer_order > 0
                ORDER BY footer_order
                LIMIT 5;';

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\Models\Type');
    }

    /*
        Je ne souhaite pas qu'on puisse modifier mes propriétés directement.
        Je les définies donc en private.
        Seulement, maintenant si je souhaite y acceder, je doit réaliser des Getters...
        De plus si je souhaite modifier mes propriétés je vais devoir réaliser des Setters...
    */

    /**
     * Get the value of footer_order
     */
    public function getFooterOrder()
    {
        return $this->footer_order;
    }

    /**
     * Set the value of footer_order
     *
     * @return  self
     */
    public function setFooterOrder($footer_order)
    {
        $this->footer_order = $footer_order;

        return $this;
    }
}