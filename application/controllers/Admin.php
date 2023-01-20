<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index() {
		if( !$this->current_user->is_logged ){
			redirect('login');
		}

		$data['content'] = 'admin';
		$this->load->view('index',$data);
	}

	public function login() {
		if( $this->current_user->is_logged ){
			redirect('/');
		}

		$this->load->model("M_login");
		$Login = $this->M_login;
		$validation = $this->form_validation;
		$validation->set_rules($Login->rules());
		$validation->set_message('required', '%s harus diisi');

		if( $validation->run() ) {
			$Login->checkLogin($this->input->post('username'), $this->input->post('password'));
		}

		$this->load->view('pages/login');
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('login');
	}
}