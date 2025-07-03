<?php
    require_once("../site_config.php");
    require_once("../general_config.php");
?>
<footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo"><?php echo($site_name); ?></h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            <?php echo($business_location); ?>
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:<?php echo($phone_number); ?>"><?php echo($phone_number); ?></a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:<?php echo($email_address) ?>"><?php echo($email_address) ?></a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <?php
                            foreach($type_of_items_sold as $item) {
                                echo('<li><a class="text-decoration-none" href="#">' . $item . '</a></li>');
                            }
                        ?>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Home</a></li>
                        <li><a class="text-decoration-none" href="customer-home.php#about-us-section">About Us</a></li>
                        <li><a class="text-decoration-none" href="all-products.php">All Products</a></li>
                        <li><a class="text-decoration-none" href="cart.php">Your Cart</a></li>
                        <li><a class="text-decoration-none" href="tel:<?php echo($phone_number); ?>">Call Us</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <a href="#header-comp" class="input-group-text btn-success text-light">Back To Top</a>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <small class="text-left text-light">
                            Copyright &copy; <?php echo(Date('Y') . " " . $site_name); ?> 
                            | Website by <a rel="sponsored" href="https://templatemo.com" target="_blank"><u>TemplateMo</u></a> and <a rel="sponsored" href="<?php echo($my_web_address); ?>" target="_blank"><u>Prince Adigwe</u></a>
                        </small>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    
