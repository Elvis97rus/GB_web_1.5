const moment = require('moment');
const fs = require('fs');


let log = (action,product)=>{
    let a=[];
    fs.readFile('server/stats.json', 'utf-8', (err, data) => {
        if (!err) {
            a = JSON.parse(data);
        }
        a.push({action: action, product: product, time: moment().format('MMMM Do YYYY, h:mm:ss a')});
        fs.writeFile('server/stats.json', JSON.stringify(a,null,4), (err) => {console.log(err) })
    });

    // fs.appendFile( 'stats.json',`${action + product + moment().format('MMMM Do YYYY, h:mm:ss a')}`);
    // console.log(`${action + product + moment().format('MMMM Do YYYY, h:mm:ss a')}`);
    // logBase.push({action: action, product: product, time: moment().format('MMMM Do YYYY, h:mm:ss a')});
    // a.push(JSON.stringify({action: action, product: product, time: moment().format('MMMM Do YYYY, h:mm:ss a')},null,4));
    // fs.appendFile('server/stats.json', a, err => console.log(err));
    // fs.appendFile( './stats.log',3);
    // console.log(logBase);
};

module.exports ={
  log
};