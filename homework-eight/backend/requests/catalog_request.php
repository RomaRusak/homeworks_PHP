<?php
$category = isset($_GET['category']) ? $_GET['category'] : 'all';
if ($category === 'all') $condition = " WHERE 1";
else $condition = " WHERE t3.CODE = " . "'" . $category . "'";

$catalog_request = "SELECT t2.NAME as 'productName', t2.CODE as 'productCode', t2.DESCRIPTION as 'productDescription', t2.PRICE as 'productPrice', t3.NAME as 'categoryName', t3.CODE as 'categoryCode' 
FROM amounts as t1 
JOIN products as t2 ON t1.PRODUCT_ID = t2.id 
JOIN category as t3 ON t1.CATEGORY_ID = t3.id" .
$condition .
" ORDER BY 'categoryCode';";