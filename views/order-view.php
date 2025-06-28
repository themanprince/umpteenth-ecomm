<?php
    require("../database.php");
    include("../general_config.php");
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
            if (isset($_GET["order_id"])) {
                $order_id = $_GET["order_id"];
                $order_details = $db -> db_getonerow("SELECT * FROM orders WHERE order_id=" . $order_id . ";");
                $ordered_items = $db -> db_queryresult("SELECT oi.price, oi.quantity_purchased, p.product_name, p.product_image_url FROM ordered_items oi JOIN products p ON p.product_id=oi.product_id WHERE oi.order_id=" . $order_id . ";");

                $total = 0;
        ?>
        <div class="container py-4">
            <h4 class="text-primary fw-bold text-center">Order For <?php echo($order_details["customer_name"]); ?></h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Qty Purchased</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="order-items">
                    <?php
                        foreach ($ordered_items as $item) {
                            $item_total = $item["quantity_purchased"] * $item["price"];
                            $total += $item_total;
                    ?>
                    <tr>
                        <td><img src="<?php echo($item['product_image_url']); ?>" width="50"/> <?php echo($item["product_name"]); ?> </td>
                        <td><?php echo($item["quantity_purchased"]); ?></td>
                        <td>N<?php echo($item["price"]); ?></td>
                        <td>N<?php echo($item_total); ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <div class="text-end fw-bold" id="order-total"><?php echo($total); ?></div>
            <div class="container">
                <div class="col-12 fw-bold h3 text-danger">
                    <?php echo((($order_details['is_completed'] == "1")? "Order Completed" : "<a class='btn btn-secondary' href='../controllers/mark-order-complete.php?order_id=" . $order_id . "'>Mark as Completed</a>")); ?>
                </div>
            </div>
        <?php
            } else {
            $orders_list = $db -> db_queryresult("SELECT * FROM orders;");
        ?>
            <div class="w-100 bg-info text-light text-center py-3 h2">Orders</div>
            <div id="table-container">
                <table class="table table-primary table-striped table-bordered">
                    <thead>
                        <?php
                            $keys_to_avoid = array("order_id");
                            foreach ($orders_list[0] as $key => $value) {
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
                            for ($i = 0; $i < count($orders_list); $i++) {
                                $curr_order = $orders_list[$i];
                                ?>
                            <tr>
                                <?php
                                    foreach ($curr_order as $key => $value) {
                                        if (in_array($key, $keys_to_avoid)) {
                                            continue;
                                        } else if ($key == "is_completed") {
                                            echo("<td>" . (($value == "1")? "yes" : "<a class='btn btn-secondary' href='../controllers/mark-order-complete.php?order_id=" . $curr_order['order_id'] . "'>Mark as Completed</a>") . "</td>");
                                            continue;
                                        }
                                        echo("<td". ((is_numeric($value))? ' class=\'text-right\'': '') . ">" . $value . "</td>");
                                    }
                                ?>
                                <td><a href="<?php echo($_SERVER['PHP_SELF'] . '?order_id=' . $curr_order['order_id']) ?>" class="btn btn-info">More Info</a></td>
                            </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        <?php
            }
        ?>
    </body>
</html>