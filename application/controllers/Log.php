<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Log_model', 'lm');
		$this->load->model('Main_model', 'mm');
	}
	public function index()
	{
		$this->mm->check_login();
		$data['dataUser'] = $this->mm->dataUser();
		$this->db->order_by('id_log', 'desc');
		$data['daftar_log'] = $this->lm->getAllLog();
		$data['title'] = "Log";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('log/index', $data);
		$this->load->view('templates/tutup_sidebar', $data);
		$this->load->view('templates/footer', $data);
	}
}