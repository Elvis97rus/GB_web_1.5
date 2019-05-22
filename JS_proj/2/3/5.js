"use strict";

const arr = [
    [2, 4, 6],
    [1, 5, 10],
    [7, 4, 1],
];

let maxSumm = 0;
let minNum;
let arrId = 0;
for (let i = 0;i < arr.length;i++){
    let countTemp = 0;
    for (let j = 0;j < arr[i].length;j++){
        countTemp += arr[i][j];
    }
    if (countTemp > maxSumm) {
        maxSumm = countTemp;
        arrId = i;
    }
}
minNum = arr[arrId][0];
for (let i = 0;i < arr[arrId].length;i++){
    minNum = arr[arrId][i] < minNum ? arr[arrId][i] : minNum;
}
console.log(`${minNum} - минимальное значение найденное в массиве ${arrId+1}, у которого сумма всех
     чисел максимальна ${maxSumm}`);