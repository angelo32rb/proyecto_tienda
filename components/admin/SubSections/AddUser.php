<?php
if (isset($_POST["user"]) && isset($_POST["email"]) && isset($_POST["tel"]) && isset($_POST["direction"]) && isset($_POST["password"]) && $_SESSION["rol"] == "admin") {


    $newUserObj = new UserDTO();
    $newUserObj->setUser($_POST["user"]);
    $newUserObj->setEmail($_POST["email"]);
    $newUserObj->setNumber($_POST["tel"]);
    $newUserObj->setDirection($_POST["direction"]);
    $newUserObj->setPassword($_POST["password"]);

    if ($_POST["rol"] == 1) {
        $newUserObj->setRol("trabajador");
    } else {
        $newUserObj->setRol("admin");
    }

    $newUser = new UserController($newUserObj);

    if ($newUser->createUser()) {
        $toast->fireSwalAlert("Se ha creado el usuario.");
    } else {
        $toast->sendError("No se pudo crear el usuario.");
    }

}

// Verificamos que este componente solo se le cargue a los administradores.
if ($_SESSION["rol"] == "admin" || $_SESSION["rol"] == "trabajador") {

    ?>

    <!-- Add User Subsection -->
    <div class="d-none container d-flex align-items-center justify-content-center vh-100 flex-wrap"
        id="add-user-subsection">
        <div class="row w-100 pb-5">
            <button class="btn btn-outline-light text-center mt-5 mb-5"
                onclick="closeSubsection('users-app', 'add-user-subsection')">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5" />
                </svg>
                Volver atrás
            </button>
            <div class="card p-5 shadow-lg">
                <div class="card-header text-center">
                    <h4 class="display-4">Añadir usuario</h4>
                </div>
                <form method="post">
                    <div class="card-body p-5">
                        <div class="col-12">

                            <div class="row">
                                <div class="col mb-3 mt-3">
                                    <label for="user" class="form-label">Usuario:</label>
                                    <input type="text" class="form-control" placeholder="Introduce el usuario" name="user">
                                </div>
                                <div class="col mb-3 mt-3">
                                    <label for="email" class="form-label">Correo electrónico:</label>
                                    <input type="email" class="form-control" placeholder="Introduce el correo electrónico"
                                        name="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3 mt-3">
                                    <label for="tel" class="form-label">Teléfono:</label>
                                    <input type="text" class="form-control" placeholder="Introduce el número de teléfono"
                                        name="tel">
                                </div>
                                <div class="col mb-3 mt-3">
                                    <label for="direction" class="form-label">Dirección:</label>
                                    <input type="text" class="form-control" placeholder="Introduce el correo electrónico"
                                        name="direction">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3 mt-3">
                                    <label for="direction" class="form-label">Contraseña:</label>
                                    <input type="password" class="form-control"
                                        placeholder="Introduce la contraseña del usuario" name="password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3 mt-3">
                                    <label for="rol" class="form-label">Elige el rol:</label>
                                    <select name="rol" class="form-select">
                                        <option value="1">Trabajador</option>
                                        <option value="2">Administrador</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer float-end">
                        <input type="submit" class="btn btn-success text-light" value="Añadir usuario">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
}
?>