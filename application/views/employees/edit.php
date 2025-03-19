<?php $this->load->view("header"); ?>

    <div class="container mt-5">
        <h2 class="mb-4">Editar Empleado</h2>
        <form method="post" action="<?php echo site_url('employees/update/'.$employee->employee_id); ?>" class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="employee_name" value="<?php echo $employee->employee_name; ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Apellido:</label>
                <input type="text" class="form-control" name="last_name" value="<?php echo $employee->last_name; ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $employee->email; ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" name="birthdate" value="<?php echo $employee->birthdate; ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Departamento:</label>
                <input type="number" class="form-control" name="department_id" value="<?php echo $employee->department_id; ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Fecha de Contratación:</label>
                <input type="date" class="form-control" name="hiring_date" value="<?php echo $employee->hiring_date; ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Rol:</label>
                <input type="number" class="form-control" name="role_id" value="<?php echo $employee->role_id; ?>" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>

