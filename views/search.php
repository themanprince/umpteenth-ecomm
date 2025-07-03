<?php
    session_start();

    require("../site_config.php");
    require("../database.php");

    $db = new Database;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo($site_name) ?></title>
        <?php
            require("link-includes.php");
        ?>
    </head>
    <body>
        
        <?php require("components/new-navbar.php"); ?>
                
        <section id="all-products">
        <?php  
            $section_title = "Search Results";
            $search_term = trim($_GET["search-term"]);
            $products = $db -> db_queryresult("SELECT * FROM products WHERE is_hidden = '0' AND (product_name LIKE '" . $search_term . "' OR product_description LIKE '" . $search_term . "');");

           require_once("components/products-list.php");
        ?>
        </section>
        
        <?php require_once("components/footer.php"); ?>

        <script src="../helpers/fire_add_to_cart_modal.js"></script>
        <script src="../helpers/handle_cart_notification_icon.js">
        <script src="../lib/js/sweetalert.js"></script>
        <?php
            require("script-includes.php");
        ?>
    </body>
</html>
<?php
    session_unset();
    session_destroy();
?>