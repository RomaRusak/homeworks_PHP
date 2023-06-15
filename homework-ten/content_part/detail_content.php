<?php
require_once '../../backend/connection.php';
require_once '../../backend/functions/functions.php';

$page = $_GET['page'];
$requestPage = 'SELECT t1.title as TITLE, t1.content as CONTENT, t1.date as DATE, t2.name as CATEGORY, t3.name as AUTHOR FROM posts as t1 JOIN categories as t2 ON t1.CATEGORY_ID = t2.ID JOIN authors as t3 ON t1.AUTHOR_ID = t3.ID WHERE t1.CODE =' . '"' . $page . '"' ;

$resulPage = $mysqli->query($requestPage);
if ($resulPage->num_rows) {
    [$pageData] = getDataFromBD($resulPage);
}

$date = cutDate($pageData['DATE']);
?>

<div class="container">
    <div class="detail-wrapper">
        <h1 class="detail-title"><?=$pageData['TITLE']; ?></h1>
        <div class="detail-author">
            <span>Категория: <span class="detail-category"><?= $pageData['CATEGORY'] ?></span></span>
            <span>Автор статьи: <span class="author-name"><?= $pageData['AUTHOR'];?></span></span>
        </div>
        <div class="detail-content">
            <?=$pageData['CONTENT']; ?>
        </div>
        <div class="detail-data">
            <span><?=$date; ?></span>
        </div>
    </div>
</div>