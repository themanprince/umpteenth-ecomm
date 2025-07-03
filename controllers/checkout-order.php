<?php
    session_start();
    
    require_once("../database.php");
    require_once("../helpers/payment.php");
    require_once("../general_config.php");
    
    $db = new Database;

    $data = json_decode(file_get_contents("php://input"), true);

    $_SESSION["customer_name"] = $data["customer_name"];
    $_SESSION["customer_address"] = $data["customer_address"];
    $_SESSION["customer_email"] = $data["customer_email"];
    $_SESSION["customer_phone_number"] = $data["customer_phone_number"];
    $_SESSION["cart"] = $data["cart"];
    $_SESSION["amount"] = $data["amount"];
    
    $payment = new Payment($_SESSION, $payment_callback_url);
    echo(json_encode(array("access_code" => $payment->access_code)));  //the client will use the access code to complete the payment then redirection will be done to a specified url on our server
    exit();

?>