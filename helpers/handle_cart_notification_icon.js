function handle_cart_notification_icon() {
    const length_of_cart = (JSON.parse(sessionStorage.getItem("cart")) || []).length;
    if(length_of_cart > 0)
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

console.log("In handle_cart_notification_icon, cart-icon is ", document.getElementById("cart-icon"));