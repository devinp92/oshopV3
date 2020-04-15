<?php

namespace oShop\Models;

use oShop\Utils\Database;
use PDO;

class Product extends CoreModel{

    protected $description;
    protected $picture;
    protected $price;
    protected $rate;
    protected $status;
    protected $brand_id;
    protected $category_id;
    protected $type_id;

    /**
     * Méthode pour récuperer UN SEUL produit par son ID
     *
     * @param [int] $product_id
     * @return Product
     */
    public function find($product_id)
    {
        $sql = "SELECT * FROM product WHERE id = {$product_id};";

        // Database::getPDO() me retourne l'instance PDO contenant la connexion à la BDD
        $pdo = Database::getPDO();

        // Je donne à PDO ma requete SQL
        // PDO me répond sous la forme d'un "jeu de résultat"
        $pdoStatement = $pdo->query($sql);

        // SI je souhaite récuperer un seul produit sous la forme d'un tableau assoc
        // je fait un fetch....
        // Si je souhaite récuperer un seul produit sous la forme d'une instance
        // je fait un fetchObject
        $oneProduct = $pdoStatement->fetchObject('oShop\Models\Product');

        return $oneProduct;
    }

    /**
     * Methode pour récuperer TOUT les produits
     *
     * @return array[Product]
     */
    public function findAll()
    {
        $sql = 'SELECT * FROM product;';

        // Database::getPDO() me retourne l'instance PDO contenant la connexion à la BDD
        $pdo = Database::getPDO();

        // Je donne à PDO ma requete SQL
        // PDO me répond sous la forme d'un "jeu de résultat"
        $pdoStatement = $pdo->query($sql);

        // Je récupere tout les résultats sous la forme d'un tableau
        // indexé qui contient des tableau associatifs
        // Cool mais pas super pratique...
        // $productsList = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        // Je récupere TOUT les résultats sous la forme d'un tableau
        // indexé, qui contient des instances de la classe Product
        // avec les propriétés déjà bien renseignées par PDO
        $productsList = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\Models\Product');

        return $productsList;
    }

    public function findAllBytype($type_id)
    {
        $sql = 'SELECT * 

        FROM product
        
        WHERE type_id = ' . $type_id;

        // Database::getPDO() me retourne l'instance PDO contenant la connexion à la BDD
        $pdo = Database::getPDO();

        // Je donne à PDO ma requete SQL
        // PDO me répond sous la forme d'un "jeu de résultat"
        $pdoStatement = $pdo->query($sql);

        // Je récupere tout les résultats sous la forme d'un tableau
        // indexé qui contient des tableau associatifs
        // Cool mais pas super pratique...
        // $productsList = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        // Je récupere TOUT les résultats sous la forme d'un tableau
        // indexé, qui contient des instances de la classe Product
        // avec les propriétés déjà bien renseignées par PDO
        $productsList = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\Models\Product');

        return $productsList;
    }


    public function findAllByCategory($category_id)
    {
        $sql = 'SELECT * 

        FROM product
        
        WHERE category_id = ' . $category_id;

        // Database::getPDO() me retourne l'instance PDO contenant la connexion à la BDD
        $pdo = Database::getPDO();

        // Je donne à PDO ma requete SQL
        // PDO me répond sous la forme d'un "jeu de résultat"
        $pdoStatement = $pdo->query($sql);

        // Je récupere tout les résultats sous la forme d'un tableau
        // indexé qui contient des tableau associatifs
        // Cool mais pas super pratique...
        // $productsList = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        // Je récupere TOUT les résultats sous la forme d'un tableau
        // indexé, qui contient des instances de la classe Product
        // avec les propriétés déjà bien renseignées par PDO
        $productsList = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\Models\Product');

        return $productsList;
    }

    public function findAllByBrand($brand_id)
    {
        $sql = 'SELECT * 

        FROM product
        
        WHERE brand_id = ' . $brand_id;

        // Database::getPDO() me retourne l'instance PDO contenant la connexion à la BDD
        $pdo = Database::getPDO();

        // Je donne à PDO ma requete SQL
        // PDO me répond sous la forme d'un "jeu de résultat"
        $pdoStatement = $pdo->query($sql);

        // Je récupere tout les résultats sous la forme d'un tableau
        // indexé qui contient des tableau associatifs
        // Cool mais pas super pratique...
        // $productsList = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        // Je récupere TOUT les résultats sous la forme d'un tableau
        // indexé, qui contient des instances de la classe Product
        // avec les propriétés déjà bien renseignées par PDO
        $productsList = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\Models\Product');

        return $productsList;
    }




    public function findSingle($id) {
        // requête pour récupérer UN produit
        $sql = '
        SELECT product.*, brand.name AS brand_name, category.name AS category_name, type.name AS type_name

        FROM product
        
        INNER JOIN brand ON brand.id = product.brand_id
        
        INNER JOIN category ON category.id = product.category_id
        
        INNER JOIN type ON type.id = product.type_id
        
        WHERE product.id = ' . $id;

        // Database::getPDO() me retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();

        // j'execute ma requête pour récupérer le Product
        $pdoStatement = $pdo->query($sql);

        // Je veux récupérer un objet Product, PDO le fait pour moi => fetchObject (au lieu de fetch)
        $product = $pdoStatement->fetchObject('oShop\Models\Product');

        return $product;
    }

    /**
     * Méthode pour récuperer UN SEUL produit par son champ name
     *
     * @param [string] $product_name
     * @return Product
     */
    public function findByName($product_name)
    {

    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of picture
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the value of rate
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the value of brand_id
     */
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Get the value of category_id
     */
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Get the value of type_id
     */
    public function getType_id()
    {
        return $this->type_id;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
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
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Set the value of type_id
     *
     * @return  self
     */
    public function setType_id($type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }
}