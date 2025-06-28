<?php
    require("../general_config.php");

    class Payment {
        
        private $authorization_url;
        private $access_code;
        private $reference;

        function __construct($payload/* no pun intended */) {
            $url = "https://api.paystack.co/transaction/initialize";

            $customer_email = $payload["customer_email"];
            $amount = $payload["amount"];

            $fields = [
                "customer_email" => $customer_email,
                "amount" => $amount
            ];

            $fields_string = http_build_query($fields);

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer " . $paystack_secret_key . "",
                "Cache-Control: no-cache"
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $result = curl_exec($ch);

            echo("got here, result is");
            echo($result);
        }
    }
?>