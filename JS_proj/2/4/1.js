"use strict";

/**
 * Функция создает из числа объект, разделяя его по разрядам(единицы, десятки, сотни).
 * @param {int} number
 */
function numToObj(number) {
    let razradFirst;
    let razradSecond;
    let razradThird;
    let obj;
    if (Number.isInteger(number) && number >= 0 && number < 1000) {
        razradFirst = number % 10;
        razradSecond = Math.floor(number / 10) % 10;
        razradThird = Math.floor(number / 100) % 10;
        obj={
            firstDigit : razradFirst,
            secondDigit : razradSecond,
            thirdDigit : razradThird,
        };
    } else {
        console.log("Input number [0..999]");
        obj={};
    }
    console.log(obj);
}
numToObj(-8);