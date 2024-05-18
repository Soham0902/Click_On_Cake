let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');

openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
})

let products = [
    {
        id: 1,
        name: 'Dark Forest- 1kg',
        image: 'cake.jpg',
        price: 850
    },
    {
        id: 2,
        name: 'Oreo cake -1kg',
        image: 'cakeoreo.jpg',
        price: 500
    },
    {
        id: 3,
        name: 'Double Decker- 2kg',
        image: 'cake2.jpg',
        price: 1500
    },
    {
        id: 4,
        name: 'White Forest- 2kg',
        image: 'cake4.jpg',
        price: 1200
    },
    {
        id: 5,
        name: 'Ice Cake - 1kg',
        image: 'cake3.jpg',
        price: 1600
    },
    {
        id: 6,
        name: 'Decorative Cake - 1kg',
        image: 'deco_Cake.jpg',
        price: 1000
    },
    {
        id: 7,
        name: 'Barbie Cake  - 1/2 kg',
        image: 'barbi.jpeg',
        price: 900
    },
    {
        id: 8,
        name: 'Butterscotch cake - 1kg',
        image: 'butterscoch.jpg',
        price: 850
    },
    {
        id: 9,
        name: 'Dry fruits cake - 1kg',
        image: 'dryfruits.jpg',
        price: 1000
    }
];
let listCards  = [];
function initApp(){
    products.forEach((value, key) =>{
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
            <img src="image/${value.image}">
            <div class="title">${value.name}</div>
            <div class="price">${value.price.toLocaleString()}</div>
            <button onclick="addToCard(${key})">Add To Card</button>`;
        list.appendChild(newDiv);
    })
}
initApp();
function addToCard(key){
    if(listCards[key] == null){
        // copy product form list to list card
        listCards[key] = JSON.parse(JSON.stringify(products[key]));
        listCards[key].quantity = 1;
    }
    reloadCard();
}
function reloadCard(){
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCards.forEach((value, key)=>{
        totalPrice = totalPrice + value.price;
        count = count + value.quantity;
        if(value != null){
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><img src="image/${value.image}"/></div>
                <div>${value.name}</div>
                <div>${value.price.toLocaleString()}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>`;
                listCard.appendChild(newDiv);
        }
    })
    total.innerText = totalPrice.toLocaleString();
    quantity.innerText = count;
    gettotalprice(totalPrice);
}
function changeQuantity(key, quantity){
    if(quantity == 0){
        delete listCards[key];
    }else{
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price;
    }
    reloadCard();
}
function gettotalprice(total) {
    document.getElementById(amount).value = total;
}




