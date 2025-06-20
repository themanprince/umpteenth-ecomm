<?php
    require("../database.php");
    $db = new Database;
    define("UPLOAD_DIRECTORY", "../upload_dir");

    $db -> db_insert("products", $_POST)
    or die("unable to insert product");
?>