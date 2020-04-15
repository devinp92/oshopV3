# Jointure

## Les clés

2 Type de clés:

> Une clé primaire => Un identifiant UNIQUE pour chaque entrée (=ligne) dans ma table

> Une clé étrangère => La clé primaire d'une entrée d'une table autre que celle dans laquelle on se trouve

## Le fonctionnement des jointures

On va relier la clé étrangère à la clé primaire

> FK => PK

## Mise en pratique

```SQL
# Je cible ici les champs que je suis récuperer.
SELECT
product.name,                # Le nom du produit
product.description,      # La description du produit
brand.name                    # Le nom de la marque
FROM product               # Le nom de la table qui contient l'information principale que je cherche (ici le produit dont l'id est 1)
INNER JOIN brand       # Le nom de la table qui contient des informations supplémentaire (ici la table brand puisque je souhaite récuperer le nom de la maque, dans mon select)
# Je précise ici à MySQL, que la jointure avec la table brand ne doit pas se faire avec TOUTES les marques, mais uniquement une seul.
# La seule marque qui m'interesse c'est celle dont l'id est présent dans le champ brand_id de la table product.
# Pour résumer, je réalise une jointure entre la clé étrangere (brand_id) présente dans la table product
# et la clé primaire (id) présente dans la table brand.
ON product.brand_id = brand.id 
WHERE                            # Je précise ici les termes de ma recherche
product.id = 1                 # Je ne recherche que les informations du produit dont l'id est 1
; 
```