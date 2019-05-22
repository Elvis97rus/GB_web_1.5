
class Hamburger {
    hamburgerDB ={
        big:{
            price:100, kkal:40
        },
        small:{
            price:50, kkal:20
        },
        wCheese:{ price:10, kkal:20},
        wSalad:{ price:20, kkal:5},
        wPotato:{ price:15, kkal:10},
        wSpiceTopping:{ price:15, kkal:10},
        wSauceTopping:{ price:20, kkal:0},
    };

    constructor(size, stuffing, topping = []) {
        this.size = size;
        this.stuffing = stuffing;
        this.topping = topping;
    }
    addTopping(topping) {    // Добавить добавку
        this.topping.push(topping);
    }
    removeTopping(topping) { // Убрать добавку
        if (this.topping.includes(topping)){
            this.topping.remove(topping);
        }
    }
    getToppings(topping) {   // Получить список добавок
        this.topping.forEach(type => console.log(type));
    }
    getSize() {              // Узнать размер гамбургера
        return this.size;
    }
    getStuffing() {          // Узнать начинку гамбургера
        return this.stuffing;
    }
    calculatePrice() {       // Узнать цену

    }
    calculateCalories() {    // Узнать калорийность
    }
}
let hamburger = new Hamburger(Hamburger.hamburgerDB.big, Hamburger.hamburgerDB.wPotato);
console.log(hamburger);
