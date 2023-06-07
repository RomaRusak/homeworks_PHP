<?php
require_once '../session/index.php';
require_once '../fuctions.php';

if ($_GET['logout']) {
    unset($_SESSION['auth']);
}

if (validation($_POST['login'], $_POST['password'])) {
    $data = ['login' => strtolower(trim(htmlspecialchars($_POST['login']))), 'password' => trim(htmlspecialchars($_POST['password']))];
    $db = createDB(parse_ini_file('../config/config.ini'));
    $flag = false;

    foreach ($db as $user) {
        if ($data['login'] === strtolower($user['login']) && password_verify($data['password'], $user['password'])) $flag = true;
    }

    if ($flag) {
        $_SESSION['auth'] = 'true';
        header('Location: /admin/');
    } else $redirect();
} else $redirect();
