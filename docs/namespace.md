# Namespace

Un namespace est un "dossier virtuel" dans lequel on place notre fichier .php

- Permet de "ranger" nos fichiers dans des dossiers pour que PHP s'y retrouve mieux.
- Doit être déclaré au début du fichier
- N'est valable QUE pour le fichier (donc à déclaré pour chaque fichier)
- Le séparateur de "dossiers" (= arbo) est le `\`

## Placer une classe dans un namespace

La classe `Joconde` est "rangée" dans le "dossier virtuel" `Terre\Europe\France\Paris\Louvre`

```php
<?php

// Je déclare mon fichier comme étant dans un dossier virtuel
namespace Terre\Europe\France\Paris\Louvre;

class Joconde {

    //...

    public function smile() {

        // ...
    }

    public function getEmplacement() {

    }
}
```

:warning: Puisque mon fichier se trouve dans le Namespace `Terre\...\Louvre`,
chaque appel de classe se fera depuis ce Namespace là.

```php
<?php

// Je déclare mon fichier comme étant dans un dossier virtuel
namespace Terre\Europe\France\Paris\Louvre;

class LaLiberteGuidantLePeuple {

    // ...

    public function goToJoconde() {

        // Fonctionne bien !
        // Les deux classes sont dans le meme namespace
        $joconde = new Joconde();
        $joconde->getEmplacement();
    }

    public function nbrVisiteur() {

        // Erreur ! La classe PDO n'existe pas dans mon namespace
        $pdo = new PDO(/* ... */);
    }
}
```

:warning: Conséquence, si je souhaite depuis un namespace A appeler une classe
se trouvant dans un namespace B, je vais devoir utiliser son FQCN (=chemin absolue).

## Utiliser une classe d'une autre Namespace

### Fully Qualified Class Name (=FQCN)

Le FQCN est le "chemin absolue" de classe.
Concretement cela correspondant au Namespace + le nom de la classe.

```php

// Ici mon fichier se trouve dans aucun namespace.
// Autrement dit il est à la racine.

// Erreur ! La classe n'existe pas !
// $joconde = new Joconde();

// Là cela fonctionne niquel !
$joconde = new Terre\Europe\France\Paris\Louvre\Joconde();

// Idem cela fonctionne comme d'habitude
$pdo = new PDO(/* .... */);
```

:bulb: Du coup dans notre exemple plus haut, il fallait appeler `PDO` via son FQCN: `new \PDO`.

:warning: Conséquence, désormais, dès que j'ai besoin d'appeler une classe, je vais devoir
réfléchir au dossier virtuel (= au Namespace) dans lequel se trouve le fichier qui déclare la classe...
Pour pouvoir utiliser le FQCN de la classe...

### Mot-clé `use`

Dès qu'on utilise au moins deux fois une même classe, il est vite pénible de répéter le FQCN de cette classe... Le mot-clé `use` est là pour nous aider:
- Comme pour le `namespace`, `use` n'est valable que pour le fichier courant
- Le premier `\` est optionnel car implicite
- Il doit être placé en haut du fichier, après le mot-clé `namespace` si il y en a un.

```php
<?php

// Ici mon fichier se trouve dans aucun namespace.
// Autrement dit il est à la racine.

// Ici grace au mot-clé use, je vient dire à PHP que désormais le FQCN de la classe Joconde
// c'est juste Toto
use Terre\Europe\France\Paris\Louvre\Joconde as Toto;

// Ici, sans le AS, je vient dire à PHP que désormais le FQCN de la classe LaLiberteGuidantLePeuple
// c'est juste LaLiberteGuidantLePeuple.
use Terre\Europe\France\Paris\Louvre\LaLiberteGuidantLePeuple;

// Là cela fonctionne niquel !
$joconde = new Toto();
$jocondebis = new Toto();
$jocondeter = new Toto();

$laLib = new LaLiberteGuidantLePeuple();
$laLib2 = new LaLiberteGuidantLePeuple();

// Idem cela fonctionne comme d'habitude
$pdo = new PDO(/* .... */);
```
