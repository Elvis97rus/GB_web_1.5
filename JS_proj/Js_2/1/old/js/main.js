const products = [
{title: 'Notebook', price: 2000},
{title: 'Mouse', price: 22},
{title: 'Gamepad', price: 767},
{title: 'KeyBoard', price: 323},
];

const renderProduct = (title,price) =>{
  return `<div class="product-item">
            <h3>${title}</h3>
            <p>${price}</p>
          </div>`
};

const renderPage = list =>{
    const productList = list.map(item => renderProduct(item.title, item.price));
    document.querySelector('.products').innerHTML = productList;
};

renderPage(products);