<?php
    $totalCounter = isset($_COOKIE['myCart']) 
    ? array_reduce(json_decode($_COOKIE['myCart'], true), function($accum, $item) {
        return $accum += $item['counter'];
    }, 0)
    : 0;

    $totalSumCounter = isset($_COOKIE['myCart']) 
    ? array_reduce(json_decode($_COOKIE['myCart'], true), function($accum, $item) {
        return $accum += $item['priceCounter'];
    }, 0)
    : 0;
?>

<a href="/cart" class="cart-widget-link">
    <div class="cart-widget">
        <p>всего товаров в корзине: <span><?=$totalCounter ?></span></p>
        <p>товаров в корзине на сумму: <span><?=round($totalSumCounter, 2) ?></span></p>
    </div>
</a>