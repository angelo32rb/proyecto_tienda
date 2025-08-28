<?php
// Creamos sesión vacía
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Login</title>
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
</head>

<body>
    <?php

    // Controllers
    require_once '../controllers/UserController.php';

    // Sessions
    require_once '../components/Sessions/Session.php';

    // Validate session
    $session = new Session();
    if ($session->isLoggedIn()) {
        header('Location: ../pages/admin.php');
        exit();
    }

    // Notifications
    require_once('../components/Notifications/Toasts.php');

    // Components
    require_once('../components/auth/Login.php');
    ?>

    <!-- Bootstrap 5 JS's Library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>