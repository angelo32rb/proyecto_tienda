<?php
if ((isset($_POST["_method"]) && $_POST["_method"] === 'DELETE') && isset($_POST["id"]) && isset($_POST["image"]) && $_SESSION["rol"] == "admin") {

    $deletedProductObj = new ProductDTO();

    $deletedProductObj->setId($_POST["id"]);
    $deletedProductObj->setImage($_POST["image"]);

    $deletedProduct = new ProductController($deletedProductObj);

    if ($deletedProduct->deleteProduct()) {
        $toast->fireSwalAlert("Se ha eliminado el producto.");
    } else {
        $toast->sendError("No se pudo actualizar el producto.");
    }
}
?>
<!-- Product App Page -->
<div class="d-none container d-flex align-items-center justify-content-center vh-100 flex-wrap" id="product-app">
    <div class="row w-100 pb-5">
        <h5 class="pt-3 mb-5 display-5 text-light text-center">Gestionar productos</h5>
        <button class="btn btn-outline-light text-center" onclick="closeSection('product-app')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5" />
            </svg>
            Volver atrás
        </button>

        <?php
        $productController = new ProductController(null);
        $products = $productController->getProducts();

        foreach ($products as $product) {
            if ($_SESSION["rol"] == "admin") {
                echo '
                    <div class="col-12 col-md-6 col-lg-3 mt-5">
                        <div class="card shadow-lg">
                            <div class="card-header">
                                <img src="' . htmlspecialchars($product->getImage()) . '" alt="' . htmlspecialchars($product->getTitle()) . '" class="img-fluid rounded">
                            </div>
                            <div class="card-body">
                                <h4 class="display-4">' . htmlspecialchars($product->getTitle()) . '</h4>
                                <p>' . htmlspecialchars($product->getDescription()) . '</p>
                            </div>
                            <div class="card-footer">
                                <span class="float-start">$' . htmlspecialchars($product->getPrice()) . '</span>
                                <button class="btn btn-info float-end text-light"
                                    onclick="openSubsection(\'product-app\', \'edit-product-subsection-' . htmlspecialchars($product->getId()) . '\')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                </button>
                                <form method="post">
                                    <input type="hidden" name="id" value="' . htmlspecialchars($product->getId()) . '">
                                    <input type="hidden" name="image" value="' . htmlspecialchars($product->getImage()) . '">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger float-end" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                ';
            } else {
                echo '
                    <div class="col-12 col-md-6 col-lg-3 mt-5">
                        <div class="card shadow-lg">
                            <div class="card-header">
                                <img src="' . htmlspecialchars($product->getImage()) . '" alt="' . htmlspecialchars($product->getTitle()) . '" class="img-fluid rounded">
                            </div>
                            <div class="card-body">
                                <h4 class="display-4">' . htmlspecialchars($product->getTitle()) . '</h4>
                                <p>' . htmlspecialchars($product->getDescription()) . '</p>
                            </div>
                            <div class="card-footer">
                                <span class="float-start">$' . htmlspecialchars($product->getPrice()) . '</span>
                                <button class="btn btn-info float-end text-light"
                                    onclick="openSubsection(\'product-app\', \'edit-product-subsection-' . htmlspecialchars($product->getId()) . '\')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                ';
            }
        }
        ?>


        <div class="pt-5 col-12 col-md-6 col-lg-3 mt-5">
            <div class="card p-5 shadow-lg logout-card"
                onclick="openSubsection('product-app', 'add-product-subsection')">
                <div class="card-header text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor"
                        class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                        <path fill="#34cd4e" fill-rule="evenodd"
                            d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5z" />
                    </svg>
                </div>
                <div class="card-body text-center pt-5">
                    <p class="display-6">
                        Añadir producto
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>