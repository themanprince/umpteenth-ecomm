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
    </body>
</html>