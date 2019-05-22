const products = [
    {title: 'Notebook', price: 2000},
    {title: 'Mouse', price: 20},
    {title: 'Keyboard', price: 48},
    {title: 'Gamepad', price: 63},
    {title: 'Chair', price: 200},
    {title: 'Headphones', price: 413}
];


const renderProduct = (title, price = 0) => {
    return `<div class="product-item">
                <img src="img/prod.png" alt="">
                <h3>${title}</h3>
                <p>${price}</p>
                <button class="btn-cart add-prod" type="button">Добавить</button>
            </div>`
};

const renderPage = list => {
    document.querySelector('.products').innerHTML  = (list.map(item => renderProduct(item.title, item.price))).join('');
};

renderPage(products);