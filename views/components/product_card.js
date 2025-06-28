//this module contains both the codes for the
// PRODUCT CARD that is displayed in the customer home page
// as well as the
// ADD-TO-CART interface

const createProductCard = ({product_id, product_name, product_price, product_image_url, product_quantity_avail, product_description}, alert_sys) => {
    const style = `
        display: flex;
        flex-direction: column;
        margin-block-end: 2rem;
    `;

    const container = document.createElement("div");
    container.setAttribute("style", style);
    container.setAttribute("class", "col-md-3 col-6");

    const productTemplate = `
        <img src="${product_image_url}" id="product_img" class="me-1 w-100 h-100" style="border-radius: 30px;" />
        <em>${product_name}</em>
        <b class="me-2">N${product_price}</b>
        <button class="add-to-cart btn btn-dark text-light rounded w-auto py-1">Add To Cart</button>
    `;

    container.innerHTML = productTemplate;
    container.getElementsByClassName("add-to-cart")[0].addEventListener("click", e => {
        function fire_add_to_cart_modal() {
            alert_sys.fire({
                "html": `
                            <style>
                                #add-to-cart-interface {
                                    font-size: 1rem;
                                }
                            
                                #product-img {
                                    border-radius: 30px;
                                    block-size: 100%;
                                    max-block-size: calc(100% - 20px);
                                }
                                
                                #quantity-to-buy {
                                    border: none;
                                    border-block-end: 2px solid grey;
                                    transition: 1s;
                                }

                                #quantity-to-buy:focus {
                                    outline: none;
                                    border-block-end: 2px solid var(--primary);
                                }

                                #quantity-to-buy .error-mode {
                                    border-block-end: 3px solid var(--danger);
                                }

                            </style>
                            <div class="w-100 add-to-cart-interface p-3 row m-0">
                                <img src="${product_image_url}" id="product-img" class="col-12 col-md-6" />
                                <div class="col-12 col-md-6 d-flex flex-column justify-content-around justify-content-md-center align-items-center align-items-md-start text-center text-md-left mt-3 mt-md-0">
                                    <div class="me-md-5">
                                        <small>${product_name}</small></br>
                                        <b>N${product_price}</b>
                                    </div>
                                    
                                    <div class="my-md-5">
                                        <u>Product Description</u><br/>
                                        <small class="text-left"><i>${product_description}</i></small>
                                    </div>                                
                                    
                                    <div>
                                        <label for="quantity-to-buy"><small class="font-weight-bold">Quantity to Buy</small></label>
                                        <input class="form-control border-2" type="number" id="quantity-to-buy" max="${product_quantity_avail}" ${(product_quantity_avail > 0)? 'focus' : 'disabled'} placeholder="${(product_quantity_avail > 0)? 'e.g. 1' : 'Not Available'}"/>
                                    </div>
                                </div>
                            </div>
                        `,
                "width": "70%",
                "confirmButtonText": "Add To Cart",
                "confirmButtonColor":"var(--bs-info)",
                "showCancelButton": true,
                "cancelButtonText": "Cancel",
            }).then(result => {
                if (result.isConfirmed) {
                    const quantity_to_buy_node = document.getElementById("quantity-to-buy");
                    const quantity_to_buy = quantity_to_buy_node.value;
                    if(!quantity_to_buy) {
                        alert_sys.fire({
                            "text":"Please Enter a valid Quantity"
                        }).then(e => fire_add_to_cart_modal());
                    }

                    const product_details = {product_id, product_name, product_price, product_image_url, product_quantity_avail, product_description};
                    if(sessionStorage.getItem("cart") == null)
                        sessionStorage.setItem("cart", JSON.stringify([{...product_details}]));
                    else {
                        cart = JSON.parse(sessionStorage.getItem("cart"));
                        cart.push({...product_details});
                        sessionStorage.setItem("cart", JSON.stringify(cart));
                    }

                    document.getElementById("cart-icon")
                        .dispatchEvent(new Event("cartModified"));
            }
         });
       
        }

        fire_add_to_cart_modal();
                
    });

    return container;
}