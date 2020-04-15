<?php

// Inclusion de mes librairies externes gérées par Composer
require __DIR__ . '/../vendor/autoload.php';

// Inclusion des classes de contrôleurs...
// require __DIR__ . '/../app/Controllers/CoreController.php';
// require __DIR__ . '/../app/Controllers/MainController.php';
// require __DIR__ . '/../app/Controllers/CatalogController.php';
// require __DIR__ . '/../app/Controllers/CommandController.php';
// require __DIR__ . '/../app/Models/CoreModel.php';
// require __DIR__ . '/../app/Models/Brand.php';
// require __DIR__ . '/../app/Models/Category.php';
// require __DIR__ . '/../app/Models/Product.php';
// require __DIR__ . '/../app/Models/Type.php';
// require __DIR__ . '/../app/Utils/Database.php';

/* Ancienne méthode sans AltoRouteur et donc sans routes dynamiques....

// Déclaration de notre tableau de routes.
// Clé = URL
// Valeur = Détails du routing
$list_routes = [
    '/' => [
        // Le routing va se faire en utilisant nos 2 clés
        // controller & method.
        // Ainsi en fonction de l'URL mon script, va savoir
        // quel controller instancier puis quelle méthode du controller
        // il devra executer.
        'controller' => 'MainController',
        'method' => 'home'
    ],
    '/categorie' => [
        'controller' => 'CatalogController',
        'method' => 'category'
    ],
    '/a-propos' => [
        'controller' => 'MainController',
        'method' => 'about'
    ],
    '/panier' => [
        'controller' => 'CommandController',
        'method' => 'cart'
    ],
];

// Récupération de la page demandée par l'utilisateur.
if (isset($_GET['_url'])) {

    $uri = $_GET['_url'];

// Si jamais l'utilisateur a tapé dans l'url directement /index.php
// Apache ne fera pas d'url rewriting et je n'aurai donc pas
// mon paramètre GET _url.
// J'anticipe donc ce "problème" et je définit $uri à '/'.
} else {

    $uri = '/';
}

// Mise en place du dispatcher

// Je test si ma route existe...
if (isset($list_routes[$uri])) {

    // On récupere dans un array le nom du controlleur & de la méthode à utiliser.
    $routeDetails = $list_routes[$uri];

    $controllerToUse = $routeDetails['controller'];
    $methodToCall = $routeDetails['method'];

    // En plus court...
    // $controllerToUse = $list_routes[$uri]['controller'];
    // $methodToCall = $list_routes[$uri]['method'];


// Si ce n'est pas le cas alors c'est une 404 !
} else {

    $controllerToUse = 'MainController';
    $methodToCall = 'page404';
}
*/

/* Mise en place de AltoRouteur */

// 1 - Instancier AltoRouter
$router = new AltoRouter();

// 2 - Définir à AltoRouter le basepath
$router->setBasePath($_SERVER['BASE_URI']);

// Pour rappel:
// Afin que AltoRouter puisse analyser nos url, il est necessaire de lui indiquer
// quels sont les parties changeante et statiques d'une url complete.
// Pour cela, je fourni à AltoRouter, la partie "statique", de mon url.
// Ainsi AltoRouter, va pouvoir l'ignorer lors de l'analyse de l'url.

// 3 - Lister des routes (=url) à AltoRouter
$router->map(
    'GET',  // la méthode HTTP qui est autorisée
    '/',    // L'url à laquel cette route réagit
    [       // 'target': tableau qui stock le nom du controller & de la méthode associés à la route
        'controller' => 'MainController',
        'method' => 'home'
    ],
    'home'  // Le nom de la route (unique & arbitraire & optionnel).
);
$router->map(
    'GET',  // la méthode HTTP qui est autorisée
    '/legal-mentions',    // L'url à laquel cette route réagit
    [       // 'target': tableau qui stock le nom du controller & de la méthode associés à la route
        'controller' => 'MainController',
        'method' => 'legalMentions'
    ],
    'legal_mentions'  // Le nom de la route (unique & arbitraire & optionnel).
);
$router->map(
    'GET',  // la méthode HTTP qui est autorisée
    '/catalog/category/[i:category_id]',    // L'url à laquel cette route réagit
    [       // 'target': tableau qui stock le nom du controller & de la méthode associés à la route
        'controller' => 'CatalogController',
        'method' => 'category'
    ],
    'catalog_category'  // Le nom de la route (unique & arbitraire & optionnel).
);
$router->map(
    'GET',  // la méthode HTTP qui est autorisée
    '/catalog/type/[i:type_id]',    // L'url à laquel cette route réagit
    [       // 'target': tableau qui stock le nom du controller & de la méthode associés à la route
        'controller' => 'CatalogController',
        'method' => 'type'
    ],
    'catalog_type'  // Le nom de la route (unique & arbitraire & optionnel).
);
$router->map(
    'GET',  // la méthode HTTP qui est autorisée
    '/catalog/brand/[i:brand_id]',    // L'url à laquel cette route réagit
    [       // 'target': tableau qui stock le nom du controller & de la méthode associés à la route
        'controller' => 'CatalogController',
        'method' => 'brand'
    ],
    'catalog_brand'  // Le nom de la route (unique & arbitraire & optionnel).
);
$router->map(
    'GET',  // la méthode HTTP qui est autorisée
    '/catalog/product/[i:product_id]',    // L'url à laquel cette route réagit
    [       // 'target': tableau qui stock le nom du controller & de la méthode associés à la route
        'controller' => 'CatalogController',
        'method' => 'product'
    ],
    'catalog_product'  // Le nom de la route (unique & arbitraire & optionnel).
);
$router->map(
    'GET',  // la méthode HTTP qui est autorisée
    '/test',    // L'url à laquel cette route réagit
    [       // 'target': tableau qui stock le nom du controller & de la méthode associés à la route
        'controller' => 'MainController',
        'method' => 'test'
    ],
    'test'  // Le nom de la route (unique & arbitraire & optionnel).
);


// 4 - Début du dispatcher: mise en place du matching
// Ici je demande à AltoRouter si il y a une correspondance entre mon url
// et toutes les routes que je lui ai déclarée via ->map
$match = $router->match();

// 5 - Prendre en compte le résultat $match et extraire les noms du controller & méthod

// SI j'ai un résultat...
if ($match) {

    $controllerToUse = 'oShop\Controllers\\'.$match['target']['controller'];
    $methodToCall = $match['target']['method'];
    $arguments = $match['params'];


// Si je n'ai pas de résultat...
} else {

    $controllerToUse = 'oShop\Controllers\MainController';
    $methodToCall = 'page404';
    $arguments = [];
}

// 6 - Instancier le bon controller & executer la méthode en lui fournissant les arguments si necessaire

// PHP peut utiliser une variable en tant que nom de class ainsi que en nom de méthode.
// $methodToCall est une chaine de caractères. Donc PHP, lors de l'execution du code
// va venir l'interpreter ainsi:
// Ex avec la page d'accueil:
// $myController = new MainController();
// $myController->home();

$myController = new $controllerToUse();
$myController->$methodToCall($arguments);

// Nous avons donc rendu nos instanciations ainsi que nos appels de méthodes completement dynamique \o/
// Fin du dispatcher !