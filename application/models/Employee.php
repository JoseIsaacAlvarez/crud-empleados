<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Model {

    public function __construct() {
        parent::__construct();        
    }

    /**
     * Obtener todos los empleados con información de roles y departamentos.
     */
    public function get_all_employees() {
        $this->db->select('e.*, d.department_name, r.role_name');
        $this->db->from('employees e');
        $this->db->join('departments d', 'e.department_id = d.department_id', 'left');
        $this->db->join('roles r', 'e.role_id = r.role_id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Obtener un empleado por su ID
     */
    public function get_employee_by_id($id) {
        $this->db->select('e.*, d.department_name, r.role_name');
        $this->db->from('employees e');
        $this->db->join('departments d', 'e.department_id = d.department_id', 'left');
        $this->db->join('roles r', 'e.role_id = r.role_id', 'left');
        $this->db->where('e.employee_id', $id);
        $query = $this->db->get();
        return $query->row(); // Devuelve un solo objeto
    }

    /**
     * Insertar un nuevo empleado
     */
    public function insert_employee($data) {
        return $this->db->insert('employees', $data);
    }

    /**
     * Actualizar un empleado por su ID
     */
    public function update_employee($id, $data) {
        $this->db->where('employee_id', $id);
        return $this->db->update('employees', $data);
    }

    /**
     * Eliminar un empleado por su ID
     */
    public function delete_employee($id) {
        $this->db->where('employee_id', $id);
        return $this->db->delete('employees');
    }
}
