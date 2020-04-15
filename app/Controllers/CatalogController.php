<?php

namespace oShop\Controllers;

use oShop\Models\Type;
use oShop\Models\Category;
use oShop\Models\Brand;
use oShop\Models\Product;

class CatalogController extends CoreController {


    /**
     * Méthode qui affiche la liste des produits de la catégorie
     *
     * @param [type] $urlParams
     * @return void
     */
 
    public function category($params) {


        $productModel = new Product();
        $productByCategory = $productModel->findAllByCategory($params['category_id']);


        // Je veux récupérer toutes les infos de ma catégorie
        // que je suis en train d'afficher.
        $categoryModel = new Category();

        // Je demande à mon modele de trouver la bonne catégorie
        // en lui envoyant un id.
        $category = $categoryModel->find($params['category_id']);

        // J'envoie ma catégorie à ma vue.
        $this->show('category', [
            'category' => $category,
            'productBycategory' => $productByCategory,
        ]);
    }


    public function type($urlParams)
    {
        // dd('Je vais aller chercher en base de donnée le type dont l id est: '. $urlParams['type_id']);

        // je vais instancier product afin d'utiliser sa méthode findAllByType
        $productModel = new Product();
        $productByType = $productModel->findAllBytype($urlParams['type_id']);

        $typeModel = new Type();
        $type = $typeModel->find($urlParams['type_id']);

        $this->show('type', [
            'type' => $type,
            'productByType' => $productByType,
        ]);
    }



    public function brand($params) {

        $productModel = new Product();
        $productByBrand = $productModel->findAllByBrand($params['brand_id']);


        $brandModel = new Brand();
        $brand = $brandModel->find($params['brand_id']);
        $this->show('brand', [
            'brand' => $brand,
            'productByBrand' => $productByBrand,
        ]);
    }

     public function product($params) {

        // Je vais faire mes requtes SQL pour
        // récupérer mon produit.

        // pour pouvoir faire des requetes SQL, je dois utiliser PDO.

        // Ma classe Database me met PDO à disposition.
        // $pdo = Database::getPDO();
        
        // // Seconde étape, rédiger la requete SQL.
        // $sql = 'SELECT * FROM product WHERE id = ' . $params['idProduct'] . ';';

        // // J'envoie ma requete au serveur SQL en esperant une réponse. 
        // $pdoStatement = $pdo->query($sql);

        // // Je récupère les données renvoyées par la base de données
        // // sous la forme d'un objet de type Product
        // $product = $pdoStatement->fetchObject('Product');

        // J'instancie un modèle vide pour utiliser la fonction find
        $productModel = new Product();
        
        // J'utilise la fonction find de mon modèle pour chercher un
        // produit en base de données.
        $product = $productModel->find($params['product_id']);
        $productSingle = $productModel->findSingle($params['product_id']);
       
        
        $this->show('product', [
            'product' => $product,
            'productSingle' => $productSingle,
            
        ]);
    }
}