<?php
    session_start();

    require("../site_config.php");
    require("../database.php");

    $db = new Database;

    $_SESSION["products"] = $db -> db_queryresult("SELECT * FROM products WHERE is_hidden = '0'; ");
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
           $section_title = "All Products";
           $products = $_SESSION["products"];

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