<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Product</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="../lib/css/bootstrap.min.css"/>
    </head>
    <body>
        <form action="../controllers/add-product.php"  method="POST">
            <div class="container w-50 container-sm-fluid mx-auto">
                <div class="row" id="form-fields-container">
                    <!-- will be inserted -->
                </div>
            </div>
        </form>
        <script>
            //making sure that the form fields are easy to change
            const createFormField = (name, type) => {return {"name":name, "type":type}};

            const formFields = [createFormField("name", "text"), createFormField("price", "number"), createFormField("description", "textarea"), createFormField("Quantity", "number"), createFormField("image", "file")];

            const formFieldsTemplateString = `
                ${formFields.map(field => {
                    return `
                        <div class="col-12 my-3">
                            ${(field.type == "textarea")?
                                `<textarea name="${field.name}"></textarea>`
                                :
                                `<label for="product-${field.name}">Product ${field.name}</label>
                                 <input class="form-control" type="${field.type}" name="product-${field.name}" placeholder="Enter Product ${field.name}"/>`
                            }                          
                        </div>                   
                    `;
                })
                .join("\n")
            }`;
            const formFieldsContainer = document.getElementById("form-fields-container");
            formFieldsContainer.innerHTML = formFieldsTemplateString;

            const submitBtn = document.createElement("button");
            submitBtn.type = "submit";
            submitBtn.innerText = "Add Product";
            submitBtn.class = "btn btn-primary";
            formFieldsContainer.appendChild(submitBtn);
        </script>
    </body>
</html>