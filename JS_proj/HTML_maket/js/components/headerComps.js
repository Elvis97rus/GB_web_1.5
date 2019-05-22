Vue.component('headcomp',{
    template:`
<header class="header">
    <div class="container header-flex">
        <div class="header-left">
            <a class="logo" href="index.html">
                <img class="logo-image" src="img/logo.png" alt="logo">
                BRAN<span class="logo-d">D</span></a>
            <form class="form" action="#">
                <div class="button-browse"><a href="#" class="button-browse-link">Browse <span
                        class="fa fa-sort-desc browse-list">
                            </span></a>
                    <div class="drop-down">
                        <div class="drop-down-flex">
                            <h3 class="drop-h3 down-color-h3">Women</h3>
                            <ul class="drop-ul">
                                <li class="drop-list"><a href="product.html" class="drop-link down-color"> Dresses</a>
                                </li>
                                <li class="drop-list"><a href="product.html" class="drop-link down-color"> Tops</a></li>
                                <li class="drop-list"><a href="product.html" class="drop-link down-color">
                                    Sweaters/Knits</a></li>
                                <li class="drop-list"><a href="product.html" class="drop-link down-color">
                                    Jackets/Coats</a></li>
                                <li class="drop-list"><a href="product.html" class="drop-link down-color"> Blazers</a>
                                </li>
                                <li class="drop-list"><a href="product.html" class="drop-link down-color"> Denim</a>
                                </li>
                                <li class="drop-list"><a href="product.html" class="drop-link down-color">
                                    Leggins/Pants</a></li>
                                <li class="drop-list"><a href="product.html" class="drop-link down-color">
                                    Skirts/Shorts</a></li>
                                <li class="drop-list"><a href="product.html" class="drop-link down-color">
                                    Accersories</a></li>
                            </ul>
                            <h3 class="drop-h3 down-color-h3">Men</h3>
                            <ul class="drop-ul">
                                <li class="drop-list"><a href="product.html" class="drop-link down-color"> Tees/Tank
                                    tops</a></li>
                                <li class="drop-list"><a href="product.html" class="drop-link down-color">
                                    Shirts/Polos</a></li>
                                <li class="drop-list"><a href="product.html" class="drop-link down-color"> Sweaters</a>
                                </li>
                                <li class="drop-list"><a href="product.html" class="drop-link down-color">
                                    Sweatshirts/Hoodies</a>
                                </li>
                                <li class="drop-list"><a href="product.html" class="drop-link down-color"> Blazers</a>
                                </li>
                                <li class="drop-list"><a href="product.html" class="drop-link down-color">
                                    Jackets/vests</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <input class="user-text-find" type="text" placeholder="Search for item...">
                <button class="button-find" type="submit"><span class="fa fa-search"></span></button>
            </form>
        </div>
        <div class="header-right">
            <div class="cart-block">
                <a href="#">
                    <div class="cart"></div>
                </a>
                <div class="drop-cart">
                    <div class="cart-box">
                        <div class="cart-product">
                            <div class="cart-product-decript">
                                <a href="single.html">
                                    <div class="cart-product-img cart-product-1"></div>
                                </a>
                                <div class="cart-pos-text"><a href="single.html" class="cart-product-name">Rebox
                                    Zane</a>
                                    <p class="cart-box-stars"><span class="fas fa-star"></span><span
                                            class="fas fa-star"></span><span class="fas fa-star"></span><span
                                            class="fas fa-star"></span><span class="fas fa-star-half-alt"></span>
                                    </p>
                                    <p class="cart-box-pos">1 <span class="cart-box-pos-x">x</span> $250</p>
                                </div>
                            </div>
                            <a href="#" class="cart-box-delete"><span class="far fa-times-circle"></span></a>
                        </div>
                        <div class="cart-product">
                            <div class="cart-product-decript">
                                <a href="single.html">
                                    <div class="cart-product-img cart-product-2"></div>
                                </a>
                                <div class="cart-pos-text"><a href="single.html" class="cart-product-name">Rebox
                                    Zane</a>
                                    <p class="cart-box-stars"><span class="fas fa-star star-hover"></span><span
                                            class="fas fa-star"></span><span class="fas fa-star star-hover"></span><span
                                            class="fas fa-star"></span><span
                                            class="fas fa-star-half-alt star-hover"></span>
                                    </p>
                                    <p class="cart-box-pos">1 <span class="cart-box-pos-x">x</span> $250</p>
                                </div>
                            </div>
                            <a href="#" class="cart-box-delete">
                                <span class="far fa-times-circle"></span>
                            </a>
                        </div>
                        <div class="cart-total">
                            <div class="cart-total-text">TOTAL</div>
                            <div class="cart-total-price">$500.00</div>
                        </div>
                        <div class="cart-button-block"><a href="checkout.html"
                                                          class="cart-button cart-passive">Checkout</a></div>
                        <div class="cart-button-block"><a href="cart.html" class="cart-button cart-active">Go
                            to cart</a></div>
                    </div>
                </div>
            </div>
            <a class="button" href="#">My Account<span class="my-acc-sym fa fa-sort-desc browse-list">
                            </span></a>
        </div>
    </div>
</header>
`,

});
//
// Vue.component('filter',{});
// Vue.component('cart', {});