<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model', 'mm');
	}

	public function getTransaksiByIdOutletGroupByKodeInvoice($id_outlet)
	{
		$this->db->join('tb_menu', 'tb_menu.id_menu=tb_transaksi.id_menu', 'left');
		$this->db->join('tb_outlet', 'tb_outlet.id_outlet=tb_transaksi.id_outlet', 'left');
		$this->db->join('tb_user', 'tb_user.id_user=tb_transaksi.id_user', 'left');
		$this->db->order_by('id_transaksi', 'desc'); 
		$this->db->group_by('kode_invoice');
		return $this->db->get_where('tb_transaksi', ['tb_transaksi.id_outlet' => $id_outlet])->result_array();
	}

	public function getTransaksiByKodeInvoice($kode_invoice)
	{
		$queryKuantitas = "
			SELECT *, sum(tb_transaksi.kuantitas) as jmlKuantitasMenuSama
			FROM tb_transaksi 
			LEFT JOIN tb_outlet ON tb_transaksi.id_outlet = tb_outlet.id_outlet
			LEFT JOIN tb_user ON tb_transaksi.id_user = tb_user.id_user
			LEFT JOIN tb_menu ON tb_transaksi.id_menu = tb_menu.id_menu
			WHERE tb_transaksi.kode_invoice = '$kode_invoice' 
			GROUP BY tb_transaksi.id_menu
		";
		
		return $this->db->query($queryKuantitas)->result_array();
	}

	public function getTransaksiById($id)
	{
		$this->db->join('tb_menu', 'tb_menu.id_menu=tb_transaksi.id_menu');
		$this->db->join('tb_outlet', 'tb_outlet.id_outlet=tb_transaksi.id_outlet');
		$this->db->join('tb_user', 'tb_user.id_user=tb_transaksi.id_user');
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get_where('tb_transaksi', ['tb_transaksi.id_transaksi' => $id])->row_array();
	}

	public function kodeInvoice($tgl_transaksi, $id_outlet, $id_user , $field, $initial)
	{
		// ambil kolom terakhir pada table
		$query = "SELECT max($field) AS field FROM tb_transaksi INNER JOIN tb_outlet ON tb_transaksi.id_outlet = tb_outlet.id_outlet";
		$last_id_transaksi = $this->db->query($query)->row_array();
		if ($last_id_transaksi) {
			$data_transaksi = $this->getTransaksiById($last_id_transaksi['field']);
			// ambil tanggal
			$just_date = date('dmY', $tgl_transaksi);
			// ambil tanggal terakhir pada db
			$last_row_date = substr($data_transaksi['kode_invoice'], 0, 8);
			// jika tanggal tidak sama dengan tanggal sebelumnya, maka atur angka dari 000 kembali
			if ($just_date == $last_row_date) {
				$field = $data_transaksi['kode_invoice'];
			} else {
				// ambil bagian depan kode invoice sbg tanggal
				$field = $just_date . $id_outlet . $id_user  . 'T' . '0000';
			}
		} else {
			// ambil bagian depan kode invoice sbg tanggal
			$field = $just_date . $id_outlet . $id_user  . 'T' . '0000';
		}

		// ambil id terakhir dari depan
		$substr = substr($field, -4);
		// Conversi menjadi int
		$conv = (int) $substr;
		// tambahkan increase pada kode
		$inc = $conv + 1;
		
		// membuat kode otomatis cth: 009, 010, 011 dan hasil akhir
		$result_code = $just_date . str_pad($id_outlet, 2, "0", STR_PAD_LEFT) . str_pad($id_user, 2, "0", STR_PAD_LEFT)  . $initial . str_pad($inc, 4, "0", STR_PAD_LEFT);
		return $result_code;
	}

	public function addTransaksi()
	{
		$tanggal_transaksi = time();
		$id_user = $this->mm->dataUser()['id_user'];
		$id_outlet = $this->mm->dataUser()['id_outlet'];
		$kode_invoice = $this->kodeInvoice($tanggal_transaksi, $id_outlet, $id_user, 'id_transaksi', 'T');
    	$kuantitas = $this->input->post('kuantitas', true);
    	$id_menu = $this->input->post('id_menu', true);
    	$keterangan = $this->input->post('keterangan', true);
    	$data = [];

	    $index = 0;
	    foreach($kuantitas as $k) {
			array_push($data, [
				'kode_invoice' => $kode_invoice,
				'kuantitas' => $kuantitas[$index],
				'status_bayar' => 'belum_dibayar',
				'tgl_transaksi' => $tanggal_transaksi,
				'keterangan' => $keterangan,
				'id_menu' => $id_menu[$index],
				'id_user' => $id_user,
				'id_outlet' => $id_outlet
			]);
	    	$index++;
		}

		$this->db->insert_batch('tb_transaksi', $data);
		$this->session->set_flashdata('message-success', 'Transaksi baru dengan kode invoice ' . $kode_invoice . ' berhasil ditambahkan');
		$this->lm->addLog('Transaksi baru dengan kode invoice <b>' . $kode_invoice . '</b> berhasil ditambahkan', $this->mm->dataUser()['id_user']);
		redirect('transaksi');
	}

	public function editTransaksi($kode_invoice)
	{
		$tanggal_transaksi = time();
		$id_user = $this->mm->dataUser()['id_user'];
		$id_outlet = $this->mm->dataUser()['id_outlet'];
    	$kuantitas = $this->input->post('kuantitas', true);
    	$id_menu = $this->input->post('id_menu', true);
    	$keterangan = $this->input->post('keterangan', true);
    	$data = [];
    	
    	$kode_invoice_baru = $kode_invoice; 
    	$this->db->delete('tb_transaksi', ['kode_invoice' => $kode_invoice]);

	    $index = 0;
	    foreach($kuantitas as $k) {
			array_push($data, [
				'kode_invoice' => $kode_invoice_baru,
				'kuantitas' => $kuantitas[$index],
				'status_bayar' => 'belum_dibayar',
				'tgl_transaksi' => $tanggal_transaksi,
				'keterangan' => $keterangan,
				'id_menu' => $id_menu[$index],
				'id_user' => $id_user,
				'id_outlet' => $id_outlet
			]);
	    	$index++;
		}

		$this->db->insert_batch('tb_transaksi', $data);

		$this->session->set_flashdata('message-success', 'Transaksi dengan kode invoice ' . $kode_invoice . ' berhasil diubah');
		$this->lm->addLog('Transaksi baru dengan kode invoice <b>' . $kode_invoice . '</b> berhasil diubah', $this->mm->dataUser()['id_user']);
		redirect('transaksi');
	}

	public function deleteTransaksi($kode_invoice)
	{
		$this->db->delete('tb_transaksi', ['kode_invoice' => $kode_invoice]);
		$this->session->set_flashdata('message-success', 'Transaksi dengan kode invoice ' . $kode_invoice . ' berhasil dihapus');
		$this->lm->addLog('Transaksi dengan kode invoice <b>' . $kode_invoice . '</b> berhasil dihapus', $this->mm->dataUser()['id_user']);
		redirect('transaksi');
	}

	public function getTransaksiTgl($tanggal_awal, $tanggal_akhir)
	{
		$query = "SELECT * FROM tb_transaksi 
			LEFT JOIN tb_user ON tb_transaksi.id_user = tb_user.id_user
			LEFT JOIN tb_outlet ON tb_transaksi.id_outlet = tb_outlet.id_outlet
			WHERE tb_transaksi.tgl_transaksi BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
			GROUP BY tb_transaksi.kode_invoice
			ORDER BY tb_transaksi.id_transaksi DESC
		";
		return $this->db->query($query)->result_array();
	}

	public function getTransaksiTglStatusBayar($tanggal_awal, $tanggal_akhir, $status_bayar)
	{
		$query = "SELECT * FROM tb_transaksi 
			LEFT JOIN tb_user ON tb_transaksi.id_user = tb_user.id_user
			LEFT JOIN tb_outlet ON tb_transaksi.id_outlet = tb_outlet.id_outlet
			LEFT JOIN tb_pembayaran ON tb_pembayaran.kode_invoice = tb_transaksi.kode_invoice
			WHERE tb_transaksi.tgl_transaksi BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND tb_transaksi.status_bayar = '$status_bayar'
			GROUP BY tb_transaksi.kode_invoice
			ORDER BY tb_transaksi.id_transaksi DESC
		";
		return $this->db->query($query)->result_array();
	}
}