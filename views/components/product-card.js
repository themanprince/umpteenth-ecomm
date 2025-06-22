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
        alert_sys.fire({
            "html": `
                        <style>
                            #add-to-cart-interface {
                                font-size: 1rem;
                            }
                        
                            #product-img {
                                border-radius: 30px;
                            }
                            
                            #quantity {
                                outline: none;
                                border-block-end: 2px solid grey;
                                transition: 1s;
                            }

                            #quantity {
                                border-block-end: 2px solid var(--bs-primary);
                            }
                        </style>
                        <div class="w-100 add-to-cart-interface p-3 row m-0">
                            <img src="${product_image_url}" id="product-img" class="col-12 col-md-6" />
                            <div class="col-12 col-md-6 d-flex flex-column justify-content-around align-items-center align-items-md-start text-center text-md-left mt-3 mt-md-0">
                                <div class="me-2">
                                    <small>${product_name}</small></br>
                                    <b>N${product_price}</b>
                                </div>
                                
                                <div class="my-3">
                                    <u>Product Description</u><br/>
                                    <small class="text-left"><i>${product_description}</i></small>
                                </div>                                
                                
                                <div class="me-2">
                                    <label for="quantity"><small class="font-weight-bold">Quantity to Buy</small></label>
                                    <input class="form-control border-2" type="number" id="quantity" max="${product_quantity_avail}" ${(product_quantity_avail > 0)? 'focus' : 'disabled'} placeholder="${(product_quantity_avail > 0)? 'e.g. 1' : 'Not Available'}"/>
                                </div>
                            </div>
                        </div>
                    `,
            "width": "70%",
            "height": "85%",
            "confirmButtonText": "Add To Cart",
            "showCancelButton": true,
            "cancelButtonText": "Cancel"
        });        
    });

    return container;
}