<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>homework_four</title>
</head>

<body>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    h2 {
      margin: 10px 0;
    }
  </style>



  <?php

  $createTitle = fn (string $str): string => '<h2>' .  trim($str) . '</h2>';

  echo '<h2 style="text-align:center; font-size: 2rem; text-transform: uppercase;"> Дополнительные задачи по 1-3 домашке <h2>';

  // Есть имя Stive. 
  // Если возраст Stive:
  //     от 0 до 12 - вывести Steve is a child
  //     с 12 до 18 - вывести Steve is a teenager
  // иначе 
  //     - вывести Steve is an adult

  echo $createTitle('Задача 1');

  function additional_task1(int $age): string
  {

    // switch(1) {
    //   case $age < 0:
    //     return 'invalid number';
    //   case $age < 12:  
    //     return 'Steve is a child';
    //   case $age < 18:
    //     return 'Steve is a teenager';
    //   default:
    //     return 'Steve is an adult';
    // }


    return $age < 0
      ? 'invalid number'
      : ($age < 12
        ? 'Steve is a child'
        : ($age < 18
          ? 'Steve is a teenager'
          : 'Steve is an adult'));
  }

  echo additional_task1(13);

  echo '<hr>';


  // Написать с помощью цикла while и for «переворот» числа. Другими словами, нужно создать новое число, у которого цифры шли бы в обратном порядке (например: 472 -> 274)


  echo $createTitle('Задача 2');

  function additional_task2(string $str): string
  {
    $newStr = '';
    $i = strlen($str);

    while ($i >= 0) {
      $newStr .= $str[$i];
      $i--;
    }

    return $newStr;
  }

  echo additional_task2('Lorem ipsum');

  echo '<hr>';


  // Посчитайте кол-во отрицательных, положительных элементов, элементов со строчным типом данных в произвольном массиве, а также кол-во элементов других типов.


  echo $createTitle('Задача 3');

  function additional_task3(array $arr): string
  {

    $counters_arr = [
      'positive_counter' => 0,
      'negative_counter' => 0,
      'string_counter' => 0,
      'any_counter' => 0,
    ];

    $get_type = function ($data) use (&$counters_arr) {
      switch (1) {
        case is_numeric($data) && $data > 0:
          return $counters_arr['positive_counter']++;
        case is_numeric($data) && $data < 0:
          return $counters_arr['negative_counter']++;
        case is_string($data):
          return $counters_arr['string_counter']++;
        default:
          return $counters_arr['any_counter']++;
      }
    };

    foreach ($arr as $item) {
      $get_type($item);
    }

    $answer = 'There are: ';

    foreach ($counters_arr as $key => $item) {
      $answer .=  strstr($key, '_', true) . " $item" . (next($counters_arr) ? ', ' : '');
    }

    return $answer;
  }

  echo additional_task3([1, 2, 5, -10, -2, 'some text', 'some text2', [1], [2], true, false, 0]);

  echo '<hr>';


  // Напишите функцию, которая проверяет, является ли переданная строка палиндромом.


  echo $createTitle('Задача 4');

  function additional_task4(string $str): bool
  {
    $revStr = '';
    $i = strlen($str);

    while ($i >= 0) {
      $revStr .= $str[$i];
      $i--;
    }

    return $revStr === $str;
  }

  var_dump(additional_task4('lol'));

  echo '<hr>';


  // Дан массив с произвольными значениями. Проверить, есть ли в нем одинаковые элементы. Вывести в консоль: “Есть повторки!”, “Нет повторок”


  echo $createTitle('Задача 5');

  function additional_task5(array $arr): string
  {

    $flag = true;

    for ($i = 0; $i < count($arr); $i++) {
      if (!$flag) break;
      for ($j = $i + 1; $j < count($arr); $j++) {
        if ($arr[$i] === $arr[$j]) $flag = false;
        if (!$flag) break;
      }
    }

    return $flag ? 'Нет повторок' : 'Есть повторки!';
  }

  echo additional_task5([4, 8, 15, 16, 23, 42]);

  echo '<hr>';


  // Необходимо написать программу, которая проверяет пользователя на знание таблицы умножения. Пользователь сам вводит два целых однозначных числа. Затем вводит результат умножения и в результате должен увидеть на экране правильно он ответил или нет.

  echo $createTitle('Задача 6');
  ?>

  <form action="<?php $_POST ?>" method="post">
    <input type="number" max="10" name="operandA" placeholder="введите число 1">
    <input type="number" max="10" name="operandB" placeholder="введите число 1">
    <input type="number" name="result" placeholder="введите ответ">
    <button type="submit">проверить ответ</button>
  </form>

  <?php
  if ((trim($_POST['operandA']) !== '') || trim($_POST['operandB']) !== '' || trim($_POST['result']) !== '') {
    if ((trim($_POST['operandA']) === '') || trim($_POST['operandB']) === '' || trim($_POST['result']) === '') {
      echo 'не заполнено как минимум одно из обязательных полей';
    } else {
      echo +$_POST['operandA'] * +$_POST['operandB'] === +$_POST['result'] ? '<strong>Правильно</strong>' : '<strong>Неправильно</strong>';
    }
  }

  // Заданы два массива. Один содержит наименование услуг, а другой – расценки за эти услуги. Выведите список услуг стоимостью больше 0 на экран.

  echo $createTitle('Задача 7');

  function additional_task7(array $arr_one, array $arr_two): string
  {
    $answer = 'Pizzas that price over 10 dollars: ';
    $i = 0;

    while ($i < count($arr_two)) {
      if ($arr_two[$i] > 10) $answer .= $arr_one[$i] . ($i + 1 < count($arr_two) ? ', ' : '');
      $i++;
    }

    return $answer;
  }

  echo additional_task7(
    ['American Honey', 'White', 'New G', 'Dirty Bird', 'Craft Your Own Pizza', 'Pepperoni'],
    [10.13, 9.50, 11.10, 8.40, 13.15, 14,]
  );

  echo '<hr>';


  // У треугольника сумма любых двух сторон должна быть больше третьей. Иначе две стороны просто «лягут» на третью и треугольника не получится. Пользователь вводит поочерёдно длины трех сторон. Используя конструкцию if..else (один раз), напишите код, который должен определять, может ли существовать треугольник при таких длинах. Т. е. нужно сравнить суммы двух любых строн с оставшейся третьей стороной. Чтобы треугольник существовал, сумма всегда должна быть больше отдельной стороны.


  echo $createTitle('Задача 8');
  ?>

  <div>
    <form action="<?php $_POST ?>" method="post">
      <input type="number" placeholder="введите длину первой стороны" style="width: 240px;" name="sideOne">
      <input type="number" placeholder="введите длину второй стороны" style="width: 240px;" name="sideTwo">
      <input type="number" placeholder="введите длину третьей стороны" style="width: 240px;" name="sideThree">
      <button type="submit">проверить</button>
    </form>
  </div>

  <?php
  if ((trim($_POST['sideOne']) !== '') || (trim($_POST['sideTwo']) !== '') || (trim($_POST['sideThree']) !== '')) {
    if ((trim($_POST['sideOne']) === '') || (trim($_POST['sideTwo']) === '') || (trim($_POST['sideThree']) === '')) {
      echo 'не заполнено как минимум одно из обязательных полей';
    } else {
      $sideOne = $_POST['sideOne'];
      $sideTwo = $_POST['sideTwo'];
      $sideThree = $_POST['sideThree'];

      echo ($sideOne < $sideTwo + $sideThree && $sideTwo < $sideOne + $sideThree && $sideThree < $sideOne + $sideTwo) ? 'такой треугольник может существовать' : 'такой треугольник не может существовать';
    }
  }


  // Необходимо вывести на экран числа от 50 до 1 с шагом 2, 5 и 10.


  echo $createTitle('Задача 9');

  function additional_task9(int $step, int $num = 50, int $end = 1): void
  {
    if ($num <= $end) return;
    echo $num . '<br>';
    additional_task9($step, $num - $step, $end);
  }

  additional_task9(5, 50, 1);

  echo '<hr>';

  echo '<h2 style="text-align:center; font-size: 2rem; text-transform: uppercase;"> Домашка № 4 <h2>';

  // Дана строка 'london is the capital of great britain'. Сделайте из нее
  // строку 'London Is The Capital Of Great Britain'. 


  echo $createTitle('Задача 1');

  $task1 = fn (string $str): string => ucwords($str);

  echo $task1('London Is The Capital Of Great Britain');

  echo '<hr>';


  // Дана строка 'html <b>css</b> php'. Удалите теги из этой строки. С
  // помощью функции explode запишите каждое слово этой строки в отдельный
  // элемент массива. 


  echo $createTitle('Задача 2');

  $task2 = fn (string $str): array => explode(' ', strip_tags($str));

  echo '<pre>';
  print_r($task2('html <b>css</b> php'));
  echo '</pre>';
  echo '<hr>';

  // Дана строка. Перемешайте символы этой строки в случайном порядке

  echo $createTitle('Задача 3');

  function task3(string $str): string
  {

    $arr = [];

    function key_generate($arr)
    {
      $id = rand(1, 100);
      if ($arr[$id]) return key_generate($arr);
      return $id;
    };

    for ($i = 0; $i < strlen($str); $i++) {
      $id = key_generate($arr);
      $arr[$id] = $str[$i];
    }

    ksort($arr);
    return implode('', $arr);
  }

  echo task3('Lorem ipsum');

  echo '<hr>';


  // Найдите количество дней в текущем месяце. Скрипт должен работать
  // независимо от месяца, в котором он запущен. 


  echo $createTitle('Задача 4');

  $task4 = fn():string => 'в текущем месяце будет ' .  cal_days_in_month(CAL_GREGORIAN, getdate()['mon'], getdate()['year']) . ' день';

  echo $task4();

  echo '<hr>';


  // Выведите текущую дату-время в форматах
  // '2025-12-31', '31.12.2025', '31.12.13', '12:59:59', timestamp. 

  
  echo $createTitle('Задача 5');

  $task5 = fn():string => date('o-m-d') . '<br>' . date('d-m-o') . '<br>' . date('d-m-y') . '<br>' . date('H:i:s');

  echo $task5();

  echo '<hr>';

  echo $createTitle('Задача 6');

  $task6 = function() {
   
  };

  $task6('2025-12-31');
  
  echo '<hr>';

  // Дана строка с буквами и цифрами, например, '1a2b3c4b5d6e7f8g9h0'.
  // Удалите из нее все цифры. То есть в нашем случае должна получится строка
  // 'abcbdefgh'.


  echo $createTitle('Задача 7');

  function task7(string $string): string
  {
    $string = array_filter(str_split($string), function ($item) {
      return !is_numeric($item);
    }, ARRAY_FILTER_USE_BOTH);

    return join('', $string);
  }

  echo task7('1a2b3c4b5d6e7f8g9h0');

  echo '<hr>';


  // Даны числа 4, -2, 5, 19, -130, 0, 10. Найдите минимальное и максимальное
  // число.


  echo $createTitle('Задача 8');

  function task8(...$arr): string
  {
    return 'максимальное значение: ' . max($arr) . ', минимальное значение: ' . min($arr);
  }

  echo task8(4, -2, 5, 19, -130, 0, 10);

  echo '<hr>';


  // Выведите на экран случайное число от 1 до 100.


  echo $createTitle('Задача 9');

  $task9 = fn (int $min, int $max): int => rand($min, $max);

  echo $task9(1, 100);

  echo '<hr>';


  //   Создайте ассоциативный массив дней недели. Ключами в нем должны
  // служить номера дней от начала недели (понедельник - должен иметь ключ 1,
  // вторник - 2 и т.д.). Выведите на экран текущий день недели

  echo $createTitle('Задача 10');

  function tak10() {

    $dayes_arr = [
      0 => 'Воскресенье',
      1 => 'Понедельник',
      2 => 'Вторник',
      3 => 'Среда',
      4 => 'Четверг',
      5 => 'Пятница',
      6 => 'Суббота',
    ];
    
    return $dayes_arr[getdate()['wday']];
  }

  echo tak10();

  echo '<hr>';


  // 11. Дан двухмерный массив с числами, например [[1, 2, 3], [4, 5], [6]].
  // Найдите сумму элементов этого массива. Массив, конечно же, может быть
  // произвольным. 


  echo $createTitle('Задача 11');

  function task11(array $arr): int
  {

    $accum = 0;

    function dangerRecursion($arr, &$accum)
    {
      foreach ($arr as $item) {
        if (is_array($item)) {
          dangerRecursion($item, $accum);
        } else {
          $accum += $item;
        }
      }
    }

    dangerRecursion($arr, $accum);
    return $accum;
  }

  echo task11([[1, 2, 3, [5, 5, 5]], [4, 5], [6]]);

  echo '<hr>';


  //   Есть массив $array = array(1,1,1,2,2,2,2,3), необходимо вывести 1,2,3, то
  //     есть вывести без дублей при помощи лишь одного цикла и без использования
  //     функций PHP.


  echo $createTitle('Задача 12');

  function task12(array $arr)
  {

    $without_duplicates = [];

    for ($i = 0; $i < count($arr); $i++) {
      $flag = true;
      for ($j = $i + 1; $j < count($arr); $j++) {
        if ($arr[$i] === $arr[$j]) {
          $flag = false;
          break;
        }
      }

      if (!$flag) continue;
      $without_duplicates[] = $arr[$i];
    }

    return $without_duplicates;

    // static $arr = [];
    // static $counter = 0;
    // $t = $arr[$counter];

    // for ($i = $counter + 1; $i < count($arr); $i++) {
    //   if ($arr[$i] === $t) break;
    //   echo '+';
    // }

    // $counter++;
    // if ($counter <= count($arr)) return task12($arr);
    // return $arr;
  }

  echo '<pre>';
  print_r(task12([1, 1, 1, 2, 3, 2, 2, 3]));
  echo '</pre>';
  echo '<hr>';


  // Используя ассоциативный массив, добавить на страницу навигационное меню


  echo $createTitle('Задача 13');

  function task13(): void
  {

    $arr = [
      'index' => 'Home',
      'about' => 'About',
      'services' => 'Services',
      'catalog' => 'Catalog',
      'contacts' => 'Contacts',
    ];

    echo '<ul>';
    foreach ($arr as $key => $item) {
      echo "<li><a href=\"{$key}.php\">$item</a></li>";
    }
    echo '</ul>';
  }

  task13();

  echo '<hr>';

  echo $createTitle('Задача 14');
  ?>

  <div style="height: 100vh; position:relative; background-color:black; overflow:hidden">
    <?php

    function task14($n)
    {

      for ($i = 0; $i < $n; $i++) {
        echo "
      <div style=\"
      position: absolute;
      box-sizing: border-box;
      border: 5px solid " . task17()  . ";
      top:" . rand(1, 100) . "vh;" . "
      left:" . rand(1, 100) . "vw;" . "
      background-color: red; 
      height:" . rand(1, 100) . 'vh;' . "
      width:" . rand(1, 100) . 'vw;' . "\">
      </div>";
      }
    }

    task14(5);

    ?>
  </div>

  <?php

  // Дана строка с любыми символами. Для примера пусть будет '1234567890'.
  // Нужно разбить эту строку в массив таким образом: array('1', '23', '456', '7890')
  // и так далее пока символы в строке не закончатся.


  echo $createTitle('Задача 15');

  function task15(string $str): array
  {

    static $arr = [];
    static $counter = 1;

    if ($counter >= strlen($str)) {
      $arr[] = $str;
      return $arr;
    }

    $arr[] = strstr($str, $str[$counter], true);
    $counter++;
    return task15(substr($str, $counter - 1));
  }

  echo '<pre>';
  print_r(task15('1234567890abcde'));
  echo '</pre>';

  echo '<hr>';


  //   Найдите сумму элементов массива между двумя нулями (первым и
  // последним нулями в массиве). Если двух нулей нет в массиве, то выведите
  // ноль. В массиве может быть более 2х нулей. Пример массива:
  // [48,9,0,4,21,2,1,0,8,84,76,8,4,13,2] или [1,8,0,13,76,8,7,0,22,0,2,3,2]


  echo $createTitle('Задача 16');

  function task16(array $arr): int
  {

    if (count(
      array_filter($arr, function ($item) {
        return $item === 0;
      }, ARRAY_FILTER_USE_BOTH)
    ) < 2) return 0;

    $firt_null_index = array_search(0, $arr);
    $second_null_index = null;

    $i = count($arr) - 1;
    
    while (true) {
      if ($arr[$i] === 0) {
        $second_null_index = $i;
        break;
      }
      $i--;
    }

    return array_sum(
      array_filter($arr, function ($key) use ($firt_null_index, $second_null_index) {
        return $key >= $firt_null_index && $key <= $second_null_index;
      }, ARRAY_FILTER_USE_KEY)
    );
  }

  echo task16([1, 8, 0, 13, 76, 8, 7, 10, 22, 0, 2, 3, 2]);

  echo '<hr>';


  // Сделайте функцию, которая будет генерировать случайный цвет в hex
  // (dechex) формате (типа #ffffff).


  echo $createTitle('Задача 17');
  function task17(): string
  {
    $color = '#';

    for ($i = 0; $i < 3; $i++) {
      $color .= dechex(rand(0, 255));
    }

    return $color;
  }

  echo task17();

  echo '<hr>';

  // Дана строка '332 441 550'. Найдите все места, где есть два одинаковых
  // идущих подряд цифры и замените их на '!'


  echo $createTitle('Задача 18');

  function task18(string $str): string
  {

    $replace = function (array $arr) use (&$str): void {
      foreach ($arr as $item) {
        $str = str_replace($str[$item], '!', $str);
      }
    };

    for ($i = 0; $i < strlen($str); $i++) {
      if (is_numeric($str[$i]) && is_numeric($str[$i + 1]) && $str[$i] === $str[$i + 1]) {
        $replace([$i, $i + 1]);
      }
    }

    return $str;
  }

  echo task18('332 441 550');

  echo '<hr>';

  echo '<h2 style="text-align:center; font-size: 2rem; text-transform: uppercase;"> Дополнительные задачи, которые сбросили 19.05.23 <h2>';


  // Найти число с максимальной суммой цифр среди чисел: 56,987,103,9011,45.

  echo $createTitle('Задача 2');

  function task2_more(...$arr):int {

  $getSum = fn($num) => array_sum((str_split($num)));

  $max = $arr[0];

  for ($i = 1; $i < count($arr); $i++) {
      if ($getSum($arr[$i]) > $getSum($max)) $max = $arr[$i];
  }

  return $max;
  }

  echo task2_more(56,937,103,9011,45);

  echo '<hr>';

  //Посчитайте и выведете кол-во встречающихся чисел в строке “В 2018 году появился проект, объединяющий возможности Windows Forms (.NET Framework) и PHP 7. Его разработка медленными темпами ведётся и сейчас. На текущий момент в движке доступны практически все функции для ООП. Среда находится на стадии приватной разработки. К исполняемому файлу по умолчанию прилагается php7ts.dll.”

  echo $createTitle('Задача 3');

  function task3_more(string $string) {
    preg_match_all('/\d/', $string, $matches);

    return count($matches[0]);
  }

  echo task3_more('В 2018 году появился проект, объединяющий возможности Windows Forms (.NET Framework) и PHP 7. Его разработка медленными темпами ведётся и сейчас. На текущий момент в движке доступны практически все функции для ООП. Среда находится на стадии приватной разработки. К исполняемому файлу по умолчанию прилагается php7ts.dll.');
  
  echo '<hr>';


  // Есть 2 массива: arr1 = [1,2,3,4,5,6,7,8] и arr2 = [5, 3, 6, 9, 11]. Напишите функцию, которая принимает 2 массива и возвращает массив элементов, которые есть в обоих массивах. 


  echo $createTitle('Задача 4');

  function task4_more(array $arr_one, array $arr_two):array {
    return array_intersect($arr_one, $arr_two);
  }

  echo '<pre>';
  print_r(task4_more([1,2,3,4,5,6,7,8], [5, 3, 6, 9, 11]));
  echo '</pre>';
  
  echo '<hr>';

  // Есть два массива с числовыми значениями одинаковой длины. Создайте третий массив с суммами элементов данных массивов. Например:  [12,4,0] + [8,7,6] = [20, 11, 6].

  echo $createTitle('Задача 5');

  function task5_more(array $arr_one, array $arr_two) {
    if (count($arr_one) !== count($arr_two)) return 'массивы разной длины';

    $arr_sum = [];

    for ($i = 0; $i < count($arr_one); $i++) {
      $arr_sum[] = $arr_one[$i] + $arr_two[$i];
    }

    return $arr_sum;
  }

  echo '<pre>';
  print_r( task5_more([12,4,0], [8,7,6]));
  echo '</pre>';
  
  echo '<hr>';


  // Поменяйте местами максимальный и минимальных элементы в массиве.

  echo $createTitle('Задача 6');

  function task6_more(array $arr):array {
   $max = max($arr);
   $min = min($arr);

   for ($i = 0; $i < count($arr); $i++) {
      switch ($arr[$i]) {
        case $max:
          $arr[$i] = $min;
        break;
        case $min:
          $arr[$i] = $max;
        break;
      }
   }

   return $arr;
  }

  echo '<pre>';
  print_r(task6_more([1000,5,26,7,2,9,1,22,33,4,5]));
  echo '</pre>';

  echo '<hr>';

  // Напишите функцию alpha_bet_order(str), которая возвращает переданную строку с буквами в алфавитном порядке. Пример строки: 'alphabetical'. Ожидаемый результат: 'aaabcehillpt'. Предположим, что символы пунктуации и цифры не включены в переданную строку.

  echo $createTitle('Задача 7');

  function alpha_bet_order(string $str) {
    $str = str_split($str);
    asort($str);
    return implode('', $str);
  }

  echo alpha_bet_order('alphabetical');
  
  echo '<hr>';

  // Напишите функцию find_longest_word(str), которая принимает строку в качестве параметра и находит самое длинное слово в строке.

  echo $createTitle('Задача 8');

  function find_longest_word(string $str):string {
    preg_match_all('/\b\w+\b/um', $str, $matches);
    
    $max = $matches[0][0];

    for ($i = 1; $i < count($matches[0]); $i++) {
      if (mb_strlen($matches[0][$i]) > mb_strlen($max)) $max  = $matches[0][$i];
    }

    return $max;
  }

  echo find_longest_word('упрощающая настройку хранилища с настройками по умолчанию. Позволяет автоматически комбинировать отдельные частичные редукторы (slice reducers), добавлять промежуточные слои или');
  
  echo '<hr>';


  // Создайте функцию "Калькулятор", calc(expression), которая должны уметь вычислять операции: сложение, вычитание, умножение, разность; между положительными целочисленными значениями. Математическое выражение должно передаваться через параметр expression в виде строки, например: "45+8", "4-23". Если параметр не передается, то нужно запросить выражение через input. Результат вычисления выведите через alert. Используйте регулярные выражения для "парсинг" (обработки) параметра).


  echo $createTitle('Задача  11');

  function task11_more($expression) {
    preg_match('/[\+\-\*\/]/', $expression, $operator);
    list($operator) = $operator;
    $operandA = +strstr($expression, $operator, true);
    $operandB = +substr($expression, mb_strpos($expression, $operator) + 1);
    
    switch ($operator) {
      case '+':
        return $operandA + $operandB;
      case '-':
        return $operandA - $operandB;
      case '*':
        return $operandA * $operandB;
      case '/':
        return round($operandA / $operandB, 2);
    }
  }

  echo task11_more('25 / 61');

  echo '<hr>';

  // Напиши функцию, которая будет проверять любой объем текста на вхождение плохих (запрещенных) слов, и возвращать новый, прошедший цензуру, текст. Запрещенные слова нужно заменить на символы "#" в зависимости от длины слова. В функцию нужно передавать два параметра: текст, массив запрещенных слов.

  echo $createTitle('Задача 12');

  function task12_more(string $str, $bad_words) {
    $arr = explode(' ', $str);

    foreach($arr as &$word) {
      
      foreach($bad_words as $bad_word) {
       if (mb_strpos($word, $bad_word) !== false) $word = preg_replace('/\w/u', '*', $word);
      }
      
    }

    return implode(' ', $arr);
  };

  echo task12_more('я блинский пошел в кино капец смотреть кино про Николая продуракковского', ['блин', 'капец', 'дурак']);

  echo '<hr>';
  ?>

</body>

</html>