let carts = document.querySelectorAll('.add_to_cart');

let products = [
    {
        name: 'Pure Flower Honey', tag : 'pro1' , price:9.63 , inCart : 0 
    },
    {
        name: 'Rain Forest Honey', tag : 'pro2' , price:9.87 , inCart : 0 
    },
    {
        name: 'Orange Blossom', tag : 'pro3' , price:9.67 , inCart : 0 
    },
    {
        name: 'Manuca Tea Honey', tag : 'pro4' , price:11.28 , inCart : 0 
    },
    {
        name: 'Dark Honey', tag : 'pro5' , price:9.63 , inCart : 0 
    },
    {
        name: 'Clover Honey', tag : 'pro6' , price:9.69 , inCart : 0 
    },
    {
        name: 'Musturd Flower Honey', tag : 'pro7' , price:7.73 , inCart : 0 
    },
    {
        name: 'Black Seed Honey', tag : 'pro8' , price:8.47 , inCart : 0 
    },
]

function setItems_for_Cart(products){
    let CartItems = localStorage.getItem('productsInCart');
    CartItems = JSON.parse(CartItems);
    
    if(CartItems!= null){
        if(CartItems[products.tag] == undefined){
            CartItems = {
                ...CartItems,
                [products.tag] : products
            }
        }
        CartItems[products.tag].inCart +=1;
    }else{
        products.inCart = 1;
        CartItems = {[products.tag]: products }
    }
    localStorage.setItem("productsInCart",JSON.stringify(CartItems))
}


function ShopCartNumbers(products){
    let CartProductNumbers = localStorage.getItem('ShopCartNumbers');

    CartProductNumbers = parseInt(CartProductNumbers);

    if(CartProductNumbers)
    {
        localStorage.setItem('ShopCartNumbers',CartProductNumbers +1);
        document.querySelector('.cart span').textContent = CartProductNumbers + 1;
    }
    else{
        localStorage.setItem('ShopCartNumbers', 1);
        document.querySelector('.cart span').textContent = 1;
    }

    setItems_for_Cart(products);
}

function totalCartCost(products){
    let cartcost = localStorage.getItem('totalCartCost');

    console.log("My Cart value is",cartcost);

    if(cartcost != null){
        cartcost = parseInt(cartcost);
        localStorage.setItem("totalCartCost",cartcost + products.price)
    }
    else{
        localStorage.setItem("totalCartCost",products.price);
    }
}

for(let i=0; i< carts.length; i++)
{
    carts[i].addEventListener('click',() =>{
        ShopCartNumbers(products[i]);
        totalCartCost(products[i]);
    })
}

function onLoadCartNumbers()
{
    let CartProductNumbers = localStorage.getItem('ShopCartNumbers');

    if(CartProductNumbers)
    {
        document.querySelector('.cart span').textContent = CartProductNumbers;
    }
}

onLoadCartNumbers();
