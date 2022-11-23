<?php 	
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model', 'mm');
		$this->load->model('Log_model', 'lm');
		$this->load->model('LogPengeluaran_model', 'lpm');
	}

	public function getPengeluaranById($id_pengeluaran)
	{
		return $this->db->get_where('tb_pengeluaran', ['id_pengeluaran' => $id_pengeluaran])->row_array();
	}

	public function getAllPengeluaran()
	{
		$this->db->order_by('id_pengeluaran', 'desc');
		return $this->db->get('tb_pengeluaran')->result_array();
	}

	public function getPengeluaranTgl($tanggal_awal, $tanggal_akhir)
	{
		$query = "SELECT * FROM tb_pengeluaran
			LEFT JOIN tb_user ON tb_pengeluaran.id_user = tb_user.id_user
			WHERE tb_pengeluaran.tanggal_pengeluaran BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
			ORDER BY tb_pengeluaran.id_pengeluaran DESC
		";
		return $this->db->query($query)->result_array();
	}
	
	public function addPengeluaran()
	{
		$data = [
			'jumlah_pengeluaran' => $this->input->post('jumlah_pengeluaran', true),
			'keterangan_pengeluaran' => $this->input->post('keterangan_pengeluaran', true),
			'tanggal_pengeluaran' => time(),
			'id_user' => $this->mm->dataUser()['id_user']
		];
		
		$nama_user = $this->mm->dataUser()['nama_user'];
		$this->db->insert('tb_pengeluaran', $data);
		$this->session->set_flashdata('message-success', 'Pengeluaran berhasil ditambahkan oleh ' . $nama_user);
		$this->lm->addLog('Pengeluaran berhasil ditambahkan oleh <b>' . $nama_user . '</b>', $this->mm->dataUser()['id_user']);
		$this->lpm->addLogPengeluaran('Pengeluaran berhasil ditambahkan oleh <b>' . $nama_user . '</b> dengan pengeluaran sebesar <b> Rp. ' . number_format($data['jumlah_pengeluaran']) . '</b>, Keterangan : <b>' . $data['keterangan_pengeluaran'] . '</b>', $this->mm->dataUser()['id_user']);
		redirect('pengeluaran');
	}

	public function editPengeluaran($id_pengeluaran)
	{
		$data = [
			'jumlah_pengeluaran' => $this->input->post('jumlah_pengeluaran', true),
			'keterangan_pengeluaran' => $this->input->post('keterangan_pengeluaran', true),
			'tanggal_pengeluaran' => time(),
			'id_user' => $this->mm->dataUser()['id_user']
		];
		
		$nama_user = $this->mm->dataUser()['nama_user'];
		$this->db->update('tb_pengeluaran', $data, ['id_pengeluaran' => $id_pengeluaran]);
		$this->session->set_flashdata('message-success', 'Pengeluaran berhasil diubah oleh ' . $nama_user);
		$this->lm->addLog('Pengeluaran berhasil diubah oleh <b>' . $nama_user . '</b>  dengan pengeluaran sebesar <b> Rp. ' . number_format($data['jumlah_pengeluaran']) . '</b>, Keterangan : <b>' . $data['keterangan_pengeluaran'] . '</b>', $this->mm->dataUser()['id_user']);
		$this->lpm->addLogPengeluaran('Pengeluaran berhasil diubah oleh <b>' . $nama_user . '</b> dengan pengeluaran sebesar <b> Rp. ' . number_format($data['jumlah_pengeluaran']) . '</b>, Keterangan : <b>' . $data['keterangan_pengeluaran'] . '</b>', $this->mm->dataUser()['id_user']);
		redirect('pengeluaran');
	}

	public function deletePengeluaran($id_pengeluaran)
	{
		$data = $this->getPengeluaranById($id_pengeluaran);
		$jumlah_pengeluaran = $data['jumlah_pengeluaran'];
		$this->db->delete('tb_pengeluaran', ['id_pengeluaran' => $id_pengeluaran]);
		$this->session->set_flashdata('message-success', 'Pengeluaran berhasil dihapus oleh ' . $this->mm->dataUser()['nama_user'] . ', dengan keterangan ' . $data['keterangan'] . ' dan jumlahnya sebesar Rp. ' . number_format($data['jumlah_pengeluaran']));
		$this->lm->addLog('Pengeluaran berhasil dihapus oleh ' . $this->mm->dataUser()['nama_user'] . ', dengan keterangan ' . $data['keterangan'] . ' dan jumlahnya sebesar Rp. ' . number_format($data['jumlah_pengeluaran']), $this->mm->dataUser()['id_user']);
		$this->lpm->addLogPengeluaran('Pengeluaran berhasil dihapus oleh <b>' . $this->mm->dataUser()['nama_user'] . '</b> dengan pengeluaran sebesar <b> Rp. ' . number_format($data['jumlah_pengeluaran']) . '</b>, Keterangan : <b>' . $data['keterangan_pengeluaran'] . '</b>', $this->mm->dataUser()['id_user']);
		redirect('pengeluaran');
	}
}