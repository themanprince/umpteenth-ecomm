<?php
    require("../database.php");
    $db = new Database;
?>

<!DOCTYPE html>
<html lang="en">
    <?php
        include("./html-head.php");
    ?>
    <body>
        <?php

            if(isset($_GET["product_id"])) {

            } else {
                $products_list = $db -> db_queryresult("SELECT * FROM products;");
        ?>
            <table class="table">
                <caption>Products</caption>
                <thead>
                    <?php
                        $keys_to_avoid = array("product_id", "product_image_url");
                        
                        foreach ($products_list[0] as $key => $value) {
                            if (in_array($key, $keys_to_avoid)) {
                                continue;
                            }
                            echo("<th>" . $key . "</th>");
                        }
                    }
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
                                    }
                                    echo("<td>" . $value . "</td>");
                                }
                            ?>
                        </tr>
                    <?php
                        }
                    ?>                    
                </tbody>
            </table> 
    </body>
</html>