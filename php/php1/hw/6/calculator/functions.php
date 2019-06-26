<?php
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
 * @return number || string
 */
function div($num1,$num2){
    if ($num2)
        return $num1 / $num2;
    else
        return "На ноль не делим!";
}
/**
 * Функция деления
 * @param number $arg1
 * @param number $arg2
 * @param string $operation values - (сложение,вычитание,умножение,деление)
 * @return number | string
 */
function mathOperation($arg1, $arg2, $operation){
    switch ($operation){
        case "plus":
            return sum($arg1, $arg2);
            break;
        case 'minus':
            return minus($arg1, $arg2);
            break;
        case 'multiply':
            return mult($arg1, $arg2);
            break;
        case 'divide':
            return div($arg1, $arg2);
            break;
    }
}