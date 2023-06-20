<?php
if (!empty($_GET['inc'])) {
    header('location: ?');
}
require_once "../backend/function.php";
require_once "../backend/connection.php";
require_once "../store/store.php";
require_once "../backend/requests/category_request.php";
require_once "../backend/requests/catalog_request.php";

$catalog_result = $mysqli->query($catalog_request);
$category_result = $mysqli->query($category_request);

if ($catalog_result->num_rows) {
    $catalog_data = getDataFromDB($catalog_result);
}

if ($catalog_result->num_rows) {
    $category_data = getDataFromDB($category_result);
}

?>

<div class="container">
    <div class="catalog-content">
        <div class="catalog-category">
            <ul>
                <li>
                    <a href="/catalog">
                        <div class="category-item">
                            <span>всё</span>
                        </div>
                    </a>
                </li>
                <? foreach($category_result as $item): ?>
                    <li>
                        <a href="<?="/catalog?category={$item['categoryCode']}"; ?>">
                            <div class="category-item">
                                <span><?=$item['categoryName'] ?></span>
                            </div>
                        </a>
                    </li>
                <? endforeach; ?>
            </ul>
        </div>
        <div class="catalog-cards">
            <? foreach($catalog_result as $item): ?>
                <div class="catalog-card">
                        <a href="<?= "/product/?product={$item['productCode']}"; ?>">
                            <div class="card-item">
                                <h3><?= $item['productName']; ?></h3>
                            </div>
                            <div class="card-img">
                                <img src=<?="../sourses/img/" . $item['productCode'] . ".jpg"?> alt="">
                            </div>
                            <div class="card-price">
                                <p>Цена: <span class="price-bold"><?=$item['productPrice'] ?></span> руб.</p>
                            </div>
                            <div class="button-wrapper">
                                <a href="<?= "/catalog" . "?inc={$item['productCode']}&price={$item['productPrice']}" ?>">
                                    <button class="button-add-to-card">Добавить в корзину</button>
                                </a>
                            </div>
                        </a>
                    </div>
            <? endforeach; ?>
        </div>
    </div>
</div>