<!-- Messages App Page -->
<div class="d-none container d-flex align-items-center justify-content-center vh-100 flex-wrap" id="message-app">
    <div class="row w-100 pb-5">
        <button class="btn btn-outline-light text-center mt-5 mb-5" onclick="closeSection('message-app')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5" />
            </svg>
            Volver atrás
        </button>
        <div class="card p-5 shadow-lg">
            <div class="card-header text-center">
                <h4 class="display-4">Mensajes</h4>
            </div>
            <div class="card-body p-5">
                <div class="col-12">
                    <table class="table table-responsive messageTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $messageController = new MessageController(null);
                            $messages = $messageController->getMessages();

                            foreach ($messages as $message) {
                                echo '
                                    <tr>
                                        <td>' . htmlspecialchars($message->getId()) . '</td>
                                        <td>' . htmlspecialchars($message->getName()) . '</td>
                                        <td>' . htmlspecialchars($message->getEmail()) . '</td>
                                        <td>
                                            <button class="btn btn-info text-light" onclick="openSubsection(\'message-app\', \'show-message-' . htmlspecialchars($message->getId()) . '\')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                ';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>