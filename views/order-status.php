<?php require_once("../helpers/Cart.php"); ?>

<!DOCTYPE html>
<html lang="en">
    <head></head>
    <body>
        <script src="../lib/js/sweetalert.js"></script>
        <script>
            Swal.fire({
                "icon": "success",
                "text": "Order Made Successfully"
            }).then(() => {
                clearCart();
                window.location.href = "customer-home.php";
            });
        </script>
    </body>
</html>