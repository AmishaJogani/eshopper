SELECT *, (SELECT COUNT(id) from products where category_id = categories.cat_id) as category_count FROM `categories`;
