<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework_three</title>
</head>

<body>

    <?Php
    echo '<div style="padding: 25px 35px; ">';
    function addBorder(): void
    {
        echo '<hr>';
    };

    function addCondition($condition)
    {
        return trim("<p style=\"color: lightsalmon; font-size: 1.8rem; text-shadow: 1px 0px 1px black; text-align: center;\"> $condition </p>");
    }

    //Задача 1

    echo addCondition('Сделайте функцию, которая возвращает куб числа. Число передается
    параметром.');

    $task1 = fn (int $num): int => pow($num, 3);
    echo $task1(2);

    addBorder();

    //Задача 2

    echo addCondition('Сделайте функцию, которая возвращает сумму двух чисел. Числа
    передаются параметрами функции. ');

    $task2 = fn (int $a, int $b): int => $a + $b;

    echo $task2(3, 4);

    addBorder();

    //Задача 3

    echo addCondition('Сделайте функцию, которая принимает параметром число от 1 до 7, а
    возвращает день недели на русском языке. ');

    function task3(int $num): string
    {

        if ($num <= 0) return 'вы ввели некорректное число';
        if ($num > 7) return task3($num % 7);

        switch ($num) {
            case 1:
                return 'понедельник';
            case 2:
                return 'вторник';
            case 3:
                return 'среда';
            case 4:
                return 'четверг';
            case 5:
                return 'пятница';
            case 6:
                return 'суббота';
            case 7:
                return 'воскресенье';
        }
    }

    echo task3(9);

    addBorder();

    //Задача 4

    echo addCondition('Сделайте функцию, которая параметром принимает число и проверяет - отрицательное оно или нет. Если отрицательное - пусть функция вернет true, а если нет - false. ');

    $task4 = fn ($num) => $num < 0;

    var_dump($task4(-1));

    addBorder();

    //Задача 5

    echo addCondition('Сделайте функцию getDigitsSum (digit - это цифра), которая параметром
    принимает целое число и возвращает сумму его цифр. ');

    $getDigitsSum = fn (string $num): int => array_sum(str_split($num));

    echo $getDigitsSum(88005553535);

    addBorder();

    //Задача 6

    echo addCondition('Найдите все года от 1 до 2020, сумма цифр которых равна 13. Для этого
    используйте вспомогательную функцию getDigitsSum из предыдущей задачи');

    $task6 = function (int $start, int $end) use ($getDigitsSum): array {
        $years = [];

        $i = $start;

        while ($i <= $end) {
            if ($getDigitsSum($i) === 13) $years[] = $i;
            $i++;
        };

        return $years;
    };

    echo '<pre>';
    print_r($task6(1, 2020));

    addBorder();

    //Задача 7

    echo addCondition('Сделайте функцию isEven() (even - это четный), которая параметром
    принимает целое число и проверяет: четное оно или нет. Если четное - пусть
    функция возвращает true, если нечетное - false. ');

    $isEven = fn (int $num): bool => $num % 2 ? false : true;

    var_dump($isEven(1));

    //Задача 8

    echo addCondition('Сделайте функцию, которая принимает строку на русском языке, а
    возвращает ее транслит. ');

    function task8(string $str): string
    {
        $template = [
            'a' => 'a',
            'А' => 'A',
            'б' => 'b',
            'Б' => 'B',
            'в' => 'v',
            'В' => 'V',
            'г' => 'g',
            'Г' => 'G',
            'д' => 'd',
            'Д' => 'D',
            'е' => 'e',
            'Е' => 'E',
            'ё' => 'yo',
            'Ё' => 'Yo',
            'ж' => 'zh',
            'Ж' => 'Zh',
            'з' => 'z',
            'З' => 'Z',
            'и' => 'i',
            'И' => 'I',
            'й' => 'j',
            'Й' => 'J',
            'к' => 'k',
            'К' => 'K',
            'л' => 'l',
            'Л' => 'L',
            'м' => 'm',
            'М' => 'M',
            'н' => 'n',
            'Н' => 'N',
            'о' => 'o',
            'О' => 'O',
            'п' => 'p',
            'П' => 'P',
            'р' => 'r',
            'Р' => 'R',
            'с' => 's',
            'С' => 'S',
            'т' => 't',
            'Т' => 'T',
            'у' => 'u',
            'У' => 'U',
            'ф' => 'f',
            'Ф' => 'F',
            'х' => 'h',
            'X' => 'H',
            'ц' => 'ts',
            'Ц' => 'Ts',
            'ч' => 'ch',
            'Ч' => 'Ch',
            'ш' => 'sh',
            'Ш' => 'Sh',
            'щ' => 'sch',
            'Щ' => 'Sch',
            'ь' => '\'',
            'ъ' => '"',
            'ы' => 'y',
            'Ы' => 'Y',
            'э' => 'e',
            'Э' => 'E',
            'ю' => 'yu',
            'Ю' => 'Yu',
            'я' => 'ya',
            'Я' => 'Ya',
        ];

        return strtr($str, $template);
    };

    echo task8('Привет Мир!');

    addBorder();

    //Задача 9

    echo addCondition("Сделайте функцию, которая возвращает множественное или единственное
    число существительного. Пример: 1 яблоко, 2 (3, 4) яблока, 5 яблок. Функция
    первым параметром принимает число, а следующие 3 параметра — форма
    для единственного числа, для чисел два, три, четыре и для чисел, больших
    четырех, например, func(3, 'яблоко', 'яблока', 'яблок'). 
    ");

    function task9(int $quantity, string $form1, string $form2, string $form3): string
    {
        if ($quantity <= 0) return 'колличество должно быть больше 0';

        switch (1) {
            case $quantity === 1:
                return $quantity . ' ' . $form1;
            case $quantity >= 2 && $quantity <= 4:
                return $quantity . ' ' . $form2;
            default:
                return $quantity . ' ' . $form3;
        }
    };

    echo task9(3, 'яблоко', 'яблока', 'яблок');

    addBorder();

    //Задача 10

    echo addCondition('Дан массив с числами. Выведите последовательно его элементы
    используя рекурсию и не используя цикл.');

    function task10($arr)
    {
        echo current($arr) . '<br>';
        if (current($arr) === $arr[count($arr) - 1]) return;
        next($arr);
        return task10($arr);
    };

    task10([4, 8, 15, 16, 23, 42]);

    addBorder();

    //Задача 11

    echo addCondition('Дано число. Сложите его цифры. Если сумма получилась более 9-ти,
    опять сложите его цифры. И так, пока сумма не станет однозначным числом
    (9 и менее).');

    function task11(string $num): int
    {
        $sum = array_sum(str_split($num));
        return $sum > 9 ? task11($sum) : $sum;
    }

    echo task11(56789);

    addBorder();

    //Задача 12

    echo addCondition('Рассчитать скорость движения машины и выведите её в удобочитаемом
    виде. Осуществить возможность вывода в км/ч, м/c. Представить решение
    задачи с помощью одной функции.');

    $task12 = fn (float $distance, float $time): string =>  'Cкорость автомобиля составит: ' . round($distance / $time, 2) . ' км/ч или ' . round($distance * 1000 / ($time * 3600), 2) . ' м/с';

    echo $task12(155.6, 2.3);

    addBorder();

    //Задача 13

    echo addCondition('Даны 2 слова, определить можно ли из 1ого слова составить 2ое, при
    условии что каждую букву из строки 1 можно использовать только один раз');

    function task13(string $word_one, string $word_two): bool
    {

        $word_one = str_split($word_one);
        $word_two = str_split($word_two);

        $checkIndex = function ($word, $word_one) {
            foreach ($word_one as $key => $item) {
                if ($item === $word) return $key;
            }
        };

        foreach ($word_two as $item) {
            $key = $checkIndex($item, $word_one);
            if (is_null($key)) return false;

            $word_one = array_filter($word_one, function ($keyTemplate) use ($key) {
                return $key !== $keyTemplate;
            }, ARRAY_FILTER_USE_KEY);
        };

        return true;
    }

    var_dump(task13('lorem', 'roll'));

    addBorder();

    //Задача 14

    echo addCondition('Палиндромом называют последовательность символов, которая читается
    как слева направо, так и справа налево. Напишите функцию по определению
    палиндрома по переданному параметру.');

    function task14(string $word): bool
    {
        $word = str_split($word);
        return $word === array_reverse([...$word]);
    }

    var_dump(task14(151));

    addBorder();

    //Задача 15

    echo addCondition('Создание функцию создания таблицы умножения в HTML-документе в
    виде таблицы с использованием соотв. тегов.');

    function task15(): void
    {
        echo '<table style="width: 100%;background: whitesmoke; border: 4px solid black; border-collapse: collapse;"><tbody>';
        $i = 1;
        while ($i <= 10) {
            echo '<tr>';
            $j = 1;
            while ($j <= 10) {
                echo "<td style=\"border: 2px solid black; padding: 10px 0; text-align: center;\">$j * $i = " . '<span style="font-weight: bold;">' . ($i * $j) . '</span>' .  '</td>';
                $j++;
            }
            $i++;
            echo '</tr>';
        };
        echo '</table></tbody>';
    }

    task15();

    addBorder();

    //Задача 16

    echo addCondition(' Дана строка с текстом. Напишите функцию определения самого длинного
    слова');

    function task16($str): string
    {

        $str = explode(' ', $str);

        $max = $str[0];

        for ($i = 1; $i < count($str); $i++) {
            if (strlen($str[$i]) > strlen($max)) $max = $str[$i];
        }

        return $max;
    }

    echo task16('Lorem ipsum dolor sit amet consectetur adipisicing elit');

    addBorder();

    //Задача 17

    echo addCondition('Напишите функцию определения суммарного количества единиц в числах
    от 1 до 100.');

    function task17(int $start, int $end): int
    {
        $str = implode('', range($start, $end));
        $strWithoutOne = array_filter(str_split($str), function ($item) {
            return $item !== '1';
        }, ARRAY_FILTER_USE_BOTH);

        return strlen($str) - strlen(implode('', $strWithoutOne));
    }

    echo task17(1, 100);

    addBorder();

    //Задача 18

    echo addCondition('Напишите функцию, которая разбивает длинную строку тегами <br> так,
    чтобы длина каждой подстроки была не более N символов. Новая подстрока
    не должна начинаться с пробела.');

    function task18(string $string, int $sepVal): string
    {
        static $newStr = '';

        if (strlen($string) < $sepVal) {
            for ($i = 0; $i < strlen($string); $i++) {
                $newStr .= $string[$i];
            }
            return $newStr;
        }
        if ($string[0] === ' ') return task18(substr($string, 1), $sepVal);

        for ($i = 0; $i < $sepVal; $i++) {
            $newStr .= $string[$i];
        }

        $newStr .= '<br>';
        return task18(substr($string, $sepVal), $sepVal);
    };

    echo task18("Deter miner whether a variable is considered to be empty. A variable is considered empty if it does not exist or if its value equals false. empty() does not generate a warning if the variable does not exist.", 5);

    echo '</div>';
    ?>
</body>

</html>