<?php

class Session
{
    public function createSession($userObj)
    {
        $_SESSION["user"] = $userObj->getUser();
        $_SESSION["rol"] = $userObj->getRol();

        return true;
    }

    public function isLoggedIn()
    {

        if (!isset($_SESSION["user"]) || !isset($_SESSION["rol"])) {
            return false;
        }

        return true;
    }

    public function validateSession()
    {

        $userObj = new UserDTO();
        $userObj->setUser($_SESSION["user"]);
        $userObj->setRol($_SESSION["rol"]);

        $userController = new UserController($userObj);
        if (!$userController->validateUserAndRol()) {
            return false;
        }

        return true;
    }

    public function closeSession()
    {
        session_start();
        session_unset();
        session_destroy();
    }
}