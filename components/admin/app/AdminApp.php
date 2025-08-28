<!-- Admin App Page -->
<div class="d-block container-fluid d-flex align-items-center justify-content-center vh-100 flex-wrap" id="admin-app">
    <div class="row w-75 pt-5">
        <div class="col-12 col-sm-6 col-lg-4 mb-4">
            <div class="card p-5 shadow-lg admin-card" onclick="showSection('product-app')">
                <div class="card-header text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor"
                        class="bi bi-cart-fill" viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                    </svg>
                </div>
                <div class="card-body text-center pt-5">
                    <h6 class="display-6">
                        Productos
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4 mb-4">
            <div class="card p-5 shadow-lg admin-card" onclick="showSection('users-app')">
                <div class="card-header text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor"
                        class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path
                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                    </svg>
                </div>
                <div class="card-body text-center pt-5">
                    <h6 class="display-6">
                        Usuarios
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4 mb-4">
            <div class="card p-5 shadow-lg admin-card" onclick="showSection('message-app')">
                <div class="card-header text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor"
                        class="bi bi-chat-left-dots-fill" viewBox="0 0 16 16">
                        <path
                            d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                    </svg>
                </div>
                <div class="card-body text-center pt-5">
                    <h6 class="display-6">
                        Mensajes
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row w-75 pb-5">
        <div class="col-12 col-sm-6 col-lg-4 mb-4">
        </div>
        <a class="col-12 col-sm-6 col-lg-4 mb-4 logout-card" style="text-decoration: none !important;"
            href="./../components/admin/logout.php">
            <div class="card p-5 shadow-lg">
                <div class="card-header text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor"
                        class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                        <path fill-rule="evenodd"
                            d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                    </svg>
                </div>
                <div class="card-body text-center pt-5">
                    <h6 class="display-6">
                        Cerrar sesión
                    </h6>
                </div>
            </div>
        </a>
    </div>
</div>