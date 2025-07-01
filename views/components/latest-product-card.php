<?php
    $product_id = $product["product_id"];
    $product_name = $product["product_name"];
    $product_image_url = $product["product_image_url"];
    $product_price = $product["product_price"];
    $product_desc = $product["product_description"];
    $product_qty_avail = $product["product_quantity_avail"];
?>

<div class="card mb-4 product-wap rounded-0">
    <div class="card rounded-0">
        <img class="card-img rounded-0 img-fluid" src="<?php echo($product_image_url); ?>" style="block-size: 15em;">
        <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
            <ul class="list-unstyled">
                <li><a onclick="fire_add_to_cart_modal('<?php echo($product_name); ?>', '<?php echo($product_image_url); ?>', '<?php echo($product_price); ?>', '<?php echo($product_desc); ?>', '<?php echo($product_qty_avail); ?>', Swal)" id="<?php echo($product_id); ?>" class="btn btn-success text-white mt-2"><i class="fas fa-cart-plus"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <a href="shop-single.html" class="h3 text-decoration-none"><?php echo($product_name); ?></a>
        <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
            <li><small style="line-height: 1.15;"><?php echo($product_desc); ?></small></li>
            
        </ul>
        <ul class="list-unstyled d-flex justify-content-center mb-1">
            <li>

            </li>
        </ul>
        <p class="text-center h3 fw-bold mb-0">N<?php echo($product_price); ?></p>
    </div>
</div>

<script>
    document.getElementById("<?php echo($product_id); ?>").addEventListener("click", () => fire_add_to_cart_modal('<?php echo($product_name); ?>', '<?php echo($product_image_url); ?>', '<?php echo($product_price); ?>', '<?php echo($product_desc); ?>', '<?php echo($product_qty_avail); ?>', Swal));
</script>