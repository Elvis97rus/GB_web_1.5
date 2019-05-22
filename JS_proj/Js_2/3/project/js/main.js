const API = 'https://raw.githubusercontent.com/GeekBrainsTutorial/online-store-api/master/responses';


function makeGETRequest(url,filename) {
    fetch(`${url}/${filename}`)
        .then(function(response) {
            return response.json();
        })
        .then(function(myJson) {
            console.log(myJson.contents);
        });
}
// makeGETRequest(API,'addToBasket.json');// добавить товар в корзину;
makeGETRequest(API,'getBasket.json');// содержимое корзины;


class ProductsList {
    constructor(){
        this.goods = [];
        this.goodsInCart = [];
        this.allProducts = [];
        this.init();
    }
    init(){
            this._getProducts();
    }

    _getProducts(){
        fetch(`${API}/catalogData.json`)
            .then(result => result.json())
            .then(data => {
                this.goods = [...data];
                this.render();
            })
            .catch(error => {
                console.log(error)
            });
    }

    render(){
        const block = document.querySelector('.products');
        this.goods.forEach(product => {
            const prod = new Product(product);
            this.allProducts.push(prod);
            block.insertAdjacentHTML('beforeend', prod.render())
        })
    }
    sumPrice(){
        return this.allProducts.reduce((accum, item) => accum += item.price, 0)
    }
    addToCart(id_product){
        for (let i = 0; i<this.allProducts.length;i++){
            if (this.allProducts[i].id_product===id_product)
            this.goodsInCart.push(this.allProducts[i]);
        }
    }

    removeFromCart(id_product){
        for (let i = 0; i<this.goodsInCart.length;i++){
            if (this.goodsInCart[i].id_product===id_product)
                this.goodsInCart.remove(this.allProducts[i]);
        }
    }
}

class Product {
    constructor(product, img = 'https://placehold.it/200x150'){
        this.product_name = product.product_name;
        this.price = product.price;
        this.id_product = product.id_product;
        this.img = img
    }
    render(){
        return `<div class="product-item">
                    <img src="${this.img}" alt="Some img">
                    <div class="desc">
                        <h3>${this.product_name}</h3>
                        <p>${this.price} $</p>
                        <button class="buy-btn" data-id="${this.id_product}">Купить</button>
                    </div>
                </div>`
    }
}


let products = new ProductsList();


// products.addToCart(123);
// console.log(products.sumPrice());

window.onload = () => {
    for(let button of document.querySelectorAll('.buy-btn'))
        button.addEventListener('click', (event) =>  console.log(event.target.dataset.id))
};


