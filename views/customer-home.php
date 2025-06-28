<?php
    session_start();

    require("../site_config.php");
    require("../database.php");

    $db = new Database;

    $product_limit = 20;
    $_SESSION["products"] = $db -> db_queryresult("SELECT * FROM products WHERE is_hidden = '0' LIMIT " . $product_limit . ";");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include("title-and-meta.php");
        ?>
    </head>
    <body>
        <?php require("components/navbar.php"); ?>
        <div class="container-fluid bg-primary py-4 px-auto my-sm-0 my-md-1 text-center text-light pt-4">
            <h2><?php echo($site_name) ?></h2>
            <small><?php echo($site_tagline) ?></small>
        </div>
        <div class="container py-4">
            <div id="product-block" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">   
            </div>
        </div>

        <script src="../lib/js/sweetalert.js"></script>
        <script src="components/product_card.js"></script>
        <script>
            const product_block = document.getElementById("product-block");
            let product_details, product_node;
        </script>
            <?php
                for ($i = 0; $i < count($_SESSION["products"]); $i++) {
                    $product = $_SESSION["products"][$i];
            ?>
                <script>
                        product_details = {
                            "product_id": "<?php echo($product['product_id']); ?>",
                            "product_name": "<?php echo($product['product_name']); ?>",
                            "product_price": "<?php echo($product['product_price']); ?>",
                            "product_image_url": "<?php echo($product['product_image_url']); ?>",
                            "product_description": "<?php echo($product['product_description']); ?>",
                            "product_quantity_avail": "<?php echo($product['product_quantity_avail']); ?>"
                        };
                        product_node = createProductCard(product_details, Swal);
                        product_block.appendChild(product_node);
                </script>
            
            <?php
                }
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