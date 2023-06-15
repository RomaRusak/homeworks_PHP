<?php

function getDataFromBD($result)
{
    $data = [];

     while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    

    return $data;
}

function createPagination($counter, $separator) {
    return ceil($counter / $separator);
}

function splitArrForPagination($dataCategory, $separator) {
    $limit = empty($_GET['page']) ? 1 : $_GET['page'];
    $limiFinish = $limit * $separator -1; 
    $limitstart = $limiFinish - $separator; 

    return array_filter($dataCategory, function($item, $index) use ($limit, $limiFinish, $limitstart) { 
        return $index >$limitstart && $index <= $limiFinish;
    }, ARRAY_FILTER_USE_BOTH);
}

function cutDate($date) {
    preg_match('/\d+-\d+-\d+/', $date, $newDate);
    return $newDate[0];
}