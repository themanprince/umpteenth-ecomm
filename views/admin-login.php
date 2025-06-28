<?php

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php 
            require("title-and-meta.php");
        ?>
    </head>
    <body>

        <script src="../lib/js/sweetalert.js"></script>
        <script>
            Swal.fire({
                "title": `Admin Login`,
                "html": `
                    <div class="card text-start border-0" style="max-width: 100%;">
                        <div class="card-body p-0">
                                <div class="my-2">
                                    <label for="admin-username" class="form-label">Username</label>
                                    <input class="form-control border border-primary small" type="text" id="admin-username" required />
                                </div>
                                <div class="my-2">
                                    <label for="admin-password" class="form-label">Password</label>
                                    <input class="form-control border border-primary small" type="password" id="admin-password" required />
                                </div>
                        </div>
                    </div>
                `,
                "confirmButtonText": "Login",
                "focusConfirm": false,
                "preConfirm": async () => {
                    const admin_username = document.getElementById("admin-username").value,
                        admin_password = document.getElementById("admin-password").value;
                    
                    const response = await fetch("../controllers/admin-login.php", {
                        "method": "POST",
                        "headers": {"Content-Type": "application/json"},
                        "body": JSON.stringify({admin_username, admin_password})
                    });

                    const responseBody = JSON.parse(await response.text());
                    const {msg} = responseBody;
                    if(responseBody.type == "error") {
                        Swal.showValidationMessage(msg);
                        return false;
                    }

                    return {msg};
                },
            }).then(result => {
                if(result.isConfirmed) {
                    Swal.fire({
                        "icon": "success",
                        "text": result.value.msg
                    }).then(e => window.location.href = "../views/product-view.php");
                }
            });
        </script>
    </body>
</html>