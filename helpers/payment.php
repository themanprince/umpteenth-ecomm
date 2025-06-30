<?php
    require("../general_config.php");

    class Payment {
        
        public $authorization_url;
        public $access_code;
        public $reference;

        function __construct($payload/* no pun intended */) {
            global $payment_gateway_secret_key;
            global $payment_gateway_url;
            global $host_and_port;

            $customer_email = $payload["customer_email"];
            $amount = $payload["amount"];

            $fields = [
                "email" => $customer_email,
                "amount" => $amount,
                "callback_url" => "http://" . $host_and_port . "/controllers/checkout-order.php"
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

            $result = json_decode(curl_exec($ch));
            $error = curl_error($ch);

            if ($error) {
                echo("Curl Error");
                echo($error);
                exit();
            } else {
                $data = $result["data"];
                $this -> $reference = $data["reference"];
                $this -> $access_code = $data["access_code"];
                $this -> $authorization_url = $data["authorization_url"];
            }
           
        }

    }
?>