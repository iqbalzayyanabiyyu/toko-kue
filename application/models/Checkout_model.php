<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout_model extends CI_Model {

    public function addCheckout()
    {
        $data = [
            'orders' => $this->input->post('orders', true),
            'email' => $this->input->post('email', true),
            'name' => $this->input->post('name', true),
            'address' => $this->input->post('address', true),
            'districts' => $this->input->post('districts', true),
            'city' => $this->input->post('city', true),
            'zip_code' => $this->input->post('zip_code', true),
            'date_orders' => time()
        ];

        $this->db->insert('checkout', $data);
    }


    public function getAllOrders()
    {
        $query = $this->db->get('checkout')->result_array();
        return $query;
    }


}