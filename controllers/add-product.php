<?php
    require("../database.php");
    require("../helpers/upload_file.php");

    $db = new Database;
    
    $_POST["product_image_url"] =  uploadFile($_FILES['product_image']);

    $db -> db_insert("products", $_POST)
    or die("unable to insert product");
?>
<script>
    window.alert("product added successfully");
	window.location.href = "../views/product-view.php";
</script>