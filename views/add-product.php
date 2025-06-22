<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include("./title-and-meta.php");
        ?>
    </head>
    <body>
        <form class="mt-4" action="../controllers/add-product.php"  method="POST" enctype="multipart/form-data">
            <div class="container w-75 container-sm-fluid mx-auto">
                <h2>Add Product</h2> <a class="btn btn-secondary d-inline-block ms-2" href="product-view.php"><u>See All Products</u></a>
                <div class="row" id="form-fields-container">
                    <!-- will be inserted -->
                </div>
            </div>
        </form>
        <script>
            //making sure that the form fields are easy to change
            function insertFormFields() {
                const createFormField = (name, type) => {return {"name":name, "type":type}};

                //change this variable if you wish to change the frontend of things uploaded
                const formFields = [createFormField("name", "text"), createFormField("price", "number"), createFormField("description", "textarea"), createFormField("quantity_avail", "number"), createFormField("image", "file")];

                const formFieldsTemplateString = `
                    ${formFields.map(field => {
                        return `
                            <div class="col-12 my-3 my-sm-2">
                                <label class="form-label" for="product-${field.name}">Product ${field.name}</label><br/>
                                ${(field.type == "textarea")?
                                    `<textarea required name="product_${field.name}"></textarea>`
                                    :
                                    `<input required class="form-control" type="${field.type}" name="product_${field.name}" placeholder="Enter Product ${field.name}" ${(field.type == "file")? "accept=\".jpg, .jpeg, .png\"":""}/>`
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
                submitBtn.className = "btn btn-info w-100";
                formFieldsContainer.appendChild(submitBtn);
            }
            
            insertFormFields();
        </script>
    </body>
</html>