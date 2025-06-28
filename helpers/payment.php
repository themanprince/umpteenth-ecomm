<?php
    require("../general_config.php");

    class Payment {
        
        public $authorization_url;
        public $access_code;
        public $reference;

        function __construct($payload/* no pun intended */) {
            global $payment_gateway_secret_key;
            global $payment_gateway_url;

            $customer_email = $payload["customer_email"];
            $amount = $payload["amount"];

            $fields = [
                "customer_email" => $customer_email,
                "amount" => $amount
            ];

            $fields_string = http_build_query($fields);

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $payment_gateway_url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer " . $payment_gateway_secret_key . "",
                "Cache-Control: no-cache"
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $result = curl_exec($ch);

            echo("got here, result is");
            echo($result);
            //next, use $result to set class fields
        }

    }
?>