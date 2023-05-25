<?php

['phone' => $phone, 'email' => $email, 'confirm' => $confirm] = $_REQUEST;


function form_validation($phone, $email, $confirm) {
    if (!$confirm) return false;

    $phone = strip_tags(htmlspecialchars(trim($phone)));
    $email = strip_tags(htmlspecialchars(trim($email)));
    
    if (empty($phone) && empty($email)) return false;

    if (!preg_match('/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,12}(\s*)?$/', $phone) || !preg_match('/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/', $email)) return false; //честно загугленная регулярка)

    return true;
}

echo '<hr>';
if (form_validation($phone, $email, $confirm)) {
    header('Location: /?page=sucess-validation');
} else {
    header('Location: /?page=contacts');
}