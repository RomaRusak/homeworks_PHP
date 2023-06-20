<?php
if (!empty($_GET['inc']) && !empty($_GET['product'])) {
    header("location: ?product={$_GET['product']}");
}
require_once "../backend/connection.php";
require_once "../backend/function.php";
require_once "../store/store.php";
$productName = getProductName();
require_once "../backend/requests/product_request.php";
echo $product_request;

$product_result = $mysqli->query($product_request);

if ($product_result->num_rows) {
    [$product_data] = getDataFromDB($product_result);
}

// echo "<pre>";
// var_dump($product_data);
// echo "<pre>";
?>

<div class="container">
    <div class="product-content">
        <div class="product-title-wrapper">
            <h1 class="product-title"><?=$product_data['NAME']; ?></h1>
        </div>
        <div class="product-img-wrapper">
            <img src="<?="../sourses/img/" . $product_data['CODE'] . ".jpg"; ?>" >
        </div>
        <div class="product-description">
            <?=$product_data['DESCRIPTION']; ?>
        </div>
        <div>
            <a href="<?="/product/?product=" . $product_data['CODE'] . "&inc={$product_data['CODE']}" . "&price={$product_data['PRICE']}"; ?>">
                <button class="button-add-to-card ">Добавить в корзину</button>
            </a>
        </div>
    </div>
</div>