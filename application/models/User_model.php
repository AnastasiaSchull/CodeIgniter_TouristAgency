<?php
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); 
    }

   
    public function registerUser($data)
    {
        return $this->db->insert('users', $data); // `users` в бд
    }

    
    public function authenticate($email, $password)
    {
    $this->db->where('email', $email);
    $query = $this->db->get('users');
    

    if ($query->num_rows() > 0) {
            $user = $query->row_array();

            if (password_verify($password, $user['pass'])) {
                echo "<script>alert('Password verification succeeded.');</script>";
                return $user; // успешная аутентификация
            } else {
                echo "<script>alert('Password verification failed.');</script>";
        }
        } else {
            echo "<script>console.log('No user found with this email.');</script>";
        }

    return false;
    }

       
    public function getUserRole($userId)
    {
        $this->db->select('roles.name as role');
        $this->db->from('users');
        $this->db->join('roles', 'users.roleid = roles.id'); // связь с таблицей roles
        $this->db->where('users.id', $userId);
        $query = $this->db->get();

        return $query->row_array();
    }
}
