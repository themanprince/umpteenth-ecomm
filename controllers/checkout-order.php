<?php
    require("../database.php");
    require("../helpers/payment.php");
    
    $db = new Database;

    //the current payment handler will send a 'reference' field to a given callback_url after each payment
    if ( ! isset($_GET["reference"])) {
        $data = json_decode(file_get_contents("php://input"), true);

        $_SESSION["customer_name"] = $data["customer_name"];
        $_SESSION["customer_address"] = $data["customer_address"];
        $_SESSION["customer_email"] = $data["customer_email"];
        $_SESSION["customer_phone_number"] = $data["customer_phone_number"];
        $_SESSION["cart"] = $data["cart"];
        $_SESSION["amount"] = $data["amount"];
        
        $payment = new Payment($_SESSION);
        echo(json_encode(array("access_code" => $payment -> $access_code)));
        exit();

    } else {
        
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
    }

?>