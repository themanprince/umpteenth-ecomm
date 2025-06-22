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
        <div class="container-fluid bg-primary py-4 px-auto my-sm-0 my-md-1 text-center text-light">
            <h2><?php echo($site_name) ?></h2>
            <small><?php echo($site_tagline) ?></small>
        </div>
        <div id="product-block" class="row mx-2 mt-4 gx-2 gy-2">   
        </div>

        <script src="../lib/js/sweetalert.js"></script>
        <script src="components/product-card.js"></script>
        <script>
            const product_block = document.getElementById("product-block");
            let product_details, product_node;
        </script>
            <?php
                foreach ($_SESSION["products"] as $product) {
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
    </body>
</html>