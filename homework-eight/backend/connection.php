<?php

$configData = parse_ini_file("config.ini");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli($configData['host'], $configData['login'], $configData['pass'], $configData['db']);