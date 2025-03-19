<?php $this->load->view("header"); ?>

<div class="container mt-5">
    <h2 class="mb-4">Agregar Nuevo Empleado</h2>
    <form method="post" action="<?php echo site_url('employees/store'); ?>" class="row g-3">
        <div class="col-md-6 form-floating">
            <input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="Nombre" required>
            <label for="employee_name">Nombre</label>
        </div>
        <div class="col-md-6 form-floating">
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Apellido" required>
            <label for="last_name">Apellido</label>
        </div>
        <div class="col-md-6 form-floating">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            <label for="email">Email</label>
        </div>
        <div class="col-md-6 form-floating">
            <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Fecha de Nacimiento" required>
            <label for="birthdate">Fecha de Nacimiento</label>
        </div>
        <div class="col-md-6 form-floating">
            <input type="number" class="form-control" id="department_id" name="department_id" placeholder="Departamento" required>
            <label for="department_id">Departamento</label>
        </div>
        <div class="col-md-6 form-floating">
            <input type="date" class="form-control" id="hiring_date" name="hiring_date" placeholder="Fecha de Contratación" required>
            <label for="hiring_date">Fecha de Contratación</label>
        </div>
        <div class="col-md-6 form-floating">
            <input type="number" class="form-control" id="role_id" name="role_id" placeholder="Rol" required>
            <label for="role_id">Rol</label>
        </div>
        <div class="col-md-6 form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
            <label for="password">Contraseña</label>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
</div>

<?php $this->load->view("footer");?>