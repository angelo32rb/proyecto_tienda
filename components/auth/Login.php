<?php

if (isset($_POST["user"]) && isset($_POST["password"]) && isset($_POST["loginForm"])) {
    $userObj = new UserDTO();

    $userObj->setUser($_POST["user"]);
    $userObj->setPassword($_POST["password"]);

    $userController = new UserController($userObj);
    $validated = $userController->login();

    if ($validated) {
        $session->createSession($validated);
        header('Location: ../pages/admin.php');
        exit();
    }

    if (!$validated) {
        $toast = new Toasts();
        $toast->sendError("Contraseña o usuario incorrecto.");
    }
}

if (isset($_GET["msg"]) && $_GET["msg"] == "registered") {
    $toast = new Toasts();
    $toast->sendSuccess("Se acaba de crear el usuario, inicia sesión para entrar al panel.");
}
?>

<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="card p-5 shadow-lg">
        <div class="card-header">
            <h4 class="display-4">Iniciar sesión</h4>
        </div>
        <form method="post">
            <div class="card-body">
                <div class="mb-3 mt-3">
                    <label for="user" class="form-label">Usuario:</label>
                    <input type="text" class="form-control" id="user" placeholder="Introduce tu usuario" name="user">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="*********" name="password">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">¿No tienes cuenta? <a href="register.php"
                            style="color: #fff !important;">¡Regístrate
                            aquí!</a></label>
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-outline-light float-end slider-button" value="Iniciar sesión"
                    name="loginForm">
            </div>
        </form>
    </div>
</div>