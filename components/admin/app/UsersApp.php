<?php
if ((isset($_POST["_method"]) && $_POST["_method"] === "DELETE") && isset($_POST["id"]) && $_SESSION["rol"] == "admin") {
    $deleteUserObj = new UserDTO();

    $deleteUserObj->setId($_POST["id"]);

    $deletedUser = new UserController($deleteUserObj);
    if ($deletedUser->removeUser()) {
        $toast->fireSwalAlert("Se ha eliminado el usuario.");
    } else {
        $toast->sendError("No se pudo borrar el usuario.");
    }
}
?>
<!-- Users App Page -->
<div class="d-none container d-flex align-items-center justify-content-center vh-100 flex-wrap" id="users-app">
    <div class="row w-100 pb-5">
        <button class="btn btn-outline-light text-center mb-3" onclick="closeSection('users-app')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5" />
            </svg>
            Volver atrás
        </button>
        <div class="card p-5 shadow-lg">
            <div class="card-header text-center">
                <h4 class="display-4">Usuarios</h4>
            </div>
            <div class="card-body p-5">
                <div class="col-12">
                    <table class="table table-responsive userTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $userController = new UserController(null);
                            $users = $userController->getAllUsers();

                            foreach ($users as $user) {
                                if ($_SESSION["rol"] == "admin") {
                                    echo '
                                        <tr>
                                            <td>' . htmlspecialchars($user->getId()) . '</td>
                                            <td>' . htmlspecialchars($user->getUser()) . '</td>
                                            <td>' . htmlspecialchars($user->getEmail()) . '</td>
                                            <td>' . htmlspecialchars($user->getNumber()) . '</td>
                                            <td>' . htmlspecialchars($user->getDirection()) . '</td>
                                            <td>
                                                <button class="btn btn-info text-light"
                                                    onclick="openSubsection(\'users-app\', \'edit-user-subsection-' . htmlspecialchars($user->getId()) . '\');">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                                    </svg>
                                                </button>
                                                <form method="post">
                                                    <input type="hidden" name="id" value="' . htmlspecialchars($user->getId()) . '" />
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <button class="btn btn-danger" type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                            fill="currentColor" class="bi bi-person-dash" viewBox="0 0 16 16">
                                                            <path
                                                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1m0-7a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                                            <path
                                                                d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    ';
                                } else {
                                    echo '
                                        <tr>
                                            <td>' . htmlspecialchars($user->getId()) . '</td>
                                            <td>' . htmlspecialchars($user->getUser()) . '</td>
                                            <td>' . htmlspecialchars($user->getEmail()) . '</td>
                                            <td>' . htmlspecialchars($user->getNumber()) . '</td>
                                            <td>' . htmlspecialchars($user->getDirection()) . '</td>
                                            <td>No tienes permisos</td>
                                        </tr>
                                    ';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <button class="float-end btn btn-success" onclick="openSubsection('users-app', 'add-user-subsection');">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                        class="bi bi-person-add" viewBox="0 0 16 16">
                        <path
                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                        <path
                            d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</div>