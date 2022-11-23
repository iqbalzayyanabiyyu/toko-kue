<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model {
    public function getAllUserName()
    {
        $this->db->get_where('user', ['role_id' => 1]);
        $this->db->where('role_id !=', 1);
        return $this->db->get('user')->result_array();
    }

}