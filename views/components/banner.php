<?php require_once("../site_config.php"); ?>

<section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1><?php echo($site_name); ?></h1>
                            <p><?php echo($site_tagline); ?></p>
                            <a href="#product_list" class="btn_1">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner_img">
            <img src="<?php echo("../" . $homepage_banner_img_url); ?>" alt="#" class="img-fluid">
            <img src="../banner_pattern.png " alt="#" class="pattern_img img-fluid">
        </div>
    </section>
    