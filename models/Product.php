<?php

class Product
{
    private $db;
    private $productObj;

    public function __construct($productObj)
    {
        $this->db = new mysqli("localhost", "root", "", "tienda_cosmeticos");

        if ($this->db->connect_error) {
            die("Se ha producido un error al conectar a la base de datos.");
        }

        $this->productObj = $productObj;
    }

    public function __destruct()
    {

        if ($this->db) {
            $this->db->close();
        }

    }

    public function getAllProducts()
    {
        $sql = "SELECT * FROM productos;";
        $result = $this->db->query($sql);

        $products = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }

        return $products;
    }

    public function getProductPerId()
    {

        $id = $this->productObj->getId();

        $sql = "SELECT * FROM productos WHERE id = ?;";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);

        if (!$stmt->execute()) {
            die("No se pudo sacar el producto con id: " . $id);
        }

        $result = $stmt->get_result();
        $product = null;

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
        }

        $stmt->close();


        return $product;
    }

    public function updateProduct()
    {

        $id = $this->productObj->getId();
        $title = $this->productObj->getTitle();
        $description = $this->productObj->getDescription();
        $price = $this->productObj->getPrice();

        $sql = "UPDATE productos SET title = ?, description = ?, price = ? WHERE id = ?;";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssi", $title, $description, $price, $id);

        if (!$stmt->execute()) {
            die("No se pudo actualizar el producto con id: " . $id);
        }

        $stmt->close();


        return True;
    }

    public function removeProduct()
    {

        $id = $this->productObj->getId();

        $sql = "DELETE FROM productos WHERE id = ?;";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);

        if (!$stmt->execute()) {
            die("No se pudo borrar el producto con id: " . $id);
        }

        $stmt->close();


        return True;
    }

    public function addProduct()
    {

        $title = $this->productObj->getTitle();
        $description = $this->productObj->getDescription();
        $price = $this->productObj->getPrice();
        $imgName = $this->productObj->getImage();

        $sql = "INSERT INTO productos (title, description, price, route_img) VALUES (?, ?, ?, ?);";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssss", $title, $description, $price, $imgName);

        if (!$stmt->execute()) {
            die("No se pudo insertar el producto con title: " . $title);
        }

        $stmt->close();


        return True;
    }
}
