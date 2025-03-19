<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
        $this->check_login();
    }

    // Verifica si el usuario está logueado
    private function check_login() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    // Valida el rol del usuario
    protected function check_role($role_id) {
        if ($this->session->userdata('role_id') != $role_id) {
            redirect('restricted_access/');
        }
    }

}

?>