<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="section_tittle text-center">
                <h2><?php echo($section_title); ?></h2>
            </div>
        </div>
    </div>
    <div class="row">                    
        <?php
            if(count($products) <= 0) {
                echo("<h3>No Products</h3>");
                exit();
            }

            for ($i = 0; $i < count($products); $i++) {
                $product = $products[$i];
        ?>
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <?php require("components/latest-product-card.php"); ?>
                </div>
        <?php
            }
        ?>                    
    </div>
</div>
<script src="../helpers/fire_add_to_cart_modal.js"></script>
<script src="../lib/js/sweetalert.js"></script>
        