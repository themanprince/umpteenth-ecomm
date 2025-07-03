<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            require_once("title-and-meta.php");
        ?>
    </head>
    <body>
        <?php require_once("components/new-navbar.php"); ?>
        
        <div class="container py-4">
            <h4>Your Cart</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="cart-items">
                </tbody>
            </table>
            <div class="text-end fw-bold" id="cart-total"></div>
            <form id="checkout-form" style="display: none">
                <div class="p-3 border rounded row">
                    <div class="col-6 col-sm-6 col-md-3">
                        <label for="customer-name">Full Name</label>
                        <input type="text" id="customer-name" placeholder="Full Name" class="form-control" required />
                    </div>
                    <div class="col-6 col-sm-6 col-md-3">
                        <label for="customer-phone-number">Phone Number</label>
                        <input type="text" id="customer-phone-number" placeholder="Phone Number" class="form-control" required />
                    </div>
                    <div class="col-6 col-sm-6 col-md-3">
                        <label for="customer-addres">Delivery Address</label>
                        <input type="text" id="customer-address" placeholder="Your Address" class="form-control" required />
                    </div>
                    <div class="col-6 col-sm-6 col-md-3">
                        <label for="customer-email">Email Address</label>
                        <input type="email" id="customer-email" placeholder="Enter Your Email" class="form-control" required />
                    </div>                
                    
                </div>
                <button id="checkout-btn" class="text-end btn btn-dark text-light">Checkout Cart</button>
            </form>
        </div>
        
        <script src="../lib/js/sweetalert.js"></script>
        <script src="../lib/js/paystack-inline.js"></script>
        <?php require_once("../helpers/Cart.php"); ?>
        <script>
            const cart = getCart();

            let total = 0, cartTemplate = '';
            
            const cart_keys = Object.keys(cart);

            cart_keys.forEach(key => {
                const item = cart[key];

                const item_total = (item.product_quantity_purchased * item.product_price) || null;
                total += item_total;

                cartTemplate += `
                    <tr>
                        <td><img src="${item.product_image_url}" width="50"/> ${item.product_name}</td>
                        <td>${item.product_quantity_purchased}</td>
                        <td>N${item.product_price}</td>
                        <td>N${item_total}</td>
                    </tr>
                `;
                
            });

            document.getElementById("cart-items").innerHTML = (cart_keys.length > 0) ? cartTemplate : `<b class="text-center fw-bold h5">No Item in Cart</b>`;
            document.getElementById("cart-total").innerText = "Total: N" + total;
            const checkout_btn = document.getElementById("checkout-btn"),
                checkout_form = document.getElementById("checkout-form");
            
            checkout_form.addEventListener("submit", e => e.preventDefault());

            checkout_btn.addEventListener("click", async (e) => {
                checkout_btn.innerHTML = `<img src="../icons/ajax-loader.gif" alt="...loading..."/>`;

                const getVal = (id) => document.getElementById(id).value;
                const customer_name = getVal("customer-name"), customer_phone_number = getVal("customer-phone-number"), customer_address = getVal("customer-address"), customer_email = getVal("customer-email");
                const amount = String(total) + "00";
                

                const payload = {
                    "cart": getCartProductsList(),
                    customer_name, customer_phone_number, customer_address, customer_email, amount
                };         
                
                console.log("got here, cart in payload is", payload.cart);

                const response = await fetch('../controllers/checkout-order.php', {
                    "method": "POST",
                    "headers": {"Content-Type": "application/json"},
                    "body": JSON.stringify(payload)
                });

                const responseText = await response.text();
                
                const {access_code} = JSON.parse(responseText);

                const popup = new PaystackPop();
                popup.resumeTransaction(access_code);
                
                checkout_btn.innerHTML = "Checkout Cart";
            });

            if(cartLength() > 0)
                checkout_form.style.display = "block";

        </script>
    </body>
    </html>