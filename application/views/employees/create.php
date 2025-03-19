<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Empleado</title>
</head>
<body>
    <h2>Agregar Nuevo Empleado</h2>
    <form method="post" action="<?php echo site_url('employees/store'); ?>">
        <label>Nombre:</label>
        <input type="text" name="employee_name" required><br>

        <label>Apellido:</label>
        <input type="text" name="last_name" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Fecha de Nacimiento:</label>
        <input type="date" name="birthdate" required><br>

        <label>Departamento:</label>
        <input type="number" name="departament_id" required><br>

        <label>Fecha de Contratación:</label>
        <input type="date" name="hiring_date" required><br>

        <label>Rol:</label>
        <input type="number" name="role_id" required><br>

        <label>Contraseña:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
