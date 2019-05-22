"use strict";

let number = 0;
let arr = [];
while(number < 101){
    isPrimeNumber(number);
    number++;
}
for (let i = 0;i < arr.length;i++){
    console.log(`${arr[i]} `)
}

/**
 * Функция проверяет является ли число простым, если да - записывает его в массив arr
 * @param {int} number Число, которое проверяем.
 */
function isPrimeNumber(number) {
    let countDel = 0;
    if (number % number === 0) countDel++;
    for (let i = 1; i < arr.length; i++) {
        if (number % arr[i] === 0) {
            countDel++;
        }
    }
    if (countDel < 3) {
        arr.push(number);
    }
}