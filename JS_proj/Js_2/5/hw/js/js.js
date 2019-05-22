'use strict';

const API = 'https://raw.githubusercontent.com/GeekBrainsTutorial/online-store-api/master/responses';

let app = new Vue({
    el:'#app',
    data: {
        catalogUrl: '/catalogData.json',
        products: [],
        filtered: [],
        cartList: [],
        noGoodsTpl: `<p>«Нет данных»</p>`,
        imgCatalog: 'https://placehold.it/200x150',
        searchLine: '',
        isVisibleCart: false,
        block: document.querySelector(`.cart-list`),
    },
    computed:{

    },
    methods: {
        getJson(url){
            return fetch(url)
                .then(result => result.json())
                .catch(error => {
                    console.log(error)
                })
        },
        addProduct(product){
            if (this.cartList.length===0){
            this.cartList.push({
                product_name: product.product_name,id_product: product.id_product, price: product.price, quantity: 1});
            }else{
                let isNew = true;
                for (let el of this.cartList){
                    if (el.id_product === product.id_product){
                        isNew = false;
                        el.quantity++;
                        break;
                    }
                }
                if (isNew)
                this.cartList.push(
                    {product_name: product.product_name,id_product: product.id_product, price: product.price, quantity: 1}
                );
            }
            console.log(product.id_product,this.cartList);
        },
        filterGoods(searchLine){
            const regexp = new RegExp(searchLine, 'i');
            this.filtered = this.products.filter(product => regexp.test(product.product_name));
            for (let product of this.products){
                const block = document.querySelector(`.product-item[id="${product.id_product}"]`);
                if(!this.filtered.includes(product)){
                    block.classList.add('invisible');
                } else {
                    block.classList.remove('invisible');
                }
            } 
        },
        cartVisibility(){
            this.isVisibleCart = !this.isVisibleCart;
            // if (this.isVisibleCart){
            //     this.block.classList.remove('invisible');
            // } else {
            //     this.block.classList.add('invisible');
            // }

            // if (this.cartList.length<1){
            //     block.insertAdjacentHTML("beforeend",this.noGoodsTpl);
            // }
        }

    },
    mounted(){
        this.getJson(`${API + this.catalogUrl}`)
            .then(data => {
                for(let el of data){
                    this.products.push(el);
                }
            });
        this.getJson(`getProducts.json`)
            .then(data => {
                for(let el of data){
                    this.products.push(el);
                }
            });
    },
});

console.log(app);