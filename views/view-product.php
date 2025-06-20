<?php
    require("../database.php");
    include("../general-config.php");
    $db = new Database;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include("./title-and-meta.php");
        ?>
        <style>
            .product-image {
                inline-size: 90%;
                border-radius: 10%;
                block-size: 30%;
                margin-inline: auto;
                margin-block: 20px;
            }
            .product-image img {
                max-inline-size: 100%;
            }
        </style>
    </head>
    <body>
        <?php
            if(isset($_GET["product_id"])) {
                $product_properties = $db -> db_getonerow("SELECT * FROM products WHERE product_id = " . $_GET['product_id']);
                if (isset($product_properties)) {
                    echo("<div class='product-image'><img src='" . $product_properties['product_image_url'] ."'/></div>");
        ?>
                    <form action="../controllers/update-product.php" method="POST">
                        <div class="container w-75 container-sm-fluid mx-auto">
                            <h2>Edit Product</h2>
                            <div class="row" id="form-fields-container">
                                <?php
                                    $keys_to_avoid = array("product_id", "product_image_url", "product_description", "is_hidden");
                                    foreach ($product_properties as $key => $value) {
                                        if (in_array($key, $keys_to_avoid)) {
                                            continue;
                                        } #else...
                                ?>
                                        <div class="col-12 my-3 my-sm-2">
                                            <label class="form-label" ><?php echo($key); ?></label><br/>
                                            <input name="<?php echo($key); ?>" class="form-control" type="<?php echo((is_numeric($value)) ? "number": "text"); ?>" value="<?php echo($value); ?>"/>
                                        </div>
                                <?php
                                    }
                                ?>
                                <input type="hidden" value="<?php echo($product_properties['product_id']) ?>" name="product_id" />
                                <div class="col-12 my-3 my-sm-2">
                                    <label class="form-label" >product_description</label><br/>
                                    <textarea name="product_description" class="form-control"></textarea>
                                </div>
                                <div class="col-12 my-3 my-sm-2">
                                    <label class="form-label">product_image</label>
                                    <input type="file" name="product_image" class="form-control"/>
                                </div>
                                <div class="col-12 my-3 my-sm-2">
                                    <label class="form-label">is_hidden</label>
                                    <select name="is_hidden" class="form-control">
                                        <option value="TRUE">Yes</option>
                                        <option value="FALSE">No</option>
                                    </select>
                                </div>
                                    
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary">Update Product Details</button>
                                </div>
                                <div class="col-6">
                                    <a class="btn btn-danger" onclick="sendDeleteRequest(<?php echo($product_properties['product_id']); ?>)">Delete Product</a>
                                </div>                                
                            </div>
                        </div>                       
                        
                    </form>
            <?php
                } else {
                    echo("Error! This product could not be retrieved");
                    die();
                }
        
            } else {
                $products_list = $db -> db_queryresult("SELECT * FROM products;");
        ?>
            <div class="w-100 bg-info text-light text-center py-3 h2">Products</div>
            <table class="table table-primary table-striped table-bordered">
                <thead>
                    <?php
                        $keys_to_avoid = array("product_id", "product_image_url");                        
                        foreach ($products_list[0] as $key => $value) {
                            if (in_array($key, $keys_to_avoid)) {
                                continue;
                            }
                            echo("<th class='bg-info text-light'>" . $key . "</th>");
                        }
                        echo("<th></th>");
                    
                    ?>
                </thead>
                <tbody>
                    <?php
                        for ($i = 0; $i < count($products_list); $i++) {
                            $curr_product = $products_list[$i];
                            ?>
                        <tr>
                            <?php
                                foreach ($curr_product as $key => $value) {
                                    if (in_array($key, $keys_to_avoid)) {
                                        continue;
                                    } else if ($key == "is_hidden") {
                                        echo("<td>" . (($value == "0")? "no" : "yes") . "</td>");
                                        continue;
                                    }
                                    echo("<td". ((is_numeric($value))? ' class=\'text-right\'': '') . ">" . $value . "</td>");
                                }
                            ?>
                            <td><button class="btn btn-info">Edit</button></td>
                        </tr>
                    <?php
                }
            }
                    ?>                    
                </tbody>
            </table> 
        <script>
            const sendDeleteRequest = (product_id) => async () => {
                const requestArgs = {
                    "method": "POST",
                    "body": JSON.stringify({product_id})
                };
                const response = await fetch("../controllers/delete-product.php", requestArgs);
                if(response.status != 200)
                    window.alert("unable to delete product");
            };
        </script>
    </body>
</html>