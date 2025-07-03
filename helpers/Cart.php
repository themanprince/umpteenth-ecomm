<script>
    function getCart() {
        if(sessionStorage.getItem("cart") == null)
            sessionStorage.setItem("cart", JSON.stringify({}));
            
        return JSON.parse(sessionStorage.getItem("cart"));   
    }

    function addToCart(product_details) {
        const cart = getCart();

        if(cart[product_details.product_id]) {
            const existing_qty_purchased = cart[product_details.product_id].product_quantity_purchased;
            cart[product_details.product_id].product_quantity_purchased = String(parseInt(existing_qty_purchased) + parseInt(product_details.product_quantity_purchased || 1));
        } else {
            cart[product_details.product_id] = {...product_details};
        }
        
        sessionStorage.setItem("cart", JSON.stringify(cart));
    }

    function cartLength() {
        const cart = getCart();
        return Object.keys(getCart()).length;
    }

    function getQtyOfItemPurchased(product_id) {
        const product = (getCart())[product_id];
        if (product)
            return parseInt(product.product_quantity_purchased);

        return 0;
    }

    function getCartProductsList() { 
        //before the cart was implemented as a dictionary data structure, it was originally an array and was sent to the backend like that as JSON
        //this function serves to convert the cart data structure to this old form, in order for easy sending to the backend
        const cart = getCart();
        const keys = Object.keys(cart);
        return keys.map(key => cart[key]);
    }
</script>