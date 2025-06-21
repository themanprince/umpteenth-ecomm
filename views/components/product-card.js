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
        <img src="${product_image_url}" id="product_img" class="w-100 h-100" style="border-radius: 30px;" />
        <em>${product_name}</em>
        <b>N${product_price}</b>
        <br/>
        <button class="add-to-cart btn btn-dark text-light rounded w-auto py-1">Add To Cart</button>
    `;

    container.innerHTML = productTemplate;
    container.getElementsByClassName("add-to-cart")[0].addEventListener("click", e => {
        alert_sys.fire({
            "html": `
                        <style>
                            #product-img {
                                border-radius: 30px;
                            }
                        </style>
                        <div class="add-to-cart-interface d-inline-flex p-3">
                            <img src="${product_image_url}" id="product-img"/>
                            <div class="d-flex flex-column">
                                <!-- other product details go here -->
                            </div>
                        </div>
                    `
        });        
    });

    return container;
}