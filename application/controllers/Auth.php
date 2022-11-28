<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
    }


    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
        $this->form_validation->set_rules("password", "Password", "trim|required");

        if($this->form_validation->run() == false) {
            $data["title"] = "Account - Login";
            $this->load->view('templates/auth-header', $data);
            $this->load->view("auth/login");
            $this->load->view('templates/auth-footer');
        } else {
            $this->_login();
        }
    }
    


    // Method Private Login: Start
    private function _login()
    {
        $email = $this->input->post("email");
        $password = $this->input->post("password");

        $user = $this->db->get_where("user", ["email" => $email])->row_array();

        // usernya ada
        if($user) {
            // jika usernya aktif
            if($user["is_active"] == 1) {
                // cek password
                if(password_verify($password, $user["password"])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if($user["role_id"] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered</div>');
            redirect('auth');
        }
    }


    // Method Private Login: End


    // Method Registration: Start
    public function registration()
    {   
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules("name", "Name", "required|trim");

        $this->form_validation->set_rules("email", "Email", "required|trim|valid_email|is_unique[user.email]", [
            'is_unique' => 'This email has already registered'
        ]); // |is_unique[user.email]

        $this->form_validation->set_rules("password1", "Password", "required|trim|min_length[3]|matches[password2]", [
            'matches' => 'Password dont match',
            'min_length' => 'Password too short!'
        ]);

        $this->form_validation->set_rules("password2", "Password", "required|trim|matches[password1]");

        if($this->form_validation->run() == false){
            $data["title"] = "Account - Registration";
            $this->load->view('templates/auth-header', $data);
            $this->load->view("auth/registration");
            $this->load->view('templates/auth-footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1, // user activation 1 / not active 0
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login</div>');
            redirect('auth');
        }
    }
    // Method Registration: End


    // Method Blocked: Start
    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
    // Method Blocked: End


    // Method Logout: Start
    public function logout()
    {
        $this->session->unset_userdata("email");
        $this->session->unset_userdata("role_id");

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }
    // Method Logout: End


}