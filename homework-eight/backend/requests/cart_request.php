<?php
echo "<pre>";

$names = '("' . join('","', array_keys($itemsInCart)) . '")';

$cart_request = 'SELECT NAME, CODE
FROM `products`
WHERE CODE IN ' . $names;
