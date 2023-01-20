<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->current_user->is_logged) {
			redirect('admin');
		}
		$this->load->model('login_m');
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function proses()
	{
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);

		$userData = $this->login_m->cek_login($username);
		if (isset($userData)) {
			if (true)
			// if(password_verify($password, $userData['password']))
			{
				$sessionData = [
					"iduser" => $userData['id_user'],
					"fullname" => $userData['nama'],
					"username" => $userData['username'],
					"tipe" => $userData['tipe']
				];
				$this->session->set_userdata($sessionData);
				redirect('admin');
			} else {
				$this->session->set_flashdata('error', 'Maaf password anda salah');
			}
		} else {
			$this->session->set_flashdata('error', 'Maaf username anda salah');
		}
		redirect('login');
	}
	public function buat_akun()
	{
		$data = [
			"nama" => "Administrator",
			"username" => "admin",
			"password" => password_hash("admin", PASSWORD_DEFAULT),
			"tipe" => "administrator"
		];
		$this->db->insert("users", $data);
	}
}
