<?php

require_once '../models/User.php';
require_once '../dto/UserDTO.php';

class UserController
{
    private $userModel;

    public function __construct($userObj)
    {
        $this->userModel = new User($userObj);
    }

    public function login()
    {
        $validated = $this->userModel->checkUserAndPassword();

        if (!$validated) {
            return $validated;
        }

        $userAccount = $this->userModel->getRolFromUser();

        $userInformation = new UserDTO();
        $userInformation->setUser($userAccount["user"]);
        $userInformation->setRol($userAccount["rol"]);

        return $userInformation;

    }

    public function validateUserAndRol()
    {
        $validated = $this->userModel->checkUserAndRol();

        return $validated;
    }

    public function getAllUsers()
    {
        $usersData = $this->userModel->getAllUsers();
        $userObj = null;
        $userDTO = [];

        foreach ($usersData as $user) {

            $userObj = new UserDTO();

            $userObj->setId($user["id"]);
            $userObj->setUser($user["user"]);
            $userObj->setEmail($user["email"]);
            $userObj->setNumber($user["number"]);
            $userObj->setDirection($user["direction"]);
            $userObj->setRol($user["rol"]);

            $userDTO[] = $userObj;
        }

        return $userDTO;
    }

    public function createUser()
    {

        $newUser = $this->userModel->addUser();
        if (!$newUser) {
            return False;
        }

        return True;
    }

    public function removeUser()
    {
        $deleteUser = $this->userModel->deleteUser();
        if (!$deleteUser) {
            return False;
        }

        return True;
    }

    public function updateUser()
    {
        $updateUser = $this->userModel->updateUserPerId();
        if (!$updateUser) {
            return False;
        }

        return True;
    }

}