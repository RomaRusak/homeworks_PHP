<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php

        function addBorder () {
            echo '<hr>';
        }

        function addCondition ($condition) {
            return trim("<p class=\"condition\"> $condition </p>");
        }

        echo addCondition('Если переменная $a пустая, то выведите \'Верно\', иначе выведите \'Неверно\'.
        Проверьте работу скрипта при $a, равном 1, 3, -3, 0, null, true, \'\', \'0\'.');

        function task1 ($a) {
            return !empty($a) ? 'Верно' : 'Неверно';
        }

        echo task1('0');

        addBorder();

        echo addCondition('Дано трехзначное число. Поменяйте среднюю цифру на ноль.');

        function task2($num) {

            if (!is_int($num)) return 'введенное вами значение не является целым числом';
            $num .= '';
            $num[1] = 0;          
            if (strlen($num) !== 3) return 'вы ввели не трехзначное число';

            return +$num;
        }

        echo task2(123);

        addBorder();

        echo addCondition('Если переменная $a равна или меньше 1, а переменная $b больше или
        равна 3, то выведите сумму этих переменных, иначе выведите их разность
        (результат вычитания). Проверьте работу скрипта при $a и $b, равном 1 и 3, 0
        и 6, 3 и 5.');

        function task3($a, $b) {
            return $a <= 1 && $b >= 3 ? $a + $b : $a - $b;
        }

        echo task3(3,5);

        addBorder();

        echo addCondition('Дана строка с символами, например, \'abcde\'. Проверьте, что первым
        символом этой строки является буква \'a\'. Если это так - выведите \'да\', в
        противном случае выведите \'нет\'.
        ');

        function task4 ($str) {
            if (!is_string($str)) return 'вы ввели не строку';

            return strtolower($str[0]) === 'a' ? 'Да' : 'Нет';
        }

        echo task4('Abcde');

        addBorder();

        echo addCondition('Дана строка из 6-ти цифр. Проверьте, что сумма первых трех цифр
        равняется сумме вторых трех цифр. Если это так - выведите \'да\', в противном
        случае выведите \'нет\'.
        ');

        function task5($str) {
            if (!is_string($str)) return 'вы ввели не строку';
            if (strlen($str) !== 6) return 'длина строки не равняется 6 символам';

            return $str[0] + $str[1] + $str[2] ===  $str[3] + $str[4] + $str[5] ? 'Да' : 'Нет';
        }

        echo task5('132321');

        addBorder();

        echo addCondition('Разработайте программу, которая определяла количество прошедших
        часов по введенным пользователем градусах. Введенное число может быть от
        0 до 360.
        ');

        function task6($degres) {
            if (!is_numeric($degres)) return 'вы ввели значение, которое нельзя привести к числу';
            if (!($degres > 0 && $degres <= 360)) return 'число должно быть больше 0 и не больше 360';

            $template = 'колличество прошедших часов составит  ';

            return ($degres % 15 === 0 
            ? $template . ($degres / 15)   
            : $degres > 15)
            ? $template .= floor($degres / 15)  
            : $template .= 'меньше одного';
        }

        echo task6('46');

        addBorder();

        echo addCondition('Разработайте программу, которая из чисел 20 .. 45 находила те, которые
        делятся на 5 и найдите сумму этих чисел.');

        function task7 ($start, $end) {
            $arr = [];

            for ($i = $start; $i <= $end; $i++) {
                if ($i % 5 !== 0) continue;
                $arr[] = $i;
            }

            return array_reduce($arr, function ($accum, $item) {
                return $accum += $item;
            });
        }

        echo task7(20, 45);
        
        addBorder();

        echo addCondition('Дано пятизначное число. Цифры на четных позициях «занулить».
        Например, из 12345 получается число 10305. 
        ');

        function task8($num) {
            if (!is_numeric($num)) return 'вы ввели значение, которое нельзя привести к числу';
            if (strlen($num .= '') !== 5) return 'колличество цифр в введенном вами числе не равняется 5';

            for ($i = 0; $i < strlen($num.''); $i++) {
                if ($i % 2 == 0) continue;
                $num[$i] = 0;
            }

            return $num;
        }

        echo task8(12345);

        addBorder();

        echo addCondition('Дано число $num=1000. Делите его на 2 столько раз, пока результат
        деления не станет меньше 50. Какое число получится? Посчитайте
        количество итераций, необходимых для этого (итерация - это проход цикла).
        Решите задачу сначала через цикл while, а потом через цикл for.
        ');

        function task9($num) {

            $iterationCount = 0;

            // while (1) {
            //     if ($num < 50) return $iterationCount;
            //     $iterationCount++;
            //     $num /= 2;
            // }

            for (;;) {
                if ($num < 50) return $iterationCount;
                $iterationCount++;
                $num /= 2;
            }
        }

       echo task9(1000);

       addBorder();

       echo addCondition('Вывести на экран фигуру из звездочек');

       function task10($num) {
        $i = 0;

        while($i < $num) {
            $j = 0;

            while ($j < $num) {
                echo '* ';
                $j++;
            }

            echo '<br>';
            $i++;
        }
       }

       task10(7);
    ?>
</body>
</html>