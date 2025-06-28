<?php
    require("../site_config.php");
?>

<style>
    #nav-container {
        position: sticky;
        top: 0;
        z-index: 5;
    }

    #search-form {
        flex: 3;

        inline-size: auto;
        display: inline-flex;
    }

    #search-input {
        background-color: lightgrey;
        border: 2px solid lightgrey;
        border-inline-end: none;
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
        outline: none;
        padding: 5px;
    }
    
    #submit-btn {
        background-color: lightgrey;
        border: 2px solid lightgrey;
        border-inline-start: none;
        border-top-right-radius: 30px;
        border-bottom-right-radius: 30px;
    }

    #search-icon {
        flex: 1;
        max-inline-size: 30px;
    }    

    #cart-icon img {
        inline-size: 30px;        
    }

    #cart-icon {
        inline-size: 30px;
        transition: 1.5s;
    }

    #cart-icon:hover {
        border-radius: 100%;
        background-color: var(--grey);
        cursor: pointer;
    }

</style>

<div id="nav-container" class="containter-fluid bg-light py-3">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-1"><img src="../<?php echo($site_logo_url) ?>" alt="logo" width="25" height="25"/></div>
        <div class="col-1"></div>
        <div class="col-9 row justify-content-around">
            <form id="search-form" class="col-9">
                <input type="search" placeholder="search" name="product-name" id="search-input" class="w-100"/><button type="submit" id="submit-btn"><img src="../icons/search-icon.png" alt="search" id="search-icon" /></button>
            </form>
            <a href="../views/cart.php" id="cart-icon" class="col-2 position-relative d-block">
                <div id="cart-notification-icon" class="position-absolute p-2 bg-danger rounded-circle" style="display: none"></div>
                <i class="flaticon-shopping-cart-black-shape fs-3"></i>
                <!-- <img src="../icons/cart-icon.png"/> -->
            </a>
        </div>
    </div>
</div>