<?php
$a = 10;
$createUsers = function ($maxValue) use ($dataBase) {
    $dataBase->setStore(new User(true));

    for ($i = 0; $i < $maxValue - 1; $i++) {
        $dataBase->setStore(new User(false));
    }
};