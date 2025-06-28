<?php
    session_start();
    function redirect_if_not_admin($location = "customer-home.php") {
        if ( ! (isset($_SESSION["is_admin"]) && ($_SESSION["is_admin"] == true))) {
            header("location: " . $location);
        }
    }
?>