"use strict";

const shoppingCart = {
    totalPriceId: document.getElementById('total-price'),
    totalQuantityId: document.getElementById('cart-count'),
    shopContainer: document.getElementById('container'),
    shopButtons: document.querySelectorAll('.buy-btn'),
    cartList: 'cart-list',
    totalPrice: 0,
    totalQuantity: 0,
    productArray:[],

    //обработка наличия кнопок, проставка евент листнеров на них, создание ячеек для вывода в листе корзины
    init(){
        this.buttonEventHandler();
        this.fillTheproductArray();
        this.fillCartList();
    },

    //проставка евент листнеров на кнопки
    buttonEventHandler(){
        for(let button of this.shopButtons)
            button.addEventListener('click', event => this.addProduct(event.target.dataset.name));
        },

    //заполнение массва элементами товара по дата-сету - названию
    fillTheproductArray(){
        for(let button of this.shopButtons){
           this.productArray.push({name:button.dataset.name,count:0,price:button.dataset.price});
        }
    },
    //создание блоков для карт-листа
    fillCartList(){
        for(let product of this.productArray){
            document.getElementById(this.cartList).appendChild(this.createProductLine(product.name));
        }
    },

    //счетчик увеличения кол-ва товара при клике
    addProduct(productName){
        for (let product of this.productArray){
            if(product.name === productName){
                product.count++;
            }
        }
        this.productListRender();
    },

    productListRender(){
        let cartList = document.getElementById(this.cartList);
      //если значение count в массиве productArray >0 выводим элемент массива
        for (let product of this.productArray){
            if(product.count > 0){
                for (let i = 0; i < cartList.children.length; i++) {
                    if (cartList.children[i].dataset.name === product.name){
                        cartList.children[i].innerText = `${product.name} - ${product.count}`;
                    }
                }
            }
        }
        this.totalQnPCount();
        this.cartSummRender();
    },

    //счетчик общих значений количества и стоимости
    totalQnPCount(){
        let a=0;
        let b=0;
        for (let product of this.productArray){
            if(product.count > 0){
                a += product.count;
                b += product.count*product.price;
            }
        }
        this.totalQuantity = a;
        this.totalPrice = b;
    },

    //отображение общих значений количества и стоимости
    cartSummRender(){
        this.totalPriceId.innerText = this.totalPrice;
        this.totalQuantityId.innerText = this.totalQuantity;
    },

    //создаем линию товара в корзине
    createProductLine(name) {
        const singleProdContainer = document.createElement('div');
        singleProdContainer.dataset.name = name;

        return singleProdContainer;
    },
};
window.onload = () => shoppingCart.init();