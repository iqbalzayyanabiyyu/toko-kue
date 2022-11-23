<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogPengeluaran extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('LogPengeluaran_model', 'lm');
		$this->load->model('Main_model', 'mm');
		$this->load->model('LogPengeluaran_model', 'lpm');
	}
	public function index()
	{
		$this->mm->check_login();
		$data['dataUser'] = $this->mm->dataUser();
		$data['daftar_log'] = $this->lpm->getAllLogPengeluaran();
		$data['title'] = "Log Pengeluaran";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('log/pengeluaran', $data);
		$this->load->view('templates/tutup_sidebar', $data);
		$this->load->view('templates/footer', $data);
	}
}