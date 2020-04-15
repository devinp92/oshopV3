<?php

namespace oShop\Models;

use oShop\Utils\Database;
use PDO;

// Le nom de ma class reprend le nom de la table correspondante
class Category extends CoreModel{

    // Le nom des propriétés reprend le nom des champs de la table
    protected $subtitle;
    protected $picture;
    protected $home_order;

    /**
     * Méthode pour chercher 1 categorie en fonction de son ID
     *
     * @param [int] $category_id
     * @return Category
     */
    public function find($category_id)
    {
        $sql = "SELECT * FROM category WHERE id = {$category_id};";

        // Database::getPDO() me retourne l'instance PDO contenant la connexion à la BDD
        $pdo = Database::getPDO();

        // Je donne à PDO ma requete SQL
        // PDO me répond sous la forme d'un "jeu de résultat"
        $pdoStatement = $pdo->query($sql);

        // SI je souhaite récuperer une seule marque sous la forme d'un tableau assoc
        // je fait un fetch....
        // Si je souhaite récuperer une seule marque sous la forme d'une instance
        // je fait un fetchObject
        return $pdoStatement->fetchObject('oShop\Models\Category');
    }

    /**
     * Méthode pour chercher TOUTES les caegories
     *
     * @return array[Category]
     */
    public function findAll()
    {
        $sql = 'SELECT * FROM category;';

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
        // indexé, qui contient des instances de la classe Category
        // avec les propriétés déjà bien renseignées par PDO
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\Models\Category');
    }

    

    /*
        Je ne souhaite pas qu'on puisse modifier mes propriétés directement.
        Je les définies donc en private.
        Seulement, maintenant si je souhaite y acceder, je doit réaliser des Getters...
        De plus si je souhaite modifier mes propriétés je vais devoir réaliser des Setters...
    */

    /**
     * Get the value of subtitle
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     *
     * @return  self
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get the value of picture
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of home_order
     */
    public function getHomeOrder()
    {
        return $this->home_order;
    }

    /**
     * Set the value of home_order
     *
     * @return  self
     */
    public function setHomeOrder($home_order)
    {
        $this->home_order = $home_order;

        return $this;
    }
}