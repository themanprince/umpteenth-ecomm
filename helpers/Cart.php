<script>
    function addToCart(product_details) {
        if(sessionStorage.getItem("cart") == null)
            sessionStorage.setItem("cart", JSON.stringify({}));
            
        cart = JSON.parse(sessionStorage.getItem("cart"));   

        if(cart[product_details.product_id]) {
            const existing_qty_purchased = cart[product_details.product_id].product_quantity_purchased;
            cart[product_details.product_id].product_quantity_purchased = String(parseInt(existing_qty_purchased) + parseInt(product_details.product_quantity_purchased || 1));
        } else {
            cart[product_details.product_id] = {...product_details};
        }
        
        sessionStorage.setItem("cart", JSON.stringify(cart));
    }

    function cartLength() {
        return (Object.keys(JSON.parse(sessionStorage.getItem("cart")) || {})).length;
    }
</script>