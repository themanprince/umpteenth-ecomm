<?php
    require("../site_config.php");
?>

<style>

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
        border: 2px solid var(--bg-primary);
        border-radius: 100%;
    }

</style>

<div class="containter-fluid my-4">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-1"><img src="../<?php echo($site_logo_url) ?>" alt="logo" width="25" height="25"/></div>
        <div class="col-1"></div>
        <div class="col-9 row justify-content-around">
            <form id="search-form" class="col-9">
                <input type="search" placeholder="search" name="product-name" id="search-input" class="w-100"/><button type="submit" id="submit-btn"><img src="../icons/search-icon.png" alt="search" id="search-icon" /></button>
            </form>
            <div id="cart-icon" class="col-2"><img src="../icons/cart-icon.png"/></div>
        </div>
    </div>
</div>