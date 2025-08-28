<?php

class Toasts
{
    public function sendSuccess($notification)
    {
        echo '
            <!-- Toasts -->
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050">
                <div class="toast show align-items-center text-white bg-success border-0" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                            </svg> &nbsp;&nbsp;
                            ' . $notification . '
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        ';
    }

    public function sendError($notification)
    {
        echo '
            <!-- Toasts -->
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050">
                <div class="toast show align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                            </svg> &nbsp;&nbsp;
                            ' . $notification . '
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        ';
    }

    public function fireSwalAlert($message)
    {
        echo '
            <!-- SweetAlert 2 -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            
            <script>
                Swal.fire({
                    title: "' . $message . '",
                    confirmButtonText: "OK"
                }).then((result) => {
                    window.location.href = "' . $_SERVER["PHP_SELF"] . '";
                });
            </script>
        ';
    }
}