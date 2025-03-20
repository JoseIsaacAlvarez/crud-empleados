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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js');?>"></script>
    
    <script type="text/javascript">
    var SITE_URL = "<?php echo site_url(); ?>";
    var BASE_URL = '<?= base_url();?>';
    role_id = <?php echo $this->session->userdata('role_id'); ?> ? <?php echo $this->session->userdata('role_id'); ?> : 0;
    localStorage.setItem('role_id', role_id);
    </script>

    
</head>
<body class="d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg navbar-light bg-black fixed-top">
    <div class="container d-flex justify-content-between align-items-center">
        
        <!-- Logo -->
        <a class="navbar-brand text-white col-md-4" href="#">Employee Manager</a>

        <!-- Nombre del empleado con icono -->
        <div class="col-md-4 text-center">
        <?php  $name_employee = $this->session->userdata('name_employee'); ?>    
            <?php if (!empty($name_employee->name)) : ?>
                <span class="text-white fw-bold">
                    <i class="fas fa-user me-2"></i> <?= htmlspecialchars($name_employee->name); ?>
                </span>
            <?php endif; ?>
        </div>

        <!-- Menú de navegación -->
        <div class="col-md-4 d-flex justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link text-white" href="<?php echo site_url('home'); ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="<?php echo site_url('employees'); ?>">Empleados</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="<?php echo site_url('login/logout'); ?>">Salir</a></li>
            </ul>
        </div>

    </div>
</nav>

