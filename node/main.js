const func = require('./func');
const os = require('os');
const fs = require('fs');

let users = [{name: 'ann', age: 20}];
let user1 = '{"name: "John", "age": 30"}';

// fs.writeFile('db.json', JSON.stringify(users),  (err)=> {
//     if (error){
//         console.log(err);
//     }
// });

fs.readFile('db.json', 'utf-8', (err,data)=>{
    if (err){
        console.log(error);
    } else {
        let users = JSON.parse(data);
        users.push(JSON.parse(users));
        fs.writeFile('db.json', JSON.stringify(users),  (err)=> {
    if (error){
        console.log(err);
    }
})
    }
});

// console.log(os.platform());
// console.log(os.cpus());
// console.log(os.type());
// // console.log(func(30));