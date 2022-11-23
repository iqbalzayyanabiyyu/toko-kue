<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Log_model', 'lm');
		$this->load->model('Main_model', 'mm');
		$this->load->model('Pembayaran_model', 'pm');
		$this->load->model('Transaksi_model', 'tm');
	}
	public function index()
	{
		$this->mm->check_login();
		$data['dataUser'] = $this->mm->dataUser();
		$data['title'] = 'Halaman Laporan';
		$data['transaksi'] = $this->tm->getTransaksiTgl(strtotime(date('Y-m-01 00:00:01')), strtotime(date('Y-m-d 23:59:58')));
		if (isset($_POST['cari_tanggal'])) {
			$tanggal_awal = date('Y-m-d 00:00:00', strtotime($this->input->post('tanggal_awal', true)));
			$tanggal_akhir = date('Y-m-d 23:59:59', strtotime($this->input->post('tanggal_akhir', true)));
			$status_bayar = $this->input->post('status_bayar', true);
			if ($status_bayar == 'semua') {
				$data['transaksi'] = $this->tm->getTransaksiTgl(strtotime($tanggal_awal), strtotime($tanggal_akhir));
			} else {
				$data['transaksi'] = $this->tm->getTransaksiTglStatusBayar(strtotime($tanggal_awal), strtotime($tanggal_akhir), $status_bayar);
			}

			// kirim data tanggal untuk riwayat penelusuran
			$data['tanggal_awal'] = $this->input->post('tanggal_awal');
			$data['tanggal_akhir'] = $this->input->post('tanggal_akhir');
			$data['status_bayar'] = $status_bayar;
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan/index', $data);
		$this->load->view('templates/tutup_sidebar', $data);
		$this->load->view('templates/footer', $data);
	}
}