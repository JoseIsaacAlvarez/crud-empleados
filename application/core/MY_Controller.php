<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Employee');
        $this->check_login();
        $this->load_logged_employee();
    }

    private function check_login() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    protected function check_permission() {
        $role_id = $this->session->userdata('role_id');
        if ($this->session->userdata('role_id') != $role_id) {
            redirect('restricted_access/');
        }
    }

    private function load_logged_employee() {
        $employee_log_id = $this->session->userdata('user_id');
        if ($employee_log_id) {
            $name_employee = $this->Employee->get_logged_employee($employee_log_id);
            $this->session->set_userdata('name_employee', $name_employee);
        }
    }

}

?>