<?php

class Message
{
    private $db;
    private $messageObj;

    public function __construct($messageObj)
    {
        $this->db = new mysqli("localhost", "root", "", "tienda_cosmeticos");

        if ($this->db->connect_error) {
            die("Se ha producido un error al conectar a la base de datos.");
        }

        $this->messageObj = $messageObj;
    }
    public function __destruct()
    {

        if ($this->db) {
            $this->db->close();
        }

    }

    public function getAllMessages()
    {
        $sql = "SELECT * FROM mensajes;";
        $result = $this->db->query($sql);

        $messages = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $messages[] = $row;
            }
        }



        return $messages;
    }

    public function getMessagePerId()
    {

        $id = $this->messageObj->getId();

        $sql = "SELECT * FROM mensajes WHERE id = ?;";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);

        if (!$stmt->execute()) {
            die("No se pudo sacar el mensaje con id: " . $id);
        }

        $result = $stmt->get_result();
        $message = [];

        if ($result->num_rows > 0) {
            $message = $result->fetch_assoc();

        }

        $stmt->close();


        return $message;
    }

    public function addMessage()
    {

        $name = $this->messageObj->getName();
        $email = $this->messageObj->getEmail();
        $message = $this->messageObj->getMessage();

        $sql = "INSERT INTO mensajes (name, email, message) VALUES (?, ?, ?);";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $message);

        if (!$stmt->execute()) {
            die("No se pudo insertar el mensaje de: " . $name);
        }

        $stmt->close();


        return True;

    }
}