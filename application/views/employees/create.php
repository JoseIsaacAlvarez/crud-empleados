<?php $this->load->view("header"); ?>

    <div class="container mt-5">
        <h2 class="mb-4">Agregar Nuevo Empleado</h2>
        <form method="post" action="<?php echo site_url('employees/store'); ?>" class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="employee_name" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Apellido:</label>
                <input type="text" class="form-control" name="last_name" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" name="birthdate" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Departamento:</label>
                <input type="number" class="form-control" name="department_id" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Fecha de Contratación:</label>
                <input type="date" class="form-control" name="hiring_date" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Rol:</label>
                <input type="number" class="form-control" name="role_id" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Contraseña:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>

<?php $this->load->view("footer");?>