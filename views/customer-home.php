<?php
    session_start();

    require("../site_config.php");
    require("../database.php");

    $db = new Database;

    $product_limit = 10; #latest products
    $_SESSION["products"] = $db -> db_queryresult("SELECT * FROM products WHERE is_hidden = '0' LIMIT " . $product_limit . ";");
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
        
        <?php require("components/banner.php"); ?>
        
        <section class="trending_items" id="latest-products">
        <?php  
           $section_title = "Trending Items";
           $products = $_SESSION["products"];

           require_once("components/products-list.php");
        ?>
            <div class="row text-center">
                <a href="all-products.php" class="btn btn-success text-light px-4 py-2">See All Products -></a>
            </div>
        </section>
        
        <?php require_once("components/footer.php"); ?>

        <script src="../helpers/fire_add_to_cart_modal.js"></script>
        <script src="../lib/js/sweetalert.js"></script>
        <?php
            require("script-includes.php");
        ?>
        
            
        <script>
            function handle_cart_notification_icon() {
                const length_of_cart = (JSON.parse(sessionStorage.getItem("cart")) || []).length;
                if(length_of_cart > 0)
                    document.getElementById("cart-notification-icon")
                        .style.display = "block";
                else
                    document.getElementById("cart-notification-icon")
                        .style.display = "none";
            }

            handle_cart_notification_icon();

            const cart_icon = document.getElementById("cart-icon");
            
            cart_icon.addEventListener("cartModified", e => {
                handle_cart_notification_icon();
            });

        </script>
    </body>
</html>
<?php
    session_unset();
    session_destroy();
?>