<?php
if (!empty($_GET['dec']) || !empty($_GET['inc'])) {
    header('location: ?');
}
$itemsInCart = $_COOKIE['myCart'] ? json_decode($_COOKIE['myCart'], true) : [];

require_once "../backend/connection.php";
require_once "../backend/function.php";
require_once "../store/store.php";
require_once "../backend/requests/cart_request.php";

$cart_result = $mysqli->query($cart_request);
if ($cart_result->num_rows) {
    $cart_data = getDataFromDB($cart_result);
}

if (!empty($itemsInCart)) {
    
    $itemsInCart = array_map(function($item) use ($addRusName, $cart_data) {
        $newArr = [];
    
        foreach($item as $key => $value) {
            $newArr[$key] = $item[$key];
        };
    
        $newArr['rusName'] = $addRusName($item['name'], $cart_data);
    
        return $newArr;
    },$itemsInCart);
    
    $totalSumCounter = isset($_COOKIE['myCart']) 
    ? array_reduce(json_decode($_COOKIE['myCart'], true), function($accum, $item) {
         return $accum += $item['priceCounter'];
    }, 0)
    : 0;
}


// echo '<pre>';
// var_dump($itemsInCart);
// echo '</pre>';

?>

<div class="container">
    <div class="cart-content">
        <?foreach($itemsInCart as $item): ?>
            <div class="cart-item">
                <div class="cart-item-title">
                    <h3><?=$item['rusName']; ?></h3>
                </div>
                <div class="cart-img-wrapper">
                    <img src="<?="../sourses/img/" . $item['name'] .".jpg"  ?>" alt="">
                </div>
                <div class="cart-item-buttonWrapper">
                    <a href="<?= "/cart/?inc={$item['name']}" ?>"><button class="button-add-to-card">+</button></a>
                    <a href="<?= "/cart/?dec={$item['name']}" ?>"><button class="button-add-to-card">-</button></a>
                </div>
                <div class="counter-wrapper">
                    <span>X <?=$item['counter'] ?></span>
                </div>
            </div>
        <? endforeach; ?>
        <?if ($totalSumCounter > 0):?>
        <div class="total-price-wrapper">
            <p>итоговая цена вашего заказа: <?=$totalSumCounter ?> руб.</p>
        </div>
        <?else: ?>
        <div class="total-price-wrapper">
            <p>ваша корзина пуста</p>
        </div>
        <?endif; ?>
    </div>
</div>