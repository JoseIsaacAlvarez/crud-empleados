<?php
class Auth extends CI_Model {

    public function check_login($email, $password) {
        $this->db->where('email', $email);
        $query = $this->db->get('employees');
        
        $user = $query->row();
        
        if ($user && password_verify($password, $user->password)) {
            return $user; 
        }
        
        return false;
    }
    
}
?>