<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Employee'); // Cargar el modelo
        $this->load->helper('url'); // Cargar helper de URL
    }

    /**
     * Listar todos los empleados
     */
    public function index() {
        $data['employees'] = $this->Employee->get_all_employees();
        //$this->load->view('employees/home', $data);
        //$this->load->view('employees/list', $data);
        $this->load->view('employees/create', $data);
        //$this->load->view('employees/edit', $data);
        //$this->load->view('header', $data);
    }

    /**
     * Mostrar formulario para crear empleado
     */
    public function create() {
        $this->load->view('employees/create');
    }

    /**
     * Guardar nuevo empleado en la base de datos
     */
    public function store() {
        $data = array(
            'employee_name' => $this->input->post('employee_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'birthdate' => $this->input->post('birthdate'),
            'department_id' => $this->input->post('department_id'),
            'hiring_date' => $this->input->post('hiring_date'),
            'role_id' => $this->input->post('role_id'),
            'password' => md5($this->input->post('password'))
        );

        $this->Employee->insert_employee($data);
        redirect('employees');
    }

    /**
     * Mostrar formulario de edición de un empleado
     */
    public function edit($id) {
        $data['employee'] = $this->Employee->get_employee_by_id($id);
        $this->load->view('employees/edit', $data);
    }

    /**
     * Actualizar un empleado en la base de datos
     */
    public function update($id) {
        $data = array(
            'employee_name' => $this->input->post('employee_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'birthdate' => $this->input->post('birthdate'),
            'department_id' => $this->input->post('department_id'),
            'hiring_date' => $this->input->post('hiring_date'),
            'role_id' => $this->input->post('role_id')
        );

        $this->Employee->update_employee($id, $data);
        redirect('employees');
    }

    /**
     * Eliminar un empleado
     */
    public function delete($id) {
        $this->Employee->delete_employee($id);
        redirect('employees');
    }
}
