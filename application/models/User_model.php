<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model {

    public function getAllUserName()
    {
        $this->db->get_where('user', ['role_id' => 1]);
        $this->db->where('role_id !=', 1);
        return $this->db->get('user')->result_array();
    }


    // Add Transaksi: Start
    public function addtransaksi()
    {
        $data = [
            'kuantitas' => $this->input->post('kuantitas', true),
            'tgl_transaksi' => time(),
            'keterangan' => $this->input->post('keterangan', true),
            'email' => $this->session->userdata('email'),
            'produk_id' => $this->input->post('produk_id', true),
        ];

        return $this->db->insert('transaksi', $data);
    }
    // Add Transaksi: End


    public function getTransaksiUser()
    {
        $query = "SELECT `user`.`name`, `transaksi`.`email`, `produk`.`nama_produk`, `transaksi`.`kuantitas`, `transaksi`.`tgl_transaksi`, `transaksi`.`keterangan` FROM `transaksi` 
                INNER JOIN `user` ON `transaksi`.`email` = `user`.`email`
                INNER JOIN `produk` ON `transaksi`.`produk_id` = `produk`.`id`";
        return $this->db->query($query)->result_array();
    }


    public function getProducts()
    {
        return $this->db->get('produk')->result_array();
    }

    public function tampil_data(){
        return $this->db->get('produk');
    }

}