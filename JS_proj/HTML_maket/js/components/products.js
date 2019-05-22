Vue.component('products', {
    data(){
        return {
            filtered: [],
            productsMain: [],
            imgCatalog: 'https://placehold.it/200x150',
            catalogUrl: '/catalogData.json'
        }
    },
    mounted(){
        this.$parent.getJson(`js/getProducts.json`)
            .then(data => {
                for(let el of data){
                    this.productsMain.push(el);
                    this.filtered.push(el);
                }
            });
    },
    methods: {
        filter(value){
            let regexp = new RegExp(value, 'i');
            this.filtered = this.productsMain.filter(el => regexp.test(el.product_name));
        }
    },
    template: `
    
    <div class="container product-flex">
         <product 
        v-for="product of productsMain" 
        :key="product.id_product"
        :product="product"
        :name="product.product_name"
        :price="product.price"
        ></product>        
    </div>
   `
});

Vue.component('product', {
    props: ['product'],
    template: `
        <div class="product">
            <a href="product.html"><img class="product-img" :src="product.image_src" alt="photo product"></a>
            <div class="product-text"><a href="#" class="product-name product-name_bottom">{{ product.product_name }}</a>
                <p class="product-price">$ {{ product.price }}.00</p>
                <a class="product-add" href="cart.html">
                    <img src="img/products/add-to-cart.svg" alt="add" class="product-add__img">Add
                    to cart</a>                  
            </div>
        </div>
`
});