<?php

if ($_SESSION["rol"] == "admin" || $_SESSION["rol"] == "trabajador") {
    foreach ($messages as $message) {
        echo '
            <div class="d-none container d-flex align-items-center justify-content-center vh-100 flex-wrap"
            id="show-message-' . htmlspecialchars($message->getId()) . '">
                <div class="row w-100 pb-5">
                    <button class="btn btn-outline-light text-center mt-5 mb-5"
                        onclick="closeSubsection(\'message-app\', \'show-message-' . htmlspecialchars($message->getId()) . '\')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5" />
                        </svg>
                        Volver atrás
                    </button>
                    <div class="card p-5 shadow-lg">
                        <div class="card-header text-center">
                            <h4 class="display-4">Mensaje</h4>
                        </div>
                        <div class="card-body p-5">
                            <div class="col-12">
    
                                <div class="row">
                                    <div class="col mb-3 mt-3">
                                        <label for="title" class="form-label">Nombre:</label>
                                        <input type="text" readonly class="form-control" placeholder="Nombre de la persona" value="' . htmlspecialchars($message->getName()) . '">
                                    </div>
                                    <div class="col mb-3 mt-3">
                                        <label for="price" class="form-label">Email:</label>
                                        <input type="text" readonly class="form-control" placeholder="Email" value="' . htmlspecialchars($message->getEmail()) . '">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3 mt-3">
                                        <label class="form-label">Mensaje</label>
                                        <textarea class="form-control" readonly rows="12" placeholder="Mensaje">' . htmlspecialchars($message->getMessage()) . '</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }
}
