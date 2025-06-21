<?php
    require("../database.php");
    require("../helpers/upload_file.php");

    $db = new Database;

    $_POST_filtered = array();
    
    foreach ($_POST as $key => $value) {
        if ($_POST[$key] == "" || in_array($key, array("product_id", "product_image"))) {
            continue;
        }

        $_POST_filtered[$key] = $value;
    }

    if (array_key_exists("product_image", $_FILES)) {
        $_POST_filtered["product_image_url"] = uploadFIle($_FILES["product_image"]);
    }

    $db -> db_update("products", $_POST_filtered, "product_id=".$_POST['product_id']);
?>
<script>
    window.alert("product%20updated%20successfully");
</script>