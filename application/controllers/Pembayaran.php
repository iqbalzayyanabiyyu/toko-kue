<?php 	
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model', 'mm');
		$this->load->model('User_model', 'um');
		$this->load->model('Transaksi_model', 'tm');
		$this->load->model('Pembayaran_model', 'pm');
		$this->load->model('Outlet_model', 'om');
		$this->load->model('Menu_model', 'memo');
	}

	public function index()
	{
		$this->mm->check_login();
		$data['dataUser'] = $this->mm->dataUser();
		$data['title'] = "Halaman Pembayaran";
		$data['pembayaran'] = $this->pm->getAllPembayaran();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pembayaran/index', $data);
		$this->load->view('templates/tutup_sidebar', $data);
		$this->load->view('templates/footer', $data);
	}

	public function bayar($kode_invoice)
	{
		$this->mm->check_login();
		$data['dataUser'] = $this->mm->dataUser();
		$data['kode_invoice'] = $kode_invoice;
		$data['total_harga_terakhir'] = $this->pm->totalHargaTerakhir($kode_invoice);
		$data['isi_menu_invoice'] = $this->tm->getTransaksiByKodeInvoice($kode_invoice);
		$data['isi_pembayaran'] = $this->pm->getPembayaranBykodeInvoice($kode_invoice);
		$data['title'] = "Halaman Pembayaran - " . $kode_invoice;
		$this->form_validation->set_rules('jml_uang_dibayar', 'Jumlah uang dibayar', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('pembayaran/bayar', $data);
			$this->load->view('templates/tutup_sidebar', $data);
			$this->load->view('templates/footer', $data);
		} else {
		    $this->pm->bayar($kode_invoice);
		}
	}
}

 ?>