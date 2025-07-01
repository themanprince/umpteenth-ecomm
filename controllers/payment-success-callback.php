<?php 

    session_start();

    //PLEASE FIRST VERIFY THE STATUS OF THE TRANSACTION BEFORE CONTINUING WITH STORING IT IN DB
    
    $order_info = array("customer_name" => $_SESSION["customer_name"], "customer_address" => $_SESSION["customer_address"], "customer_email" => $_SESSION["customer_email"], "customer_phone_number" => $_SESSION["customer_phone_number"]);
    $order_id = $db -> db_insert("orders", $order_info);

    foreach($_SESSION["cart"] as $product) {
        $payload = array();
        $payload["order_id"] = $order_id;
        $payload["product_id"] = $product["product_id"];
        $payload["price"] = $product["product_price"];
        $payload["quantity_purchased"] = $product["product_quantity_purchased"];
        
        $db -> db_insert("ordered_items", $payload);
    }

?>