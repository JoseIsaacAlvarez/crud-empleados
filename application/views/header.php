<!-- Vista Principal: home.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Manager</title>

    <!-- Cargar CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap5.3.0.min.css'); ?>">
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-black fixed-top">
        <div class="container">
            <a class="navbar-brand text-white" href="#">Employee Manager</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="<?php echo site_url('home'); ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="<?php echo site_url('employees'); ?>">Empleados</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="<?php echo site_url('auth/login'); ?>">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
