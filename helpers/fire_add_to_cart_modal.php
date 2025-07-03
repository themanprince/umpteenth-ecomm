<script>
    function fire_add_to_cart_modal(product_id, product_name, product_image_url, product_price, product_description, product_quantity_avail, alert_sys) {
        alert_sys.fire({
            "title": `${product_name.toUpperCase()}`,
            "customClass":{
                "popup": "custom-swal-popup"
            },
            "html": `
                <style>
                    .custom-swal-popup {
                        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
                    }
                    
                    .swal2-container {
                        z-index: 999999 !important;
                    }
                </style>
                <div class="card text-start border-0" style="max-width: 100%;">
                    <img src="${product_image_url}" class="card-img-top rounded mb-2" alt="Image of ${product_name}" style="inline-size: 200px; block-size: 200px; display: block; margin: 0 auto;"/>
                    <div class="card-body p-0">
                        <h3 class="card-title mb-1 fw-bold">N${product_price}</h3>
                        <p class="card-text small mb-2" style="font-size: 14px;">${product_description}</p>
                        <input class="form-control small" type="number" id="quantity-to-buy" max="${product_quantity_avail}" ${(product_quantity_avail > 0)? 'focus' : 'disabled'} placeholder="${(product_quantity_avail > 0)? 'Enter Quantity to Purchase' : 'Not Available'}"/>
                    </div>
                </div>
            `,
            "showCancelButton": true,
            "confirmButtonText": "Add To Cart",
            "cancelButtonText": "Cancel",
            "focusConfirm": false,
            "preConfirm": () => {
                const qty = document.getElementById("quantity-to-buy").value;
                if(!qty || qty <= 0 || qty > product_quantity_avail) {
                    alert_sys.showValidationMessage("Please Enter a Valid Quantity. Quantity available for this product is " + product_quantity_avail);
                    return false;
                }
                return {qty};
            },
        }).then(result => {
            if(result.isConfirmed) {
                const product_quantity_purchased = result.value.qty;
                const product_details = {product_id, product_name, product_price, product_image_url, product_quantity_purchased, product_quantity_avail, product_description};
                if(sessionStorage.getItem("cart") == null)
                    sessionStorage.setItem("cart", JSON.stringify({}));
                
                const cart = JSON.parse(sessionStorage.getItem("cart"));

                if(cart[product_details.product_id]) {
                    const existing_qty_purchased = cart[product_details.product_id].product_quantity_purchased;
                    cart[product_details.product_id].product_quantity_purchased = String(parseInt(existing_qty_purchased) + parseInt(product_details.product_quantity_purchased || 1));
                } else {
                    cart[product_details.product_id] = {...product_details};
                }
                
                sessionStorage.setItem("cart", JSON.stringify(cart));
                

                document.getElementById("cart-icon")
                    .dispatchEvent(new Event("cartModified"));
                
            }
        });
        }
</script>