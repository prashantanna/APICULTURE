function deleteitem(removetag)
{
    let CartItems = localStorage.getItem('productsInCart');
    CartItems = JSON.parse(CartItems);
    var removeIndex = CartItems.map((item => item.tag).indexOf(removetag));
    // Delete itemIndex element from the array
    CartItems.splice(removeIndex, 1);
    localStorage.setItem('productsInCart', JSON.stringify(CartItems));
    displayCart();
}

function displayCart(){
    let CartItems = localStorage.getItem('productsInCart');
    CartItems = JSON.parse(CartItems);
     
    let products_Container = document.querySelector(".products-show");
    let cartcost = localStorage.getItem('totalCartCost');
    if(CartItems && products_Container){
        
        products_Container.innerHTML = '';
        Object.values(CartItems).map(item =>{
            products_Container.innerHTML +=`
            <div class="products-show">
            <div class="products-title">
                <ion-icon name ="close-circle" ></ion-icon>
                <img src="IMG/${item.tag}.jpg">
                <span>${item.name}</span>
            </div>
            <div class="products-price">$${item.price}</div>    
            <div class="products-quantity"> 
                <span>${item.inCart}</span>
            </div>
            <div class="products-total">$${item.inCart * item.price}</div>
            </div>
            `;
        });

        products_Container.innerHTML += `
        <div class="basketTotalContainer">
            <h4 class="basketTotalTitle">Cart Total</h4>
            <h4 class="basketTotal">$${cartcost}</h4>
            <button  id="clear" class="btn-primary" style="color: yellow; font-size:10px; " onclick="clearStorage()">Remove All Items</button>
        `;
    }else{
        console.log("Not Running");
    }
}

function clearStorage()
{
    console.log('Clearing the storage');
    localStorage.clear();
    displayCart();
}

displayCart();