<?php
    require("../site_config.php");
    require("../database.php");

    $db = new Database;

    $product_limit = 20;
    $_SESSION["products"] = $db -> db_queryresult("SELECT * FROM products LIMIT " . $product_limit . ";");
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
        <div id="product-block">
            
        </div>
    <script src="components/product-card.js"></script>
    <script>
        const product_block = document.getElementById("product-block");
        <?php
            $first_product = $_SESSION["products"][0];
        ?>
        const first_product_details = {
            "product_name": "<?php echo($first_product['product_name']); ?>",
            "product_price": "<?php echo($first_product['product_price']); ?>",
            "product_image_url": "<?php echo($first_product['product_image_url']); ?>"
        };
        const test_product = createProductCard(first_product_details);
        product_block.appendChild(test_product);
    </script>
    </body>
</html>