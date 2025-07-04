<?php
    require_once("../helpers/check-admin-login.php");
    redirect_if_not_admin("customer-home.php");

    require_once("../database.php");
    require_once("../general_config.php");
    $db = new Database;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once("link-includes.php"); ?>
        <title>Your Dashboard</title>
    </head>
    <body>
        <?php
            $orders = $db -> db_queryresult("SELECT * FROM orders;");
            $orders_summary = array("total" => 0, "pending" => 0, "fulfilled" => 0);
            foreach($orders as $order) {
                $orders_summary["total"]++;
                if($order["is_completed"] == "0") {
                    $orders_summary["pending"]++;
                } else if ($order["is_completed"] == "1") {
                    $orders_summary["fulfilled"]++;
                }
            }
        ?>
        <div class="container-fluid">
            <table class="table table-primary table-striped">
                <tr>
                    <td>Total Orders</td>
                    <td><?php echo($orders_summary["total"]); ?></td>
                </tr>
                <tr>
                    <td>Pending</td>
                    <td><?php echo($orders_summary["pending"]); ?></td>
                </tr>
                <tr>
                    <td>Fulfilled</td>
                    <td><?php echo($orders_summary["fulfilled"]); ?></td>
                </tr>
            </table>
            
            <div class="row mx-auto fw-bold text-decoration-underline">
                <div class="col-auto"><a href="order-view.php">Manage Orders</a></div> | 
                <div class="col-auto"><a href="product-view.php">Manage Products</a></div> | 
                <div class="col-auto"><a href="../controllers/admin-logout.php">Logout</div>
            </div>
        </div>
        <?php require_once("script-includes.php"); ?>
    </body>
</html>