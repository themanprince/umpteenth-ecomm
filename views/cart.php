<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include("title-and-meta.php");
        ?>
    </head>
    <body>
        <div class="container py-4">
            <h4>Your Cart</h4>
            <table class="table">
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
        </div>
        
        <script>
            const cart = JSON.parse(sessionStorage.getItem('cart') || "[]");
            let total = 0, cartTemplate = '';
            
            cart.forEach(item => {
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

            document.getElementById("cart-items").innerHTML = cartTemplate || `<b class="text-center fw-bold h5">No Item in Cart</b>`;
            document.getElementById("cart-total").innerText = "Total: N" + total;
        </script>
    </body>
    </html>