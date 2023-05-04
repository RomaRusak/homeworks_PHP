<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework-one</title>
</head>
<body
style="padding: 20px"
>
    <?php

    function addBBottom () {
        echo '<hr style="margin-bottom: 40px;">';
    }

    function addCondition ($condition) {
        return "<p style=\"color:dimgray\">{$condition}</p>";
    }

    echo addCondition('Создайте переменные $a=10 и $b=2. Выведите на экран их сумму,
    разность, произведение и частное (результат деления).
    ');

    $a = 10;
    $b = 2;
    $numTemplate = " чисел A и B( где A ={$a}, а B = {$b}) равняется ";

    echo 'сумма' . $numTemplate . ($a + $b) . '<br>';
    echo 'разность' . $numTemplate . ($a - $b) . '<br>';
    echo 'произведение' . $numTemplate . ($a * $b) . '<br>';
    echo 'частное' . $numTemplate . ($a / $b);

    addBBottom();

    echo addCondition('Даны три числа x = 2,y = 6 и z = 9. Найдите (x+1)4−2(z−2x^2+y^2)');
    
    $x = 2;
    $y = 6;
    $z = 9;

    echo ($x + 1) * 4 - 2 * ($z - 2 * ($x ** 2) + $y ** 2);
    addBBottom();

    echo addCondition('Создайте переменные $a=17 и $b=10. Отнимите от $a переменную $b и
    результат присвойте переменной $c. Затем создайте переменную $d,
    присвойте ей значение 7. Сложите переменные $c и $d, а результат запишите
    в переменную $result. Выведите на экран значение переменной $result.
    ');

    $a = 17;
    $b = 10;
    $c = $a - $b;
    $d = 7;
    $result = $c + $d;
    echo $result;

    addBBottom();

    echo addCondition('Создайте переменные $text1=\'Привет, \' и $text2=\'Мир!\'. С помощью этих
    переменных и операции сложения строк выведите на экран фразу \'Привет,
    Мир!\'.');

    $text = 'Привет';
    $text2 = 'Мир!';

    echo $text . ' ' . $text2;

    addBBottom();

    echo addCondition('Создайте переменную $name и присвойте ей ваше имя. Выведите на экран
    фразу \'Привет, %Имя%!\'. Вместо %Имя% должно стоять ваше имя.
    ');

    $name = 'Рома';
    echo "Привет, {$name}!";

    addBBottom();

    echo addCondition('Создайте переменную $num и присвойте ей значение \'12345\'. Найдите
    сумму цифр этого числа.');

    $num = '12345';
    $result = 0;
    
    for ($i = 0; $i < strlen($num); $i++) {
        $result += +$num[$i];
    }

    echo "Сумма чисел числа {$num} равняется {$result}";

    addBBottom();

    echo addCondition('Напишите скрипт, который считает количество секунд в часе, в сутках, в
    месяце, в году и сколько прошло секунд с начала 2000 года');

    echo 'колличество секунд  в одном часе равняется ' . (60 * 60) . '<br>';
    echo 'колличество секунд  в одних сутках равняется ' . (60 * 60 * 24) . '<br>';
    echo 'колличество секунд  в одном месяце равняется ' . (60 * 60 * 24 * 31) . '<br>';

    addBBottom();

    echo addCondition('Создайте три переменные - час, минута, секунда. С их помощью выведите
    текущее время в формате \'час:минута:секунда\'.');

    $hours = getdate()['hours'];
    $minutes = getdate()['minutes'];
    $seconds = getdate()['seconds'];

    echo "{$hours}:{$minutes}:{$seconds}";

    addBBottom();

    echo '<p style="color:dimgray"> Переделайте приведенный код так, чтобы в нем использовались операции
    +=, -=, *=, /=, ++, --. Количество строк кода при этом не должно измениться.
    Код для переделки: </p>';
    echo '<pre style="color:dimgray"> 
    $var = 1;
    $var = $var + 12;
    $var = $var - 14;
    $var = $var * 5;
    $var = $var / 7;
    $var = $var + 1;
    $var = $var - 1;
    echo $var; </pre>';

    $var = 1;
    $var += 12;
    $var -= 14;
    $var *= 5;
    $var /= 7;
    $var += 1;
    $var -= 1;
    echo $var;

    addBBottom();

    echo '<p style="color:dimgray">Создайте константу и присвойте ей значение - ваша фамилия, создайте
    соответствующие переменные со сл. значениями: ваше имя, ваше отчество,
    ваш возраст. Проверьте существует ли созданная константа, если да, то
    выведите фразу "Меня зовут <ваша фамилия> (сокр. <ваше имя> и сокр.
    Курс «Программирование на PHP».
    ваше отчество). Мне <ваш возраст> лет". Каждая фраза должна начинаться с
    новой строки. Например:</p>';
    echo'<pre style="color:dimgray"> 
    "Меня зовут Иванов (И. И.).
    Мне 5 лет."
    </pre>';

    define('SURNAME', 'Русак');
    $name = 'Роман'; // не могу победить кириллицу
    $patronymic = 'Сергеевич'; //не могу победить кириллицу
    $age = '26';

    function checkConst ($constName, $text) {
        if (defined($constName)) return $text;
        return 'Такой константы нету';
    }
    
    
    echo checkConst('SURNAME', 'меня зовут ' . SURNAME . "( " . mb_substr($name, 0, 1) . ' . ' . mb_substr($patronymic, 0, 1) . ' )<br>' . "Мне {$age} лет");
    
    ?>

</body>
</html>