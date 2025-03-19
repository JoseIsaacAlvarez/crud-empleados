<?php
class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Employee'); // Cargar el modelo
        $this->load->helper('url'); // Cargar helper de URL
        $this->load->model('Auth');
    }

    public function index() {
        $this->load->view('auth/login');
    }

    public function process_login() {
        
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->Auth->check_login($email, $password);
        if ($user) {
            $this->session->set_userdata('user_id', $user->employee_id);
            $this->session->set_userdata('role_id', $user->role_id);
            redirect('employees');
        } else {
            $this->session->set_flashdata('error', 'Credenciales incorrectas.');
            redirect('login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
?>