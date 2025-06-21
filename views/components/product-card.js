const createProductCard = ({product_name, product_price, product_image_url}) => {
    const style = `
        display: flex;
        flex-direction: column;
    `;

    const container = document.createElement("div");
    container.setAttribute("style", style);
    container.setAttribute("class", "col-md-3 col-sm-5");

    const productTemplate = `
        <img src="${product_image_url}" id="product_img" class="rounded" />
        <h5>${product_name}</h5>
        <b>N${product_price}</b>
        <br/>
        <button class="btn btn-dark text-light rounded w-auto py-1">Add To Cart</button>
    `;

    container.innerHTML = productTemplate;

    return container;
}