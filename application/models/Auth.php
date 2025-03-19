<?php
class Auth extends CI_Model {

    public function check_login($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', hash('sha256', $password));
        $query = $this->db->get('employees');
        return $query->row();
    }
}
?>