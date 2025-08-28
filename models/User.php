<?php

class User
{
    private $db;
    private $userObj;

    public function __construct($userObj)
    {
        $this->db = new mysqli("localhost", "root", "", "tienda_cosmeticos");

        if ($this->db->connect_error) {
            die("Se ha producido un error al conectar a la base de datos.");
        }

        $this->userObj = $userObj;
    }

    public function __destruct()
    {

        if ($this->db) {
            $this->db->close();
        }

    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";
        $result = $this->db->query($sql);

        $users = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }

        return $users;
    }

    public function getUserPerId()
    {

        $id = $this->userObj->getId();

        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);

        if (!$stmt->execute()) {
            die("No se pudo sacar el usuario con id: " . $id);
        }

        $result = $stmt->get_result();
        $user = null;

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
        }

        $stmt->close();


        return $user;

    }

    public function updateUserPerId()
    {

        $id = $this->userObj->getId();
        $user = $this->userObj->getUser();
        $email = $this->userObj->getEmail();
        $number = $this->userObj->getNumber();
        $direction = $this->userObj->getDirection();
        $rol = $this->userObj->getRol();

        $sql = "UPDATE users SET user = ?, email = ?, number = ?, direction= ?, rol = ? WHERE id = ?;";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('sssssi', $user, $email, $number, $direction, $rol, $id);

        if (!$stmt->execute()) {
            die("No se pudo actualizar el usuario: " . $user);
        }

        $stmt->close();


        return True;

    }

    public function deleteUser()
    {

        $id = $this->userObj->getId();

        $sql = "DELETE FROM users WHERE id = ?;";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);

        if (!$stmt->execute()) {
            die("No se pudo borrar el usuario: " . $this->userObj->getUser());
        }

        $stmt->close();


        return True;

    }

    public function addUser()
    {

        $user = $this->userObj->getUser();
        $password = $this->userObj->getPassword();
        $email = $this->userObj->getEmail();
        $number = $this->userObj->getNumber();
        $direction = $this->userObj->getDirection();
        $rol = $this->userObj->getRol();

        // Validamos de que no está repetido el usuario
        $sql = "SELECT * FROM users WHERE user = ?;";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $user);

        if (!$stmt->execute()) {
            die("No se pudo conseguir el usuario: " . $user);
        }

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $stmt->close();

            return False;
        }

        $sql = "INSERT INTO users (user, password, email, number, direction, rol) VALUES (?, ?, ?, ?, ?, ?);";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ssssss', $user, $password, $email, $number, $direction, $rol);

        if (!$stmt->execute()) {
            die("No se pudo registrar el nuevo usuario: " . $user . "\nError: " . $stmt->error);
        }

        $stmt->close();


        return True;
    }

    public function checkUserAndPassword()
    {
        $user = $this->userObj->getUser();
        $password = $this->userObj->getPassword();

        $sql = "SELECT * FROM users WHERE user = ? AND password = ?;";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $user, $password);

        if (!$stmt->execute()) {
            die("No se pudo conseguir información del usuario: " . $user);
        }

        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $stmt->close();

            return False;
        }

        $stmt->close();

        return True;

    }

    public function checkUserAndRol()
    {

        $user = $this->userObj->getUser();
        $rol = $this->userObj->getRol();

        $sql = "SELECT * FROM users WHERE user = ? AND rol = ?;";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ss', $user, $rol);

        if (!$stmt->execute()) {
            die("No se pudo conseguir información del usuario y rol de: " . $user);
        }

        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $stmt->close();

            return False;
        }

        $stmt->close();

        return True;

    }

    public function getRolFromUser()
    {
        $user = $this->userObj->getUser();

        $sql = "SELECT user, rol FROM users WHERE user = ?;";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $user);

        if (!$stmt->execute()) {
            die("No se pudo sacar información del usuario y del rol de: " . $user);
        }

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $stmt->close();
            return $result->fetch_assoc();
        }

        $stmt->close();


        return False;
    }
}