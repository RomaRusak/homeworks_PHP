<?php
require_once '../backend/connection.php';
require_once '../backend/functions/functions.php';

$requestLastNews = 'SELECT t1.TITLE, t1.DATE, t2.NAME, t2.CODE as "CATEGORY", t1.CODE FROM posts as t1 JOIN categories as t2 ON t1.CATEGORY_ID = t2.ID  ORDER BY date DESC LIMIT 4;';
$resultLastNews = $mysqli->query($requestLastNews);
if ($resultLastNews->num_rows) $dataLastNews = getDataFromBD($resultLastNews);

$requestCategory = 'SELECT DISTINCT NAME, CODE FROM categories;';
$resultCategory = $mysqli->query($requestCategory);
if ($resultCategory->num_rows) $dataCategory = getDataFromBD($resultCategory);
// echo '<pre>' . print_r($dataCategory, true) . '</pre>';
?>

<div class="container">
    <div class="articles-wrapper">
        <div class="articles-categories">
            <h2 class="articles-categories_title">Категории</h2>
            <div class="articles-categories-wrapper">
                <?  foreach($dataCategory as $item):?>
                    <a href="<?="/articles/{$item['CODE']}"; ?>">
                        <div class="category-item">
                            <p><?=$item['NAME']; ?></p>
                        </div>
                    </a>
                <? endforeach; ?>
            </div>
        </div>
        <div class="articles-last-news">
            <h2>Cамые последние новости</h2>
            <? foreach($dataLastNews as $item): ?>
                <a href="<?="/articles/{$item['CATEGORY']}/{$item['CODE']}" ?>">
                    <div class="last-news">
                        <h3 class="last-news_title"><?=$item['TITLE']; ?></h3>
                        <div class="last-news_category">
                            <span>
                                <?=$item['NAME']; ?>
                            </span>
                        </div>
                        <div>
                            <span>
                                <?=$item['DATE']; ?>
                            </span>
                        </div>
                    </div>
                </a>
            <? endforeach; ?>
        </div>
    </div>
</div>