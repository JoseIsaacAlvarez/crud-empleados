<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Restringido</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap5.3.0.min.css'); ?>">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100 bg-light">
        <div class="text-center p-5 shadow rounded bg-white">
            <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 4rem;"></i>
            <h2 class="mt-3 text-danger">Acceso Restringido</h2>
            <p class="mt-2 text-muted">No tienes permiso para realizar esta acción.</p>
            <a href="javascript:history.back()" class="btn btn-primary mt-3">Volver</a>
        </div>
    </div>
</body>
</html>
