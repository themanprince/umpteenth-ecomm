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
        
        <section class="trending_items" id="customer-home.php#latest-products">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section_tittle text-center">
                            <h2>Latest Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row">                    
                    <?php
                        for ($i = 0; $i < count($_SESSION["products"]); $i++) {
                            $product = $_SESSION["products"][$i];
                    ?>
                            <div class="col-lg-4 col-sm-6">
                                <?php require("components/latest-product-card.php"); ?>
                            </div>
                    <?php
                        }
                    ?>                    
                </div>
            </div>
        </section>
        

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