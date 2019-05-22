"use strict";

let i = 0;
do
    if(i === 0){
        console.log(`${i} - это ноль`);
        i++;
    } else if (i % 2 === 0){
        console.log(`${i} - это четное число`);
        i++;
    } else {
        console.log(`${i} - это нечетное число`);
        i++;
    }
while (i <= 10);