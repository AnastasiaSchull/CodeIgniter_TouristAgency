<?php
class User extends CI_Controller
{ 
    public $form_validation;
    public $user_model;
    public $session;
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');    
    }

    public function register()
    { 
        // echo "<script>alert(' сообщение');</script>";
        $this->form_validation->set_rules('login', 'Login', 'required|is_unique[users.login]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('register_view');
        } else {
            $data = [
                'login' => $this->input->post('login'),
                'email' => $this->input->post('email'),
                'pass' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),//для создания хэша пароля
                'roleid' => 1 // "customer"
            ];
            $this->user_model->registerUser($data);
            redirect('user/login');
        }
    }

    public function login()
    {
        if ($this->input->post('login')) {
        
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->user_model->authenticate($email, $password);

            if ($user) {
                echo "<script>alert('Login successful');</script>";
                //die();
                $this->session->set_userdata('user', [
                    'id' => $user['id'],
                    'login' => $user['login'],
                    'role' => $user['roleid']
                ]);
                redirect('home/index');
            } else {                    
                //$this->session->set_flashdata('error', 'Invalid email or password');
                redirect('user/login');
            }
        } else {
            $this->load->view('login_view');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect('home/index');
    }
}

