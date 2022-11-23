<?php 	
defined('BASEPATH') OR exit('No direct script access allowed');

class Prints extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengeluaran_model', 'pemo');
		$this->load->model('Pembayaran_model', 'pm');
		$this->load->model('Transaksi_model', 'tm');
		$this->load->model('Main_model', 'mm');
		$this->load->model('User_model', 'um');
		$this->load->model('Outlet_model', 'om');
		$this->load->model('Menu_model', 'memo');
		$this->load->model('Log_model', 'lm');
	}

	public function profile($id)
	{
		$this->lm->addLog('Print profile', $this->mm->dataUser()['id_user']);
		$data['userProfile'] = $this->um->getUserById($id);
		$data['title'] = 'Print Profle - ' . $data['userProfile']['nama_user'];
		$this->load->view('templates/header', $data);
		$this->load->view('prints/profile', $data);
		$this->load->view('templates/footer', $data);
	}

	public function pembayaran($kode_invoice)
	{
		$this->session->unset_userdata(['kembalian', 'jml_uang_dibayar']);
		$this->lm->addLog('Print Pembayaran dengan kode invoice <b>' . $kode_invoice . '</b>', $this->mm->dataUser()['id_user']);
		$data['isi_menu_invoice'] = $this->tm->getTransaksiByKodeInvoice($kode_invoice);
		$data['pembayaran'] = $this->pm->getPembayaranBykodeInvoice($kode_invoice);
		$data['title'] = 'Print Pembayaran - ' . $kode_invoice;
		$this->load->view('templates/header', $data);
		$this->load->view('prints/pembayaran', $data);
		$this->load->view('templates/footer', $data);
	}

	public function laporan($tanggal_awal, $tanggal_akhir, $status_bayar)
	{
		$this->lm->addLog('Print Laporan dari tanggal' . $tanggal_awal . ' sampai ' . $tanggal_akhir . ', status bayar : ' . $status_bayar, $this->mm->dataUser()['id_user']);
		$data['title'] = 'Print Laporan - ' . $tanggal_awal . ' sampai ' . $tanggal_akhir . ', status bayar : ' . $status_bayar;
		$data['transaksi'] = $this->tm->getTransaksiTglStatusBayar(strtotime(date($tanggal_awal . ' 00:00:01')), strtotime(date($tanggal_akhir . ' 23:59:58')), $status_bayar);

		// kirim data tanggal untuk riwayat penelusuran
		$data['tanggal_awal'] = $this->input->post('tanggal_awal');
		$data['tanggal_akhir'] = $this->input->post('tanggal_akhir');
			$data['status_bayar'] = $status_bayar;
		$data['tanggal_awal'] = $tanggal_awal;
		$data['tanggal_akhir'] = $tanggal_akhir;
		$data['status_bayar'] = $status_bayar;
		$this->load->view('templates/header', $data);
		$this->load->view('prints/laporan', $data);
		$this->load->view('templates/footer', $data);
	}

	public function laporanPengeluaran($tanggal_awal, $tanggal_akhir)
	{
		$this->lm->addLog('Print Laporan Pengeluaran dari tanggal' . $tanggal_awal . ' sampai ' . $tanggal_akhir, $this->mm->dataUser()['id_user']);
		$data['title'] = 'Print Laporan Pengeluaran - ' . $tanggal_awal . ' sampai ' . $tanggal_akhir;
		$data['pengeluaran'] = $this->pemo->getPengeluaranTgl(strtotime(date($tanggal_awal . ' 00:00:01')), strtotime(date($tanggal_akhir . ' 23:59:58')));

		// kirim data tanggal untuk riwayat penelusuran
		$data['tanggal_awal'] = $this->input->post('tanggal_awal');
		$data['tanggal_akhir'] = $this->input->post('tanggal_akhir');
		$data['tanggal_awal'] = $tanggal_awal;
		$data['tanggal_akhir'] = $tanggal_akhir;
		$this->load->view('templates/header', $data);
		$this->load->view('prints/laporanPengeluaran', $data);
		$this->load->view('templates/footer', $data);
	}
}

 ?>