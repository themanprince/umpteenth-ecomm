<?php
    require("../database.php");
    include("../general-config.php");

    $db = new Database;
    
    function uploadFile($file) { #should return the path to the file in my server
        $upload_dir = (isset($file_upload_dir))? $file_upload_dir : "../upload_dir"; 
        define("UPLOAD_DIRECTORY", $upload_dir);
        $tempUploadedFileName = $file['tmp_name'];
        $file = $file['name'];
        $destination = UPLOAD_DIRECTORY . "/" .$file;

        move_uploaded_file($tempUploadedFileName, $destination);

        return $destination;
    }

    $_POST["product_image_url"] =  uploadFile($_FILES['product_image']);

    $db -> db_insert("products", $_POST)
    or die("unable to insert product");
?>