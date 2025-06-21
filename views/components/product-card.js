const createProductCard = ({product_name, product_price, product_image_url}) => {
    const container = document.createElement("div");
    container.style = {
        ...container.style,
        "display": "flex",
        "flexDirection": "column"
    }

    const productTemplate = `
        <img src="${product_image_url}" id="product_img"/>
        <h5>${product_name}</h5>
        <b>N${product_price}</b>
        <button class="btn btn-dark text-light rounded w-auto py-1">Add To Cart</button>
    `;

    container.innerHTML = productTemplate;

    return container;
}