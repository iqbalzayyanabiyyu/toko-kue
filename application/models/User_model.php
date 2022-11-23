<?php 	
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model', 'mm');
		$this->load->model('Log_model', 'lm');
	}

	public function getAllUser()
	{
		$this->db->order_by('jabatan', 'asc');
		$this->db->join('tb_outlet', 'tb_outlet.id_outlet=tb_user.id_outlet');
		return $this->db->get('tb_user')->result_array();
	}

	public function getUserById($id)
	{
		$this->db->join('tb_outlet', 'tb_outlet.id_outlet=tb_user.id_outlet');
		return $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
	}

	public function checkJabatan($reason)
	{
		$dataUser = $this->mm->dataUser();
		if ($dataUser['jabatan'] != 'administrator') {
			$this->session->set_flashdata('message-failed', 'Anda tidak memiliki hak akses ini, silahkan hubungi administrator!');
			$this->lm->addLog('User dengan nama user <b>' . $dataUser['nama_user'] . '</b> mencoba <b>' . $reason . '</b>', $this->mm->dataUser()['id_user']);
			redirect('main/user');
			return false;
		}
	}

	public function addUser()
	{
		$this->checkJabatan('menambahkan user');

		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);
		$password_verifikasi = $this->input->post('password_verifikasi', true);
		$check = $this->db->get_where('tb_user', ['username' => $username])->row_array();
		if ($check) {
			$this->session->set_flashdata('message-failed', 'Username sudah digunakan');
			redirect('main/user');
			return false;
		}

		if ($password !== $password_verifikasi) {
			$this->session->set_flashdata('message-failed', 'Password verifikasi yang anda masukkan tidak sesuai dengan password');
			redirect('main/user');
			return false;			
		}
		
		$password = password_hash($password, PASSWORD_DEFAULT);

		$data = [
			'nama_user' => ucwords(strtolower($this->input->post('nama_user', true))),
			'username' => $username,
			'password' => $password,
			'jabatan' => $this->input->post('jabatan', true),
			'id_outlet' => $this->input->post('id_outlet', true)
		];

		$this->db->insert('tb_user', $data);
		$this->session->set_flashdata('message-success', 'User baru dengan nama user ' . $data['nama_user'] . ' berhasil ditambahkan');
		$this->lm->addLog('User baru dengan nama user <b>' . $data['nama_user'] . '</b> berhasil ditambahkan', $this->mm->dataUser()['id_user']);
		redirect('main/user');
	}	

	public function editUser($id_user)
	{

		$data = $this->getUserById($id_user);
		$nama_user = $data['nama_user'];

		$this->checkJabatan('mengubah user ' . $nama_user);

		$data = [
			'nama_user' => ucwords(strtolower($this->input->post('nama_user', true))),
			'jabatan' => $this->input->post('jabatan', true),
			'id_outlet' => $this->input->post('id_outlet', true)
		];

		$this->db->update('tb_user', $data, ['id_user' => $id_user]);
		$this->session->set_flashdata('message-success', 'User dengan nama user ' . $nama_user . ' berhasil diubah menjadi ' . $data['nama_user']);
		$this->lm->addLog('User dengan nama user <b>' . $nama_user . '</b> berhasil diubah menjadi <b>' . $data['nama_user'] . '</b>', $this->mm->dataUser()['id_user']);
		redirect('main/user');
	}	

	public function deleteUser($id_user)
	{
		$data = $this->getUserById($id_user);
		$nama_user = $data['nama_user'];
		$this->checkJabatan('menghapus user ' . $nama_user);
		$this->db->delete('tb_user', ['id_user' => $id_user]);
		$this->session->set_flashdata('message-success', 'User dengan nama user ' . $nama_user . ' berhasil dihapus');
		$this->lm->addLog('User dengan nama user <b>' . $nama_user . '</b> berhasil dihapus', $this->mm->dataUser()['id_user']);
		redirect('main/user');
	}

	public function gantiPassword()
	{
		$password_lama = $this->input->post('password_lama', true);
		$password_baru = $this->input->post('password_baru', true);
		$verifikasi_password_baru = $this->input->post('verifikasi_password_baru', true);

		// check old password
		if (password_verify($password_lama, $this->mm->dataUser()['password'])) {
			// check verification password
			if ($password_baru == $verifikasi_password_baru) {
				$password_baru_hash = password_hash($password_baru, PASSWORD_DEFAULT);
				$this->db->update('tb_user', ['password' => $password_baru_hash]);
				$this->session->set_flashdata('message-success', 'User dengan nama user ' . $this->mm->dataUser()['nama_user'] . ' berhasil mengubah password');
				$this->lm->addLog('User dengan nama user <b>' . $this->mm->dataUser()['nama_user'] . '</b> berhasil mengubah password', $this->mm->dataUser()['id_user']);
				redirect('main/profile');
			} else {
				$this->session->set_flashdata('message-failed', 'User dengan nama user ' . $this->mm->dataUser()['nama_user'] . ' gagal mengubah password, password baru tidak sesuai dengan verifikasi password baru');
				$this->lm->addLog('User dengan nama user <b>' . $this->mm->dataUser()['nama_user'] . '</b> gagal mengubah password, password baru tidak sesuai dengan verifikasi password baru', $this->mm->dataUser()['id_user']);
				redirect('main/profile');
			}
		} else {
			$this->session->set_flashdata('message-failed', 'User dengan nama user ' . $this->mm->dataUser()['nama_user'] . ' gagal mengubah password, password lama tidak sesuai');
			$this->lm->addLog('User dengan nama user <b>' . $this->mm->dataUser()['nama_user'] . '</b>  gagal mengubah password, password lama tidak sesuai', $this->mm->dataUser()['id_user']);
			redirect('main/profile');
		}

	}
}