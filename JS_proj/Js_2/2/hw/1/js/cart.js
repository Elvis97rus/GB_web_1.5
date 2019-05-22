'use strict';

// 1.Добавьте пустые классы для Корзины товаров и Элемента корзины товаров.
//     Продумайте, какие методы понадобятся для работы с этими сущностями.
// 2.Добавьте для GoodsList метод, определяющий суммарную стоимость всех товаров.

class SingleProduct {
    constructor(title, price) {
        //заполнение свойств товара
        this.title = title;
        this.price = price;
    }
    render() {
        return `отрисовка разметки с данными`;
    }
}

class ProductList {
    constructor(){
        this.products = [];
        this.render()
    }
    getProducts(){
        this.products = [
            //заполняем список товаров
        ];
    }
    render(){
        //отрисовываем товары
    }

    totalPriceCount(){
        let totalPrice = 0;
        //суммируем все свойства "цена", у товаров в массиве
        return totalPrice;
    }
}

class ShoppingCart extends ProductList{

    addProduct(){
        //добавляем товар в корззину
        this.render();
    }

    removeProduct(){
        //убираем товар из корзины
    }
    // cartSummCount(){ этот метод есть в родительском классе
    //     //считаем итоговую сумму в корзине
    // }
    
    editProduct(){
        //редактируем количество товара в корзине
    }

    acceptPurchase(){
        //переходим к следующему шагу(заполнение личных данных для доставки)
    }

    denyPurchase(){
        //обнуляем корзину
    }
}