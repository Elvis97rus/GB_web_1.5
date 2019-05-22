Vue.component('products', {
    props: ['products', 'img'],
    template: `<div class="products">
            <product 
            v-for="product of products" 
            :key="product.id_product"
            :img="img"
            :product="product"></product>
        </div>`
});

Vue.component('product', {
    props: ['product', 'img'],
    template: `<div class="product-item" >
                <img :src="img" alt="Some img">
                <div class="desc">
                    <h3>{{ product.product_name }}</h3>
                    <p>{{ product.price }} $</p>
                    <button class="buy-btn" @click="$parent.$emit('add-product', product)">Купить</button>
                </div>
            </div>`
});

Vue.component('search', {
    props:['inputValue'],
    // data(){ не понял в каких случаях может потребоваться в компоненте эта часть ("data(){}")
    //     return {search: 'userSearch'};
    // },
    template: `
            <form action="#" class="search-form" @submit.prevent="$emit('filter',inputValue)">
             <input type="text" class="search-field" v-bind:value="inputValue" 
             v-on:input="$emit('input', $event.target.value)">
<!--                <input type="text" class="search-field" v-model="userSearch">-->
                <button class="btn-search" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
    `,
});

Vue.component('errMsg',{
    props:['message'],
    template:`<p>{{ message }} $</p>`,
});