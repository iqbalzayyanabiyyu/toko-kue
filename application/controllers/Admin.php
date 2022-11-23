<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data["title"] = "Dashboard";
        $data["user"] = $this->db->get_where("user", ["email" => $this->session->userdata("email")])->row_array();

        $data['name'] = $this->User_model->getAllUserName();
        
        $this->load->view("templates/menu-header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("admin/index", $data);
        $this->load->view("templates/menu-footer");
    }


    // Detail Members: Start
    // public function detailMembers()
    // {
    //     $data["title"] = "Detail Members";
    //     $data["user"] = $this->db->get_where("user", ["email" => $this->session->userdata("email")])->row_array();

    //     $data['name'] = $this->User_model->getAllUserName();
        
    //     $this->load->view("templates/menu-header", $data);
    //     $this->load->view("templates/sidebar", $data);
    //     $this->load->view("templates/topbar", $data);
    //     $this->load->view("admin/index", $data);
    //     $this->load->view("templates/menu-footer");
    // }
    // Detail Members: End
    

    // Daftar Admin: Start
    public function daftarAdmin()
    {
        $data['title'] = 'Daftar Admin';
        $data["user"] = $this->db->get_where("user", ["email" => $this->session->userdata("email")])->row_array();
        
        $data['name'] = $this->Admin_model->getAllAdmin();

        $this->load->view("templates/menu-header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view('admin/df-admin', $data);
        $this->load->view("templates/menu-footer");
    }
    // Daftar Admin: End


    // Profile Admin: Start
    public function profileAdmin()
    {
        $data["title"] = "Profile Admin";
        $data["user"] = $this->db->get_where("user", ["email" => $this->session->userdata("email")])->row_array();

        $data['name'] = $this->User_model->getAllUserName();
        
        $this->load->view("templates/menu-header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("admin/profile-admin", $data);
        $this->load->view("templates/menu-footer");
    }
    // Profile Admin: End


    // Orders: Start
    public function orders()
    {
        $data["title"] = "Orders";
        $data["user"] = $this->db->get_where("user", ["email" => $this->session->userdata("email")])->row_array();

        $data['name'] = $this->Checkout_model->getAllOrders();
        
        $this->load->view("templates/menu-header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("admin/orders", $data);
        $this->load->view("templates/menu-footer");
    }
    // Orders: End


    // Method Role: Start
    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view("templates/menu-header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view('admin/role', $data);
        $this->load->view("templates/menu-footer");
    }
    // Method Role: End


    // Method Role Access: Start
    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view("templates/menu-header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view("templates/menu-footer");
    }
    // Method Role Access: End


    // Method Change Access: Start
    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }
    // Method Change Access: End


    // Method Delete Member: Start
    public function delMember($id)
    {
        $this->Admin_model->deleteMember($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully deleted!</div>');
        redirect('admin');
    }
    // Method Delete Member: End

}
