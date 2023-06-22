<?php

require_once "./Bankomat.php";
require_once "./DataBase.php";
require_once "./User.php";
$dataBase = new DataBase;
require_once "./functions.php";

$createUsers(10);
$bankomat = new Bankomat;
$bankomat->getCard('1111 2222 3333 4444', $dataBase);
$bankomat->giveCard();
$bankomat->getCard('1111 2222 3333 4444', $dataBase);
$bankomat->insertPassword('1234567');
echo '<hr>';
$bankomat->insertPassword('123456');
echo $bankomat->showBallance();
echo '<hr>';
$bankomat->topUpBallance(100);
echo $bankomat->showBallance();
echo '<hr>';
$bankomat->downUpBallance(50);
$bankomat->downUpBallance(50);
$bankomat->downUpBallance(50);
$bankomat->downUpBallance(50);
$bankomat->downUpBallance(50);
$bankomat->topUpBallance(100);
$bankomat->topUpBallance(500);

echo '<pre>';
var_dump($bankomat);
echo '</pre>';


