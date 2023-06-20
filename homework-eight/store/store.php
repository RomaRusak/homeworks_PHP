<?php

$cart = empty($_COOKIE['myCart']) ? [] : json_decode($_COOKIE['myCart'], true);

if (isset($_GET['inc'])) {

    $productName = $_GET['inc'];
    $productPrice = $_GET['price'];

    if (!$cart[$productName]) {
        $cart[$productName] = [
            'name' => $productName,
            'productPrice' => $productPrice,
            'counter' => 1,
            'priceCounter' => $productPrice,
        ];

        setcookie('myCart', json_encode($cart), time() + 604800, '/' );
    } else {
        $cart = array_map(function($item) use($productName) {

            if ($item['name'] !== $productName) return $item;
            
            $newArr = [];

            foreach($item as $key => &$value) {
                if ($key === 'counter') {
                    $newArr[$key] = $item[$key] + 1;
                }
                else if ($key === 'priceCounter') {
                    $newArr[$key] = $item[$key] + $item['productPrice'];
                }
                else $newArr[$key] = $value;
            };

            return $newArr;
        }, $cart);

        setcookie('myCart', json_encode($cart), time() + 604800, '/' );
    }
}

if (isset($_GET['dec'])) { 

    $productName = $_GET['dec'];

    $cart = array_map(function($item) use($productName) {

        if ($item['name'] !== $productName) return $item;
        
        $newArr = [];

        foreach($item as $key => &$value) {
            if ($key === 'counter') {
                $newArr[$key] = $item[$key] - 1;
            }
            else if ($key === 'priceCounter') {
                $newArr[$key] = $item[$key] - $item['productPrice'];
            }
            else $newArr[$key] = $value;
        };

        return $newArr;
    }, $cart);

    $cart = array_filter($cart, function($item) {
        return $item['counter'] > 0;
    }, ARRAY_FILTER_USE_BOTH);

    setcookie('myCart', json_encode($cart), time() + 604800, '/' );
}