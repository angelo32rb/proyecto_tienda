<?php

require_once '../models/Product.php';
require_once '../dto/ProductDTO.php';

class ProductController
{
    private $productModel;
    private $productObj;

    public function __construct($productObj)
    {
        $this->productModel = new Product($productObj);
        $this->productObj = $productObj;
    }

    public function getProducts()
    {
        $productsData = $this->productModel->getAllProducts();
        $productObj = null;
        $productDTO = [];

        foreach ($productsData as $product) {
            $productObj = new ProductDTO();
            $productObj->setId($product['id']);
            $productObj->setTitle($product['title']);
            $productObj->setDescription($product['description']);
            $productObj->setPrice($product['price']);
            $productObj->setImage($product['route_img']);

            $productDTO[] = $productObj;
        }

        return $productDTO;
    }

    public function createProduct($tmpImage, $image)
    {

        $uploadDir = "../uploads/";
        $file = $uploadDir . basename($image);

        $fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        // Verificar extensión
        if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
            return False;
        }

        // Verificar que no exista ya el archivo
        if (file_exists($file)) {
            return False;
        }

        if (move_uploaded_file($tmpImage, $file)) {

            $this->productObj->setImage($file);
            $createdProduct = $this->productModel->addProduct();

            if (!$createdProduct) {
                return False;
            }

            return True;

        } else {
            return False;
        }

    }

    public function updateProduct()
    {

        $updatedProduct = $this->productModel->updateProduct();

        if (!$updatedProduct) {
            return False;
        }

        return True;
    }

    public function deleteProduct()
    {

        // Borramos archivo
        if (!unlink($this->productObj->getImage())) {
            return False;
        }

        $deletedProduct = $this->productModel->removeProduct();

        if (!$deletedProduct) {
            return False;
        }

        return True;
    }
}
