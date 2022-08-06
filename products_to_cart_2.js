carts = document.querySelectorAll('.add_to_cart');

products = [
    {
        name: 'Honey Face Cream', tag : 'pro9' , price:20.77 , inCart : 0 
    },
    {
        name: 'Honey Jam', tag : 'pro10' , price:15.85 , inCart : 0 
    },
    {
        name: 'Forest Honey', tag : 'pro11' , price:10.67 , inCart : 0 
    },
    {
        name: 'Honey Comb', tag : 'pro12' , price:20.99 , inCart : 0 
    },
    {
        name: 'Wild Forest Honey', tag : 'pro13' , price:15.88 , inCart : 0 
    },
    {
        name: 'Honey Bee', tag : 'pro14' , price:12.90 , inCart : 0 
    },
    {
        name: 'Meadow Honey', tag : 'pro15' , price:15.10 , inCart : 0 
    },
    {
        name: 'Organic Honey', tag : 'pro16' , price:15.11 , inCart : 0 
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
