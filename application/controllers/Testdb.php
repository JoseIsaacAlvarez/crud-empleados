<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testdb extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Employees'); // Cargar el modelo
    }

    public function index() {
        $employees = $this->Employees->get_all_employees();

        echo "<h2>Lista de Empleados</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Email</th><th>Fecha de Nacimiento</th><th>Departamento</th><th>Fecha de Contratación</th><th>Rol</th></tr>";

        foreach ($employees as $employee) {
            echo "<tr>";
            echo "<td>{$employee->employee_id}</td>";
            echo "<td>{$employee->employee_name}</td>";
            echo "<td>{$employee->last_name}</td>";
            echo "<td>{$employee->email}</td>";
            echo "<td>{$employee->birthdate}</td>";
            echo "<td>{$employee->department_name}</td>";
            echo "<td>{$employee->hiring_date}</td>";
            echo "<td>{$employee->role_name}</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
}


