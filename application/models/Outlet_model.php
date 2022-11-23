<?php 	
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model', 'mm');
		$this->load->model('Log_model', 'lm');
	}

	public function getAllOutlet()
	{
		return $this->db->get('tb_outlet')->result_array();
	}
	
	public function getOutletById($id)
	{
		return $this->db->get_where('tb_outlet', ['id_outlet' => $id])->row_array();
	}

	public function checkJabatan($reason)
	{
		$dataUser = $this->mm->dataUser();
		if ($dataUser['jabatan'] != 'administrator') {
			$this->session->set_flashdata('message-failed', 'Anda tidak memiliki hak akses ini, silahkan hubungi administrator!');
			$this->lm->addLog('User dengan nama user <b>' . $dataUser['nama_user'] . '</b> mencoba <b>' . $reason . '</b>', $this->mm->dataUser()['id_outlet']);
			redirect('main/outlet');
			return false;
		}
	}

	public function addOutlet()
	{
		$this->checkJabatan('menambahkan outlet');

		$data = [
			'nama_outlet' => ucwords(strtolower($this->input->post('nama_outlet', true))),
			'no_telepon_outlet' => $this->input->post('no_telepon_outlet', true),
			'alamat_outlet' => $this->input->post('alamat_outlet', true)
		];

		$this->db->insert('tb_outlet', $data);
		$this->session->set_flashdata('message-success', 'Outlet baru dengan nama outlet ' . $data['nama_outlet'] . ' berhasil ditambahkan');
		$this->lm->addLog('Outlet baru dengan nama outlet <b>' . $data['nama_outlet'] . '</b> berhasil ditambahkan', $this->mm->dataUser()['id_user']);
		redirect('main/outlet');
	}	

	public function editOutlet($id_outlet)
	{

		$data = $this->getOutletById($id_outlet);
		$nama_outlet = $data['nama_outlet'];

		$this->checkJabatan('mengubah outlet ' . $nama_outlet);

		$data = [
			'nama_outlet' => ucwords(strtolower($this->input->post('nama_outlet', true))),
			'no_telepon_outlet' => $this->input->post('no_telepon_outlet', true),
			'alamat_outlet' => $this->input->post('alamat_outlet', true)
		];

		$this->db->update('tb_outlet', $data, ['id_outlet' => $id_outlet]);
		$this->session->set_flashdata('message-success', 'Outlet dengan nama outlet ' . $nama_outlet . ' berhasil diubah menjadi ' . $data['nama_outlet']);
		$this->lm->addLog('Outlet dengan nama outlet <b>' . $nama_outlet . '</b> berhasil diubah menjadi <b>' . $data['nama_outlet'] . '</b>', $this->mm->dataUser()['id_user']);
		redirect('main/outlet');
	}	

	public function deleteOutlet($id_outlet)
	{
		$data = $this->getOutletById($id_outlet);
		$nama_outlet = $data['nama_outlet'];
		$this->checkJabatan('menghapus outlet ' . $nama_outlet);
		$this->db->delete('tb_outlet', ['id_outlet' => $id_outlet]);
		$this->session->set_flashdata('message-success', 'Outlet dengan nama outlet ' . $nama_outlet . ' berhasil dihapus');
		$this->lm->addLog('Outlet dengan nama outlet <b>' . $nama_outlet . '</b> berhasil dihapus', $this->mm->dataUser()['id_user']);
		redirect('main/outlet');
	}
}