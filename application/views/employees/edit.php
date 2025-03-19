<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
</head>
<body>
    <h2>Editar Empleado</h2>
    <form method="post" action="<?php echo site_url('employees/update/'.$employee->employee_id); ?>">
        <label>Nombre:</label>
        <input type="text" name="employee_name" value="<?php echo $employee->employee_name; ?>" required><br>

        <label>Apellido:</label>
        <input type="text" name="last_name" value="<?php echo $employee->last_name; ?>" required><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $employee->email; ?>" required><br>

        <label>Fecha de Nacimiento:</label>
        <input type="date" name="birthdate" value="<?php echo $employee->birthdate; ?>" required><br>

        <label>Departamento:</label>
        <input type="number" name="department_id" value="<?php echo $employee->department_id; ?>" required><br>

        <label>Fecha de Contratación:</label>
        <input type="date" name="hiring_date" value="<?php echo $employee->hiring_date; ?>" required><br>

        <label>Rol:</label>
        <input type="number" name="role_id" value="<?php echo $employee->role_id; ?>" required><br>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
