<?php

namespace oShop\Controllers;

use oShop\Models\Brand;
use oShop\Models\Type;

/**
 * Cette classe, CoreController, n'est pas là pour "hebergé" une route
 * Son seul et unique but est bien d'être étendue (extends...)
 * Il est donc "acté" que cette classe ne sera jamais instanciée
 * Nous n'aurons jamais besoin de faire un new CoreController.
 * C'est ainsi et PHP accepte bien cette idée là !
 */
class CoreController {

    /**
     * Méthode qui se charge d'afficher (et donc de require)
     * nos vues
     *
     * @param string $viewName
     * @param array (optional) $viewVars
     * @return void
     */
    protected function show($viewName, $viewVars = [])
    {
        // Technique ultra crade, qui permet de faire un trou
        // au bazooka dans notre boite hermétique afin de
        // pouvoir utiliser des variables non présentes dans
        // notre fonction/méthode
        global $router;
        dump($viewVars);
        $myType = new Type();
        $allFooterTypes = $myType->findFooterFive();
        
        $myBrand = new Brand();
        $allFooterBrands = $myBrand->findFooterFive();
        
        // $viewVars est disponible dans chaque fichier de vue
        
        $viewVars['currentPage'] = $viewName;
        $viewVars['allFooterTypes'] = $allFooterTypes;
        $viewVars['allFooterBrands'] = $allFooterBrands;
        $viewVars['baseUri'] = $_SERVER['BASE_URI'];

        // Quoi qu'il arrive, je charge mon header
        require __DIR__ . '/../views/header.tpl.php';
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        // Quoi qu'il arrive, je charge mon footer
        require __DIR__ . '/../views/footer.tpl.php';
    }
}