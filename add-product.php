<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Product</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <form action="<?php echo('$_SERVER[\'SELF\']'); ?>" method="POST">
            
            <input type="text" name="product-name" placeholder="Product Name"/>
            <input type="number" name="product-price" placeholder="Price"/>
            <textarea name="product-description" id="product-description"></textarea>
            <input type="file" name="product-image" placeholder="Image for Product"/>
            <button type="submit">Add Product</button>
            
        </form>
    </body>
</html>