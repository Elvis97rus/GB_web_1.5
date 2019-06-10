<?php
/*1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения.
 * Затем написать скрипт, который работает по следующему принципу:
если $a и $b положительные, вывести их разность;
если $а и $b отрицательные, вывести их произведение;
если $а и $b разных знаков, вывести их сумму;
Ноль можно считать положительным числом.
*/
//$a = 5;
//$b = 10;
//function firstTask($a,$b){
//    if ($a<0&&$b<0){
//        return $a - $b;
//    }elseif(!($a<0&&$b<0)){
//        return $a * $b;
//    }elseif ($a<0&&$b>-1 || $a>-1&&$b<0){
//        return $a + $b;
//    }
//}
//echo firstTask($a,$b);
/*
2. Присвоить переменной $а значение в промежутке [0..15].
С помощью оператора switch организовать вывод чисел от $a до 15.
*/
//$a = rand(0,15);
//switch ($a){
//    case 0:
//        echo $a++.PHP_EOL;
//    case 1:
//        echo $a++.PHP_EOL;
//    case 2:
//        echo $a++.PHP_EOL;
//    case 3:
//        echo $a++.PHP_EOL;
//    case 4:
//        echo $a++.PHP_EOL;
//    case 5:
//        echo $a++.PHP_EOL;
//    case 6:
//        echo $a++.PHP_EOL;
//    case 7:
//        echo $a++.PHP_EOL;
//    case 8:
//        echo $a++.PHP_EOL;
//    case 9:
//        echo $a++.PHP_EOL;
//    case 10:
//        echo $a++.PHP_EOL;
//    case 11:
//        echo $a++.PHP_EOL;
//    case 12:
//        echo $a++.PHP_EOL;
//    case 13:
//        echo $a++.PHP_EOL;
//    case 14:
//        echo $a++.PHP_EOL;
//    case 15:
//        echo $a++.PHP_EOL;
//}
/*
3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами.
Обязательно использовать оператор return.
*/
/**
 * Функция сложения
 * @param number $num1
 * @param number $num2
 * @return number
 */
function sum($num1,$num2){
    return $num1 + $num2;
}
/**
Функция вычитания
 * @param number $num1
 * @param number $num2
 * @return number
 */
function minus($num1,$num2){
    return $num1 - $num2;
}
/**
Функция умножения
 * @param number $num1
 * @param number $num2
 * @return number
 */
function mult($num1,$num2){
    return $num1 * $num2;
}
/**
Функция деления
 * @param number $num1
 * @param number $num2
 * @return number || undefined
 */
function div($num1,$num2){
    if ($num2)
        return $num1 / $num2;
    else
        echo "На ноль не делим!";
}
/*
4. Реализовать функцию с тремя параметрами:
function mathOperation($arg1, $arg2, $operation),
где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
В зависимости от переданного значения операции выполнить одну из арифметических операций
(использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
*/
/**
 * Функция деления
 * @param number $arg1
 * @param number $arg2
 * @param string $operation values - (сложение,вычитание,умножение,деление)
 * @return void
 */
function mathOperation($arg1, $arg2, $operation){
    switch ($operation){
        case 'сложение':
            echo sum($arg1, $arg2);
            break;
        case 'вычитание':
            echo minus($arg1, $arg2);
            break;
        case 'умножение':
            echo mult($arg1, $arg2);
            break;
        case 'деление':
            echo div($arg1, $arg2);
            break;
    }
}
//mathOperation(1,5,'деление');
/*
5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML-шаблон,
вывести текущий год в подвале при помощи встроенных функций PHP.
$currentYear = getdate()['year'];echo $currentYear; //делал к первому

6. *С помощью рекурсии организовать функцию возведения числа в степень.
Формат: function power($val, $pow), где $val – заданное число, $pow – степень.
*/
$inc = 0;
$number = 1;
function power($val, $pow){
    global $number;
    global $inc;
    if ($inc < $pow){
        $number *= $val;
        $inc++;
        power($val, $pow);
    }
    return $number;
}
/*
7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты*/