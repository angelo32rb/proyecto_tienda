<?php

class UserDTO
{
    private $id;
    private $user;
    private $password;
    private $email;
    private $number;
    private $direction;
    private $rol;

    public function getId()
    {
        return $this->id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getDirection()
    {
        return $this->direction;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function setDirection($direction)
    {
        $this->direction = $direction;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

}