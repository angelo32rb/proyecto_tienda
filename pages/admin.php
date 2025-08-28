<?php
// Creamos sesión vacía
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <!-- Bootstrap 5 CSS's -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Grey+Qo&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Grey+Qo&display=swap"
        rel="stylesheet">

    <!-- DataTables  -->
    <link href="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet"
        type="text/css">
</head>
<?php
if ($_SESSION["rol"] == "usuario") {
    echo "
        <h2 class='display-2 text-light text-center'>Eres usuario, no tienes permisos a nada</h2>
        <a href='../components/admin/logout.php' class='display-5' style='color: #fff !important;'>Cerrar sesión aquí</a>
        ";
} else {
    ?>

    <body>
        <?php
        // Controllers
        require_once('../controllers/MessageController.php');
        require_once('../controllers/ProductController.php');
        require_once('../controllers/UserController.php');

        // Sessions
        require_once('../components/Sessions/Session.php');
        $session = new Session();
        if (!$session->isLoggedIn() || !$session->validateSession()) {
            $session->closeSession();
            header('Location: ./../');
            exit();
        }

        // Notifications
        require_once('../components/Notifications/Toasts.php');
        $toast = new Toasts();

        // Apps
        require_once('../components/admin/app/AdminApp.php');
        require_once('../components/admin/app/ProductsApp.php');
        require_once('../components/admin/app/UsersApp.php');
        require_once('../components/admin/app/MessagesApp.php');

        // SubSections
        require_once('../components/admin/SubSections/AddUser.php');
        require_once('../components/admin/SubSections/EditUser.php');
        require_once('../components/admin/SubSections/AddProduct.php');
        require_once('../components/admin/SubSections/Messages.php');
        require_once('../components/admin/SubSections/EditProduct.php');

        ?>

        <!-- Bootstrap 5 JS's Library -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables -->
        <script src="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.js"
            type="text/javascript"></script>

        <script src="../assets/js/Services.js"></script>
    </body>

    <?php
}
?>

</html>