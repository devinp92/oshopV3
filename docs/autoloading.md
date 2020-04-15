# Autoloading

## Mise en place

Désormais chaque fichier de mon projet est dans un Namespace logique.

En effet le Namespace, reprend le chemin "physique" du fichier.

Du coup si par exemple, je cherche la classe dont le FQCN est:
`oShop\Controllers\CoreController`
Il est possible de deviner que le chemin physique du fichier contenant la déclaration de la classe sera:
`app\Controllers\CoreController.php`

## Principe de fonctionnement

Puisque que nos nom de classes ont une correspondances avec l'emplacement des fichiers.

Lorsque PHP va remarquer qu'on appel une classe qu'il ne connait pas, il pouvoir, de part l'analyse du FQCN de la classe, détermine le fichier à require automatiquement !

Ex:
```php
new oShop\Models\Brand()
```

Là PHP se dit `Oh mince, je ne connais pas cette classe... Et si je cherchais à require le fichier qui correspond ?`

```php
// Automatiquement php fait la conversion FQCN / Chemin physique 
// et réalise quelque chose comme:
require 'app/Models/Brand.php'
```

## Mise en place avec PHP en natif

Ca se passe ici: https://www.php.net/manual/fr/function.spl-autoload-register.php

Et c'est un peu relou...

## Mise en place avec Composer

Ajouter dans le composer.json les indications suivante:

```json
    "autoload": {
        "psr-4": {"oShop\\": "app/"}
    }
```

Puis executer `composer update` afin que Composer prenne en compte NOS fichiers
dans l'autoload.
