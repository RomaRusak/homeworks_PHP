<?php
require_once '../../backend/connection.php';
require_once '../../backend/functions/functions.php';

$category = $_GET['category'];
$paginationSeparator = 3;

$requestAllCategories = 'SELECT t1.title AS "TITLE", t1.content as "CONTENT", t1.code as "CODE", t2.name as "NAME" FROM posts as t1 JOIN categories as t2 ON t1.CATEGORY_ID = t2.id WHERE t2.CODE =' . '"' . $category . '"';
$resultAllCategories = $mysqli->query($requestAllCategories);
if ($resultAllCategories->num_rows) {
    $dataCategory = getDataFromBD($resultAllCategories);
} 
if (isset($dataCategory)) {
    $paginationCounter = createPagination(count($dataCategory), $paginationSeparator);
    $shownContent = splitArrForPagination($dataCategory, $paginationSeparator);
}
?>

<div class="container">
    <div class="categories-wrapper">
        <h1>Текущая категория: <?=$dataCategory[0]['NAME']; ?></h1>
        <?if (!empty($shownContent)) foreach($shownContent as $item): ?>
                <a href="<?="/articles/detail?page={$item['CODE']}" ?>" class="category_link">
                    <div class="category-preview">
                        <h2><?=$item['TITLE']; ?></h2>
                        <?= $item['CONTENT']; ?>
                    </div>
                </a>
        <? endforeach; ?>
    </div>
    <div class="pagination">
            <? for($i = 1; $i <= $paginationCounter; $i++): ?>
                <div class="pagination-item">
                    <a href="<?="/articles/section/?category=$category&page=$i" ?>"><?=$i; ?></a>
                </div>
            <? endfor; ?>
    </div>
</div>