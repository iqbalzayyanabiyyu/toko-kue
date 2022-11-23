<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogPengeluaran_model extends CI_Model {
	public function getAllLogPengeluaran()
	{
		$this->db->order_by('id_log_pengeluaran', 'DESC');
		return $this->db->get('tb_log_pengeluaran')->result_array();
	}
	public function addLogPengeluaran($isi_log, $id_user)
	{
		$data = [
			'keterangan' => $isi_log,
			'tanggal' => time(),
			'id_user' => $id_user
		];
		return $this->db->insert('tb_log_pengeluaran', $data);
	}
}