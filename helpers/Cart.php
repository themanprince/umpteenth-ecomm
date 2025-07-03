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
</script>