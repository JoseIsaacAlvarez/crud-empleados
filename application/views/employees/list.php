<!-- Vista de Lista de Empleados: list.php -->

<?php $this->load->view("header"); ?>

<div class="container mt-5">
    <h2 class="mb-4">Lista de Empleados</h2>
    <a href="<?php echo site_url('employees/create'); ?>" class="btn btn-primary mb-3">Agregar Empleado</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Departamento</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee) { ?>
            <tr>
                <td><?php echo $employee->employee_id; ?></td>
                <td><?php echo $employee->employee_name; ?></td>
                <td><?php echo $employee->last_name; ?></td>
                <td><?php echo $employee->email; ?></td>
                <td><?php echo $employee->department_name; ?></td>
                <td><?php echo $employee->role_name; ?></td>
                <td>
                    <a href="<?php echo site_url('employees/edit/'.$employee->employee_id); ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="<?php echo site_url('employees/delete/'.$employee->employee_id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php $this->load->view("footer");?>
