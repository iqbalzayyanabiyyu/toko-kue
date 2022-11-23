<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengeluaran_model', 'pemo');
		$this->load->model('Main_model', 'mm');
		$this->load->model('Menu_model', 'memo');
	}

	public function index()
	{
		$this->mm->check_login();
		$data['dataUser'] = $this->mm->dataUser();
		$data['pengeluaran'] = $this->pemo->getAllPengeluaran();
		$data['title'] = "Halaman Pengeluaran";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pengeluaran/index', $data);
		$this->load->view('templates/tutup_sidebar', $data);
		$this->load->view('templates/footer', $data);
	}

	public function addPengeluaran()
	{
		$this->pemo->addPengeluaran();
	}

	public function editPengeluaran($kode_invoice)
	{
		$this->pemo->editPengeluaran($kode_invoice);
	}

	public function deletePengeluaran($kode_invoice)
	{
		$this->pemo->deletePengeluaran($kode_invoice);
	}
}