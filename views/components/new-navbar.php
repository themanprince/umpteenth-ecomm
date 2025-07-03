<?php
    require_once("../site_config.php");
?>
    <header id="header-comp" class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="<?php echo($_SERVER['PHP_SELF']); ?>"> <img src="<?php echo("../" . $site_logo_url) ?>" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="customer-home.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="customer-home.php#about-us-section">About</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Products
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="all-products.php"> All Products</a>
                                        <a class="dropdown-item" href="customer-home.php#latest-products">Latest Products</a>                                        
                                    </div>
                                </li>
                                
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Contact Us
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="http://wa.me/<?php echo($phone_number); ?>">Whatsapp</a>
                                        <a class="dropdown-item" href="">Facebook</a>
                                        <a class="dropdown-item" href="">Instagram</a>
                                        <a class="dropdown-item" href="mailto:<?php echo($email_address) ?>">Email Us</a>
                                    </div>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="../views/cart.php">Your Cart</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex align-items-center">
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <a href="../views/cart.php" id="cart-icon" class="col-2 position-relative d-block">
                                <div id="cart-notification-icon" class="position-absolute start-100 p-1 bg-danger rounded-circle" style="display: none"></div>
                                <i class="flaticon-shopping-cart-black-shape mx-0"></i>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner" action="../views/search.php" method="GET">
                    <input required type="text" name="search-term" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    