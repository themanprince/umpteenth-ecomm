<?php
    session_start();
    function redirect_if_not_admin($location = "customer-home.php") {
        if ( ! (isset($_SESSION["is_admin"]) && ($_SESSION["is_admin"] == true))) {
            echo("<script>window.alert('This Route is Admin-Only');</script>");
            header("location: " . $location);
        }
    }
?>