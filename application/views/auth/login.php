
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Manager: Login </title> 
    <link rel="icon" href="<?php echo base_url('assets/images/log.png'); ?>" type="image/x-icon">   
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap5.3.0.min.css'); ?>">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="width: 400px;">
            <h2 class="mb-4 text-center">Inicia sesión en Employee Manager</h2>
            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
            <?php endif; ?>
            <form method="post" action="<?php echo site_url('login/process_login'); ?>">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Correo Electrónico" required>
                    <label for="email">Correo Electrónico</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required>
                    <label for="password">Contraseña</label>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>
