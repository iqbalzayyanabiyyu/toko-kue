<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi_model', 'tm');
		$this->load->model('Main_model', 'mm');
		$this->load->model('Menu_model', 'memo');
	}

	public function index()
	{
		$this->mm->check_login();
		$data['dataUser'] = $this->mm->dataUser();
		$data['transaksi'] = $this->tm->getTransaksiByIdOutletGroupByKodeInvoice($data['dataUser']['id_outlet']);
		$data['menu'] = $this->memo->getAllMenuByOutletUserLogin();
		$data['title'] = "Halaman Transaksi";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('transaksi/index', $data);
		$this->load->view('templates/tutup_sidebar', $data);
		$this->load->view('templates/footer', $data);
	}

	public function addTransaksi()
	{
		$this->tm->addTransaksi();
	}

	public function editTransaksi($kode_invoice)
	{
		$this->tm->editTransaksi($kode_invoice);
	}

	public function deleteTransaksi($kode_invoice)
	{
		$this->tm->deleteTransaksi($kode_invoice);
	}
}