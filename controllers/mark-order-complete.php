<?php
    require("../database.php");

    $db = new Database;
    $order_id = $_GET["order_id"];

    $db -> db_update("orders", array("is_completed" => "1"), "order_id = $order_id");
?>
<!DOCTYPE html>
<html lang="en">
    <head></head>
    <body>
        <script src="../lib/js/sweetalert.js"></script>
        <script>
            Swal.fire("Done").then(result => window.location.href="../views/order-view.php");
        </script>
    </body>
</html>