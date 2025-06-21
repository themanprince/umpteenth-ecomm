<?php
    require("../database.php");
    $db = new Database;

    $_POST_filtered = array();
    
    foreach ($_POST as $key => $value) {
        if ($_POST[$key] == "" || $key == "product_id") {
            continue;
        }

        $_POST_filtered[$key] = $value;
    }

    $db -> db_update("products", $_POST_filtered, "product_id=".$_POST['product_id']);
?>