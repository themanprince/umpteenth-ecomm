<?php
    require("../database.php");
    $db = new Database;

    $data = json_decode(file_get_contents("php://input"), true);

    $order_info = array();
    $order_info["customer_name"] = $data["customer_name"];
    $order_info["customer_address"] = $data["customer_address"];
    $order_info["customer_email"] = $data["customer_email"];
    $order_info["customer_phone_number"] = $data["customer_phone_number"];


    $order_id = $db -> db_insert("orders", $order_info);

    foreach($data["cart"] as $product) {
        $payload = array();
        $payload["order_id"] = $order_id;
        $payload["product_id"] = $product["product_id"];
        $payload["price"] = $product["product_price"];
        $payload["quantity_purchased"] = $product["product_quantity_purchased"];
        
        $db -> db_insert("ordered_items", $payload);
    }

    echo("Order Completed Successfully");
?>