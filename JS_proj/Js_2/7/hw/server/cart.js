// const moment = require('moment');
// const fs = require('fs');
const loging = require('./log');
// function log(){
//     return console.log('add',req.body.product_name, moment().format('MMMM Do YYYY, h:mm:ss a'));
// };

let add = (cart, req) => {
  cart.contents.push(req.body);
  loging.log('add to cart ',req.body.product_name);
  // console.log('add to cart ',req.body.product_name, moment().format('MMMM Do YYYY, h:mm:ss a'));
  return JSON.stringify(cart, null, 4);
};
let change = (cart, req) => {
  let find = cart.contents.find(el => el.id_product === +req.params.id);
  // console.log('change(+1) ',find.product_name, moment().format('MMMM Do YYYY, h:mm:ss a'));
   loging.log('change(+1) ',find.product_name);
  find.quantity += req.body.quantity;
    return JSON.stringify(cart, null, 4);
};
let remove = (cart, req) => {
    let find = cart.contents.find(el => el.id_product === +req.params.id);
    if (find.quantity>1){
        find.quantity -= req.body.quantity;
    } else{
        cart.contents.splice(cart.contents.indexOf(find), 1);
        // cart.contents.removeItem(find);
        //this.cartItems.splice(this.cartItems.indexOf(product), 1);
    }
    // console.log('remove(-1) ',find.product_name, moment().format('MMMM Do YYYY, h:mm:ss a'));
    loging.log('remove(-1) ',find.product_name);
    return JSON.stringify(cart, null, 4);
};

module.exports = {
    add,
    change,
    remove
};