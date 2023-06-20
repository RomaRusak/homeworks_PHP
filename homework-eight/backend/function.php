<?php

function getDataFromDB($data) {

    $result = [];
    
    while($item = mysqli_fetch_assoc($data)) {
       $result[] = $item;
    }


    return $result;
}

$addRusName = function ($searchedName, $names) {

    foreach($names as $name) {
       if ($name['CODE'] === $searchedName) return $name['NAME'];
    };
};

function getProductName() {
    $url = $_SERVER['REQUEST_URI'];
    $pattern = '/\/product\/\?product=(\w+)&?/';
    preg_match($pattern, $url, $matches);

    return $matches[1];
}