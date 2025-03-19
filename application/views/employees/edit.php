<?php $this->load->view("header"); ?>

<div class="container mt-5">
    <h2 class="mb-4">Editar Empleado</h2>
    <form method="post" action="<?php echo site_url('employees/update/'.$employee->employee_id); ?>" class="row g-3">
        <div class="col-md-6 form-floating">
            <input type="text" class="form-control" id="employee_name_edit" name="employee_name" placeholder="Nombre" value="<?php echo $employee->employee_name; ?>" required>
            <label for="employee_name_edit">Nombre</label>
        </div>
        <div class="col-md-6 form-floating">
            <input type="text" class="form-control" id="last_name_edit" name="last_name" placeholder="Apellido" value="<?php echo $employee->last_name; ?>" required>
            <label for="last_name_edit">Apellido</label>
        </div>
        <div class="col-md-6 form-floating">
            <input type="email" class="form-control" id="email_edit" name="email" placeholder="Email" value="<?php echo $employee->email; ?>" required>
            <label for="email_edit">Email</label>
        </div>
        <div class="col-md-6 form-floating">
            <input type="date" class="form-control" id="birthdate_edit" name="birthdate" placeholder="Fecha de Nacimiento" value="<?php echo $employee->birthdate; ?>" required>
            <label for="birthdate_edit">Fecha de Nacimiento</label>
        </div>
        <div class="col-md-6 form-floating">
            <input type="number" class="form-control" id="department_id_edit" name="department_id" placeholder="Departamento" value="<?php echo $employee->department_id; ?>" required>
            <label for="department_id_edit">Departamento</label>
        </div>
        <div class="col-md-6 form-floating">
            <input type="date" class="form-control" id="hiring_date_edit" name="hiring_date" placeholder="Fecha de Contratación" value="<?php echo $employee->hiring_date; ?>" required>
            <label for="hiring_date_edit">Fecha de Contratación</label>
        </div>
        <div class="col-md-6 form-floating">
            <input type="number" class="form-control" id="role_id_edit" name="role_id" placeholder="Rol" value="<?php echo $employee->role_id; ?>" required>
            <label for="role_id_edit">Rol</label>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>

<?php $this->load->view("footer");?>