<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_model extends CI_Model {
	public function getAllLog()
	{
		return $this->db->get('tb_log')->result_array();
	}
	public function addLog($isi_log, $id_user)
	{
		$data = [
			'isi_log' => $isi_log,
			'tanggal_log' => time(),
			'id_user' => $id_user
		];
		$this->db->insert('tb_log', $data);
	}
}