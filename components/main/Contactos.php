<?php

if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"]) && isset($_POST["contactForm"])) {

    $messageObj = new MessageDTO();
    $messageObj->setName($_POST["name"]);
    $messageObj->setEmail($_POST["email"]);
    $messageObj->setMessage($_POST["message"]);

    $messageController = new MessageController($messageObj);

    $toast = new Toasts();

    if (!$messageController->sendMessage()) {
        $toast->sendError("No se pudo enviar el mensaje");
    }

    $toast->sendSuccess("Se ha enviado tu mensaje.");
}

?>

<!-- Componente contactos -->
<div class="row mt-5" id="contactos-page">
    <form method="post">
        <div class="card shadow-lg">
            <div class="card-header">
                <h4 class="display-4 text-center">Contáctenos</h4>
            </div>

            <div class="card-body">
                <div class="row d-flex flex-column-reverse flex-md-row">
                    <div class="col mt-5 d-flex justify-content-center justify-content-md-start">
                        <img src="../assets/imgs/carrera.png" alt="Dirección" class="img-fluid rounded w-75">
                    </div>
                    <div class="col">
                        <div class="mt-2">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" placeholder="Lucía Marrana" name="name" required>
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" placeholder="luciam@gmail.com" name="email"
                                required>
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Mensaje</label>
                            <textarea class="form-control" rows="8" name="message" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-outline-light float-end" value="Contactar" name="contactForm">
            </div>
        </div>
    </form>
</div>