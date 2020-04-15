# MVC :scream:

## Par où commencer ?

Cette saison, on a vu comment bien organiser notre projet. Routeur, dispatcheur, vues, modèle, contrôleurs, classes utilitaires :dizzy_face: Quand on part d'une feuille blanche, c'est pas toujours facile... Mais aller tout recopier du dossier oShop et tailler dans le gras sans se tromper, ce n'est toujours la meilleure approche non plus.

## Commençons par un rappel

Ça ne fait jamais de mal... Revoyons la définition de chaque terme :  
- **Point d'entrée** : Le script où sont redirigées toutes les requêtes de votre application. Peu importe l'url demandée, c'est le point d'entrée (index.php) qui va la gérer :muscle:.
- **Routeur** : Le composant chargé de récupérer l'url demandée et de la comparer aux routes que nous lui avons données.
- **Routes** : Une correspondance entre une url et une action.
- **Action** : Une action qu'il est possible de faire sur l'application (ex: lister les produits, se connecter, écrire un avis sur un produit etc.). Une action correspond à une méthode de contrôleur.
- **Dispatcheur** : Le composant ou le script (ça peut être très court) chargé d'instancier le bon contrôleur et de lancer la bonne méthode en fonction de la route qui a été identifiée par le routeur.
- **Contrôleur** : Le composant qui regroupe les actions de l'application par contexte (ex: UserController pour tout ce qui concerne le compte utilisateur, MainController pour toutes les pages _bâteau_ comme l'accueil, les mentions légales, l'à propos).
- **Modèle** : Globalement, le terme Modèle désigne la partie gestion des données. De toutes les données. Le modèle apporte le dynamisme d'un site. Plus précisément, on désigne par le terme modèle une classe calquée sur une table de la base de données (une colonne = une propriété). Ces modèles vont permettre à toute l'application de manipuler des objets plutôt que des tableaux associatifs.
- **Vue** : Un fragment de HTML qui sera envoyé au client. C'est le contrôleur qui va se charger d'assembler les vues et de leur transmettre les données récupérées par le modèle.

Et le déroulé alors ? On y vient :
- Le visiteur accède à une page de votre application. À cette page correspond une url. Cette url peut être un mélange de parties fixes et de paramètres (ex: /catalogue/categorie/4, _/catalogue/categorie/_ est la partie fixe, _4_ est un paramètre).
- Apache, grâce au fichier de configuration _.htaccess_, redirige toutes les requêtes de l'application vers votre front controller (en général, le script _public/index.php_).
- Dans le front controller, le routeur puis le dispatcheur se passent le relais pour traduire l'url demandée en une action (donc une méthode d'un contrôleur).
- Le contrôleur est instancié, la méthode lancée et les éventuels paramètres sont passés à la méthode.
- La méthode du contrôleur va éventuellement faire appel au Modèle (à la couche Modèle) pour récupérer des données à afficher à l'utilisateur, en fonction des paramètres par exemple.
- Puis cette même méthode va assembler les vues qui formeront la page envoyée au visiteur. Les données passées aux vues sont positionnées dans celles-ci, à l'aide de la syntaxe template de php (le `<?=` et les conditions/boucles suivies d'un `:` et fermées par un `end`).

Et si ça ne vous suffit pas comme rappel, il y a une fiche récap sur MVC :tada: https://github.com/O-clock-Alumni/fiches-recap/blob/master/gestion-projet/modele-vue-controller.md

## Et alors, c'est quoi la première étape ?

C'est d'aller sur la branche `deroulement`, vous positionner sur le premier commit, lire le README.md et avancer commit par commit :wink:

Bon voyage :rocket: