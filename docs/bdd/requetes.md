# Requêtes SQL

## Récupérer tous les produits

```sql
SELECT * FROM product
```

## Récupérer le produit ayant un id donné (#2)

```sql
SELECT *
FROM product
WHERE id = 2
```

## Récupérer toutes les categories

```sql
SELECT * 
FROM category;
```

## Récuperer les catégories destinées à la home dans le bon ordre

```sql
SELECT * 
FROM category
WHERE home_order != 0
ORDER BY  home_order ASC
;
```

*Alternative, fonctionnelle mais moins robuste dans le temps
*
```sql
SELECT *
FROM category
ORDER BY home_order
LIMIT 5 OFFSET 2;
```
## Tous les types

```sql
SELECT * 
FROM type
;
```

## Répérer tous les types qui seront affichés dans le footer

```sql
SELECT * 
FROM `type`
WHERE footer_order != 0
ORDER BY footer_order ASC
;
```

## Répérer toutes les marques qui seront affichés dans le footer dans le bon ordre

```sql
SELECT * 
FROM `brand`
WHERE footer_order != 0
ORDER BY footer_order ASC
;
```

## Tous les produits d'une marque (Ex : les produits de la marque BOOTstrap (elle a pour id #2))

```sql
SELECT *
FROM product
WHERE brand_id = 2;
```

## Tous les produits d'une catégory (Ex : les produits de la catégorie Cérémonie (elle a pour id #3))

```sql
SELECT *
FROM product 
WHERE category_id = 3;
```


## Tous les produits d'un type (Ex : les produits du type Chaussures de ville (il a pour id #1))

```sql
SELECT *
FROM product
WHERE type_id = 1
```