<?php
    $product_name = $product["name"];
    $product_image_url = $product["product_image_url"];
    $product_price = $product["product_price"];
    $product_desc = $product["product_description"];
    $product_qty_avail = $product["product_quantity_avail"];
?>

<div class="single_product_item">
    <div class="single_product_item_thumb">
        <img src="<?php echo($product_image_url); ?>" alt="#" class="img-fluid">
    </div>
    <h3> <?php echo($product_name); ?> </h3>
    <p><?php echo($product_price); ?></p>
    <button class="add-to-cart btn btn-dark text-light rounded w-auto py-1" onClick="() => fire_add_to_cart_modal('<?php echo($product_name); ?>', '<?php echo($product_image_url); ?>', '<?php echo($product_price); ?>', '<?php echo($product_desc); ?>', '<?php echo($product_qty_avail); ?>', Swal)">Add To Cart</button>
</div>

<script src="../../helpers/fire_add_to_cart_modal.js"></script>