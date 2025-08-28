<?php

if (isset($_POST["id"]) && isset($_POST["title"]) && isset($_POST["price"]) && isset($_POST["description"]) && ($_SESSION["rol"] == "trabajador" || $_SESSION["rol"] == "admin")) {

    $updateProductObj = new ProductDTO();

    $updateProductObj->setId($_POST["id"]);
    $updateProductObj->setTitle($_POST["title"]);
    $updateProductObj->setPrice($_POST["price"]);
    $updateProductObj->setDescription($_POST["description"]);

    $updateProduct = new ProductController($updateProductObj);

    if ($updateProduct->updateProduct()) {
        $toast->fireSwalAlert("Se ha actualizado el producto.");
    } else {
        $toast->sendError("No se pudo actualizar el producto.");
    }

}

foreach ($products as $product) {
    if ($_SESSION["rol"] == "admin") {
        echo '
            <!-- Edit Product Subsection -->
            <div class="d-none container d-flex align-items-center justify-content-center vh-100 flex-wrap"
                id="edit-product-subsection-' . htmlspecialchars($product->getId()) . '">
                <div class="row w-100 pb-5">
                    <button class="btn btn-outline-light text-center mt-5 mb-5"
                        onclick="closeSubsection(\'product-app\', \'edit-product-subsection-' . htmlspecialchars($product->getId()) . '\')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5" />
                        </svg>
                        Volver atrás
                    </button>
                    <div class="card p-5 shadow-lg">
                        <div class="card-header text-center">
                            <h4 class="display-4">Editar producto</h4>
                        </div>
                        <form method="post">
                            <div class="card-body p-5">
                                <div class="col-12">

                                    <div class="row">
                                        <input type="hidden" value="' . $product->getId() . '" name="id">
                                        <div class="col mb-3 mt-3">
                                            <label for="title" class="form-label">Título:</label>
                                            <input type="text" class="form-control" placeholder="Título del producto" name="title" value="' . htmlspecialchars($product->getTitle()) . '">
                                        </div>
                                        <div class="col mb-3 mt-3">
                                            <label for="price" class="form-label">Precio:</label>
                                            <input type="text" class="form-control" placeholder="Precio: $50,000" name="price" value="' . htmlspecialchars($product->getPrice()) . '">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3 mt-3">
                                            <label class="form-label">Descripción</label>
                                            <textarea class="form-control" rows="12"
                                                placeholder="Producto capilar para el pelo" name="description">' . htmlspecialchars($product->getDescription()) . '</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer float-end">
                                <input type="submit" class="btn btn-info text-light" value="Editar producto">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        ';
    } else {
        echo '
            <!-- Edit Product Subsection -->
            <div class="d-none container d-flex align-items-center justify-content-center vh-100 flex-wrap"
                id="edit-product-subsection-' . htmlspecialchars($product->getId()) . '">
                <div class="row w-100 pb-5">
                    <button class="btn btn-outline-light text-center mt-5 mb-5"
                        onclick="closeSubsection(\'product-app\', \'edit-product-subsection-' . htmlspecialchars($product->getId()) . '\')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5" />
                        </svg>
                        Volver atrás
                    </button>
                    <div class="card p-5 shadow-lg">
                        <div class="card-header text-center">
                            <h4 class="display-4">Editar producto</h4>
                        </div>
                        <form>
                            <div class="card-body p-5">
                                <div class="col-12">

                                    <div class="row">
                                        <div class="col mb-3 mt-3">
                                            <label for="title" class="form-label">Título:</label>
                                            <input readonly type="text" class="disabled form-control" placeholder="Título del producto" name="title" value="' . htmlspecialchars($product->getTitle()) . '">
                                        </div>
                                        <div class="col mb-3 mt-3">
                                            <label for="price" class="form-label">Precio:</label>
                                            <input readonly type="text" class="disabled  form-control" placeholder="Precio: $50,000" name="price" value="' . htmlspecialchars($product->getPrice()) . '">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3 mt-3">
                                            <label class="form-label">Descripción</label>
                                            <textarea readonly class="disabled form-control" rows="12"
                                                placeholder="Producto capilar para el pelo">' . htmlspecialchars($product->getDescription()) . '</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer float-end">
                                <input class="disabled btn btn-info text-light" value="Editar producto">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}