<?php
    require("../database.php");
    $db = new Database;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include("./title-and-meta.php");
        ?>
    </head>
    <body>
        <?php
            if(isset($_GET["product_id"])) {
                $product = $db -> db_getonerow("SELECT * FROM products WHERE product_id = " . $_GET['product_id']);
                echo("got here, product is");
                print_r($product);
        ?>

        <?php
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
    </body>
</html>