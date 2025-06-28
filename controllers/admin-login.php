<?php
    require("../site_config.php");

    $data = json_decode(file_get_contents("php://input"), true);
    $username = $data["admin_username"];
    $password = $data["admin_password"];

    if (($username == $admin_username) && ($password == $admin_password)) {
        
        $_SESSION["is_admin"] = true;

        echo(json_encode([
            "type" => "success",
            "msg" => "Login Successful!"
        ]));

    } else {
        echo(json_encode([
           "type" => "error",
           "msg" => "Incorrect Username or Password"
        ]));
    }

    exit();
?>