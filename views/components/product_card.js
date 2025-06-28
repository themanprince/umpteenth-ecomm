//this module contains both the codes for the
// PRODUCT CARD that is displayed in the customer home page
// as well as the
// ADD-TO-CART interface

const createProductCard = ({product_id, product_name, product_price, product_image_url, product_quantity_avail, product_description}, alert_sys) => {
    
    const container = document.createElement("div");
    container.setAttribute("class", "col");

    const productTemplate = `
        <div class="card h-100 shadow-sm border-0">
            <img src="${product_image_url}"  id="product_img" class="card-img-top" style="inline-size: 100%; block-size: 12em; object-fit: cover; border-radius: 0.3em;"/>
            <div class="card-body">
                <h5 class="card-title">${product_name}</h5>
                <p class="fw-bold">N${product_price}</p>
                <button class="add-to-cart btn btn-dark text-light rounded w-auto py-1">Add To Cart</button>
            </div>
        </div>
    `;

    container.innerHTML = productTemplate;
    container.getElementsByClassName("add-to-cart")[0].addEventListener("click", e => {
        function fire_add_to_cart_modal() {
            alert_sys.fire({
                "title": `${product_name.toUpperCase()}`,
                "html": `
                    <div class="card text-start border-0" style="max-width: 100%;">
                        <img src="${product_image_url}" class="card-img-top rounded mb-2" alt="Image of ${product_name}" style="inline-size: 200px; block-size: 200px; display: block; margin: 0 auto;"/>
                        <div class="card-body p-0">
                            <h5 class="card-title mb-1 fw-bold">N${product_price}</h5>
                            <p class="card-text small mb-2" style="font-size: 14px;">${product_description}</p>
                            <input class="form-control small" type="number" id="quantity-to-buy" max="${product_quantity_avail}" ${(product_quantity_avail > 0)? 'focus' : 'disabled'} placeholder="${(product_quantity_avail > 0)? 'Enter Quantity to Purchase' : 'Not Available'}"/>
                        </div>
                    </div>
                `,
                "showCancelButton": true,
                "confirmButtonText": "Add To Cart",
                "cancelButtonText": "Cancel",
                "focusConfirm": false,
                "preConfirm": () => {
                    const qty = document.getElementById("quantity-to-buy").value;
                    if(!qty || qty <= 0 || qty > product_quantity_avail) {
                        alert_sys.showValidationMessage("Please Enter a Valid Quantity. Quantity available for this product is " + product_quantity_avail);
                        return false;
                    }
                    return {qty};
                },
            }).then(result => {
                if(result.isConfirmed) {
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