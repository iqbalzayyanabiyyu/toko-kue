<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model', 'mm');
		$this->load->model('Log_model', 'lm');
	}

	public function totalHargaTerakhir($kode_invoice)
	{
		$sql = "SELECT *, (SELECT sum(tb_menu.harga_menu * tb_transaksi.kuantitas) FROM tb_transaksi 
				LEFT JOIN tb_menu ON tb_transaksi.id_menu = tb_menu.id_menu 
				WHERE tb_transaksi.kode_invoice = '$kode_invoice') as total_harga_terakhir
				FROM tb_transaksi LEFT JOIN tb_menu ON tb_transaksi.id_menu = tb_menu.id_menu 
				WHERE tb_transaksi.kode_invoice = '$kode_invoice'";
		return $this->db->query($sql)->row_array();
	}

	public function bayar($kode_invoice)
	{
		$total_pembayaran = $this->input->post('total_pembayaran', true);
		$jml_uang_dibayar = $this->input->post('jml_uang_dibayar', true);
		$kembalian = $jml_uang_dibayar - $total_pembayaran;
		$tgl_pembayaran = time();
		$data = [
			'total_pembayaran' => $total_pembayaran,
			'jml_uang_dibayar' => $jml_uang_dibayar,
			'kembalian' => $kembalian,
			'tgl_pembayaran' => $tgl_pembayaran,
			'kode_invoice' => $kode_invoice,
			'id_user' => $this->mm->dataUser()['id_user'],
			'id_outlet' => $this->mm->dataUser()['id_outlet']
		];

		$query = $this->db->insert('tb_pembayaran', $data);
		if ($query) {
			//  change status bayar
			$this->db->update('tb_transaksi', ['status_bayar' => 'sudah_dibayar'], ['tb_transaksi.kode_invoice' => $kode_invoice]);
		}
		$this->session->set_flashdata('message-success', 'Pembayaran baru dengan kode invoice ' . $data['kode_invoice'] . ' berhasil ditambahkan');
		$this->lm->addLog('Pembayaran baru dengan kode invoice <b>' . $data['kode_invoice'] . '</b> berhasil ditambahkan', $this->mm->dataUser()['id_user']);
		/*$this->session->set_userdata(['kembalian' => $kembalian, 'jml_uang_dibayar' => $jml_uang_dibayar]);*/
		$this->session->set_flashdata('pembayaran-berhasil', 'pembayaran-berhasil');
		redirect('pembayaran/bayar/' . $kode_invoice);
	}

	public function getAllPembayaran()
	{
		$this->db->join('tb_transaksi', 'tb_transaksi.kode_invoice=tb_pembayaran.kode_invoice', 'right');
		$this->db->join('tb_user', 'tb_user.id_user=tb_pembayaran.id_user', 'left');
		$this->db->join('tb_outlet', 'tb_outlet.id_outlet=tb_pembayaran.id_outlet', 'left');
		$this->db->group_by('tb_transaksi.kode_invoice');
		$this->db->order_by('tb_transaksi.kode_invoice', 'desc');
		return $this->db->get('tb_pembayaran')->result_array();
	}

	public function getPembayaranBykodeInvoice($kode_invoice)
	{
		return $this->db->get_where('tb_pembayaran', ['kode_invoice' => $kode_invoice])->row_array();
	}

	public function getPembayaranTglStatusBayar($tanggal_awal, $tanggal_akhir, $status_bayar)
	{
		$query = "SELECT *  FROM tb_pembayaran 
			LEFT JOIN tb_user ON tb_pembayaran.id_user = tb_user.id_user
			LEFT JOIN tb_outlet ON tb_pembayaran.id_outlet = tb_outlet.id_outlet
			LEFT JOIN tb_transaksi ON tb_pembayaran.kode_invoice = tb_transaksi.kode_invoice
			WHERE tb_pembayaran.tgl_pembayaran BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND tb_transaksi.status_bayar = '$status_bayar'
			GROUP BY tb_pembayaran.kode_invoice
		";
		return $this->db->query($query)->result_array();
	}

	public function getPembayaranTgl($tanggal_awal, $tanggal_akhir)
	{
		$query = "SELECT * FROM tb_pembayaran 
			LEFT JOIN tb_user ON tb_pembayaran.id_user = tb_user.id_user
			LEFT JOIN tb_outlet ON tb_pembayaran.id_outlet = tb_outlet.id_outlet
			LEFT JOIN tb_transaksi ON tb_pembayaran.kode_invoice = tb_transaksi.kode_invoice
			WHERE tb_pembayaran.tgl_pembayaran BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
			GROUP BY tb_pembayaran.kode_invoice
		";
		return $this->db->query($query)->result_array();
	}
}