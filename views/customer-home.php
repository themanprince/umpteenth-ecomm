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
        
        <?php require("components/banner.php"); ?>
        
        <section class="feature_part section_padding" id="about-us-section">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6">
                        <div class="feature_part_tittle">
                            <h3>About Us</h3>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="feature_part_content">
                            <p><?php echo($about_us_text); ?></p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-sm-6">
                        <div class="single_feature_part">
                            <img src="<?= $baseUrl ?>/icons/feature_icon_1.svg" alt="#">
                            <h4>Credit Card Support</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single_feature_part">
                            <img src="<?= $baseUrl ?>/icons/feature_icon_2.svg" alt="#">
                            <h4>Online Order</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single_feature_part">
                            <img src="<?= $baseUrl ?>/icons/feature_icon_3.svg" alt="#">
                            <h4>Fast Delivery</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single_feature_part">
                            <img src="<?= $baseUrl ?>/icons/feature_icon_4.svg" alt="#">
                            <h4>Product with Gift</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="trending_items" id="latest-products">
        <?php    
            $section_title = "Latest Items";
            $product_limit = 4; #latest products
            $products = $db -> db_queryresult("SELECT * FROM products WHERE is_hidden = '0' LIMIT " . $product_limit . ";");

            require_once("components/products-list.php");
           ?>
           <div class="row text-center">
               <a href="all-products.php" class="btn btn-success text-light px-4 py-2">See All Products -></a>
            </div>
        </section>
        
        <?php require_once("components/footer.php"); ?>

        <script src="../lib/js/sweetalert.js"></script>
        <?php require_once("../helpers/fire_add_to_cart_modal.php") ?>
        <?php require_once("../helpers/handle_cart_notification_icon.php") ?>
        <?php
            require("script-includes.php");
        ?>
                 
    </body>
</html>
<?php
    session_unset();
    session_destroy();
?>