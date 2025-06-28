<?php
    $data = json_decode(file_get_contents("php://input"), true);
    foreach ($data as $item) {
        echo("got here, data is");
        print_r($data);
    }
?>