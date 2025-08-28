<!-- Componente productos -->
<div class="row" id="productos-page">
    <div class="row ">
        <div class="col text-center">
            <h1 class="m-5 title-display">Productos</h1>
        </div>
    </div>

    <?php

    $productController = new ProductController(null);

    $products = $productController->getProducts();

    if ($products == null) {
        echo '<h5 class="mt-3 display-5 text-light text-center">No hay productos</h5>';
    } else {
        foreach ($products as $product) {
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
                        <button class="btn btn-outline-light float-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>';
        }
    }


    ?>
</div>