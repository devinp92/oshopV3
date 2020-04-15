# Requêtes SQL

## Récupérer tous les produits

```sql
SELECT * FROM product
```

## Footer

> Les 5 types dans le footer

```sql
SELECT *
FROM type
WHERE footer_order > 0
ORDER BY footer_order
LIMIT 5;
```

> Les 5 marques dans le footer

```sql
SELECT *
FROM brand
WHERE footer_order > 0
ORDER BY footer_order
LIMIT 5;
```

## Home

> Les 5 catégories mises en avant

```sql
SELECT *
FROM category
WHERE home_order > 0
ORDER BY home_order
LIMIT 5;
```

## Catégorie

> Le détail de ma categorie dont l'id est passé dans l'url

```sql
SELECT *
FROM category
WHERE id = 1
```

> Tous les produits de la catégorie dont l'id est passé dans l'url par nom croissant

```sql
SELECT *
FROM product
WHERE category_id = 1
ORDER BY name ASC
```

> Tous les produits de la catégorie dont l'id est passé dans l'url par prix croissant

```sql
SELECT *
FROM product
WHERE category_id = 1
ORDER BY price ASC
```

> Compter le nombre de fois où j'ai un produit pour cette categorie
> Autrement dit compter le nombre de produit dans ma categorie

```sql
SELECT count(id)
FROM product
WHERE category_id = 1
```

## Marque

> Le détail de ma marque dont l'id est passé dans l'url

```sql
SELECT *
FROM brand
WHERE id = 1
```

> Tous les produits de la marque dont l'id est passé dans l'url par nom croissant

```sql
SELECT *
FROM product
WHERE brand_id = 1
ORDER BY name ASC
```

> Tous les produits de la marque dont l'id est passé dans l'url par prix croissant

```sql
SELECT *
FROM product
WHERE brand_id = 1
ORDER BY price ASC
```

## Type

> Le détail de mon type dont l'id est passé dans l'url

```sql
SELECT *
FROM type
WHERE id = 1
```

> Tous les produits de mon type dont l'id est passé dans l'url par nom croissant

```sql
SELECT *
FROM product
WHERE type_id = 1
ORDER BY name ASC
```

> Tous les produits de mon type dont l'id est passé dans l'url par prix croissant

```sql
SELECT *
FROM product
WHERE type_id = 1
ORDER BY price ASC
```

## Produit

> Les informations d'un produit dont l'id est passé dans l'url

```sql
SELECT *
FROM product
WHERE id = 1
```

> Les informations d'un produit dont l'id est passé dans l'url + nom de la marque + nom de la catégorie

```sql
# Les informations d un produit dont l id est passé dans l url
# + nom de la marque
# + nom de la catégorie

SELECT
product.*,
brand.name AS brand_name,
category.name AS category_name
FROM product
INNER JOIN brand
ON product.brand_id = brand.id
INNER JOIN category
ON product.category_id = category.id
WHERE product.id = 1
;
```