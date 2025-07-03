<?php include("Cart.php"); ?>
<script>
function handle_cart_notification_icon() {
    if(cartLength() > 0)
        document.getElementById("cart-notification-icon")
            .style.display = "block";
    else
        document.getElementById("cart-notification-icon")
            .style.display = "none";
}

handle_cart_notification_icon();

const cart_icon = document.getElementById("cart-icon");

cart_icon.addEventListener("cartModified", e => {
    handle_cart_notification_icon();
});
</script>