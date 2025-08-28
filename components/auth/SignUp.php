<?php

if (isset($_POST["user"]) && isset($_POST["password"]) && isset($_POST["repeat-password"]) && isset($_POST["email"]) && isset($_POST["number"]) && isset($_POST["direction"]) && isset($_POST["registerForm"])) {

    if ($_POST["password"] == $_POST["repeat-password"]) {
        $userObj = new UserDTO();

        $userObj->setUser($_POST["user"]);
        $userObj->setPassword($_POST["password"]);
        $userObj->setEmail($_POST["email"]);
        $userObj->setNumber($_POST["number"]);
        $userObj->setDirection($_POST["direction"]);
        $userObj->setRol("usuario");

        $userController = new UserController($userObj);
        $userCreated = $userController->createUser();

        if ($userCreated) {
            header('Location: ../pages/login.php?msg=registered');
            exit();
        }

        if (!$userCreated) {
            $toast = new Toasts();
            $toast->sendError("Contraseña o usuario incorrecto.");
        }
    } else {
        $toast = new Toasts();
        $toast->sendError("Las contraseñas no coinciden.");
    }

}
?>

<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="card p-5 shadow-lg">
        <div class="card-header">
            <h4 class="display-4">Regístrate</h4>
        </div>
        <form method="post">
            <div class="card-body">
                <div class="mb-3 mt-3">
                    <label for="user" class="form-label">Usuario:</label>
                    <input type="text" class="form-control" id="user" placeholder="Introduce tu usuario" name="user"
                        required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="user" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Introduce tu correo electrónico"
                        name="email" required>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" id="pwd" placeholder="*********" name="password"
                                required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Repetir contraseña:</label>
                            <input type="password" class="form-control" id="pwd" placeholder="*********"
                                name="repeat-password" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="num" class="form-label">Teléfono:</label>
                    <input type="tel" class="form-control" id="num" placeholder="321-123-1234 " name="number"
                        pattern="[3]{1}[0-9]{2}-[0-9]{3}-[0-9]{4}" required>
                </div>
                <div class="mb-3">
                    <label for="direc" class="form-label">Dirección:</label>
                    <input type="text" class="form-control" id="direc" placeholder="Un lugar perdido en venezuela"
                        name="direction" required>
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">¿Ya tienes cuenta? <a href="login.php"
                            style="color: #fff !important;">¡Inicia sesión aquí!</a></label>
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-outline-light float-end slider-button" value="Registrarse"
                    name="registerForm">
            </div>
        </form>
    </div>
</div>