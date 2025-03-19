<!-- Vista Principal: home.php -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Employee Manager</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('home'); ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('employees'); ?>">Empleados</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('auth/login'); ?>">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container text-center mt-5">
        <h1>Bienvenido a Employee Manager</h1>
        <p>Una aplicación para la gestión de empleados en tu empresa.</p>
        <img src="https://via.placeholder.com/800x400" class="img-fluid" alt="Employee Manager">
    </div>
