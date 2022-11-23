<?php 	
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('id_user')) {
			redirect('main');
		}
		$data['title'] = "Halaman Login";
		$this->load->view('templates/header', $data);
		$this->load->view('auth/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function login()
	{
		if ($this->session->userdata('id_user')) {
			redirect('main');
		}
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);
		$check = $this->db->get_where('tb_user', ['username' => $username])->row_array();
		if ($check) {
			if (password_verify($password, $check['password'])) {
				$session = [
					'id_user' => $check['id_user'],
					'id_outlet' => $check['id_outlet']
				];
				$this->session->set_userdata($session);
				redirect('main');
			} else {
				$this->session->set_flashdata('message-failed', 'Password yang anda masukkan salah!');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message-failed', 'Username yang anda masukkan salah!');
			redirect('auth');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('auth');
	}
}

 ?>