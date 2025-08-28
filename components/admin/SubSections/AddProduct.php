<?php
if (isset($_POST["new-product"]) && isset($_POST["title"]) && $_POST["price"] && isset($_POST["description"]) && isset($_FILES["product-image"]["tmp_name"]) && isset($_FILES["product-image"]["name"]) && ($_SESSION["rol"] == "trabajador" || $_SESSION["rol"] == "admin")) {

    $newProductObj = new ProductDTO();
    $newProductObj->setTitle($_POST["title"]);
    $newProductObj->setDescription($_POST["description"]);
    $newProductObj->setPrice($_POST["price"]);

    $newProduct = new ProductController($newProductObj);

    if ($newProduct->createProduct($_FILES["product-image"]["tmp_name"], $_FILES["product-image"]["name"])) {
        $toast->fireSwalAlert("Se ha creado el producto.");
    } else {
        $toast->sendError("No se pudo crear el producto.");
    }

}

// Verificamos que este componente solo se le cargue a los administradores.
if ($_SESSION["rol"] == "admin") {

    ?>
    <!-- Add Product Subsection -->
    <div class="d-none container d-flex align-items-center justify-content-center vh-100 flex-wrap"
        id="add-product-subsection">
        <div class="row w-100 pb-5">
            <button class="btn btn-outline-light text-center mt-5 mb-5"
                onclick="closeSubsection('product-app', 'add-product-subsection')">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5" />
                </svg>
                Volver atrás
            </button>
            <div class="card p-5 shadow-lg">
                <div class="card-header text-center">
                    <h4 class="display-4">Añadir producto</h4>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="card-body p-5">
                        <div class="col-12">

                            <div class="row">
                                <div class="col mb-3 mt-3">
                                    <label for="title" class="form-label">Título:</label>
                                    <input type="text" class="form-control" placeholder="Título del producto" name="title">
                                </div>
                                <div class="col mb-3 mt-3">
                                    <label for="price" class="form-label">Precio:</label>
                                    <input type="text" class="form-control" placeholder="Precio: $50,000" name="price">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3 mt-3">
                                    <label class="form-label">Descripción</label>
                                    <textarea class="form-control" rows="12" placeholder="Producto capilar para el pelo"
                                        name="description"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-group mb-3">
                                    <input type="file" name="product-image" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer float-end">
                        <input type="submit" name="new-product" class="btn btn-success text-light" value="Añadir producto">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
}
?>