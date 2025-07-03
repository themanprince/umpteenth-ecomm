<?php
    //unlike site_config.php, these settings do not change based on the site's admin

    $host_and_port = "http://localhost:80";

    $file_upload_dir = "upload_dir";
    
    $payment_gateway_url = "https://api.paystack.co/transaction/initialize";
    $payment_gateway_secret_key = "sk_test_13de65997fc769cb0a5e7f2f30d8b435541c342e";
    $payment_callback_url = "http://" . $host_and_port . "/controllers/payment-success-callback.php";

    $my_web_address = "http://princeadigwe.onrender.com";
?>