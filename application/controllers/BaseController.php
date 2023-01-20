<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
        parent::__construct();
		if(!$this->session->userdata('user_token')){
			redirect('login');
		}
        $this->load->model("M_user");
	}

	public function list() {
		$data['users'] = $this->M_user->getAll();
		$data['content'] = 'pages/user/list';
		$this->load->view('index',$data);
	}

	public function add() {
		$User = $this->M_user;
		$validation = $this->form_validation;
		$validation->set_rules($User->rules(true));
		$validation->set_message('required', '%s harus diisi');

		if( $validation->run() ) {
			if( $User->save() ) {
	            $this->session->set_flashdata('success', 'Data pegawai berhasil ditambah');
	            redirect("admin/user");
			} else {
				var_dump($this->db->error());
			}
		}

		$data['content'] = 'pages/user/add';
		$this->load->view('index',$data);
	}

	public function edit($id = NULL) {
		$User = $this->M_user;
		$validation = $this->form_validation;
		$validation->set_message('required', '%s harus diisi');
		if( !empty($this->input->post('password')) ) {
			$validation->set_rules($User->rules(false, true));
		} else {
			$validation->set_rules($User->rules(false, false));
		}
		if( $validation->run() ) {
			$User->update();
            $this->session->set_flashdata('success', 'Data pegawai berhasil diubah');
            redirect("admin/user");
		}

		$data['content'] = 'pages/user/edit';
		$data['user'] = $User->getById($id);
		$this->load->view('index',$data);
	}

	public function delete($id = NULL) {
		if (!isset($id)) show_404();
        
        if ($this->M_user->delete($id)) {
        	$this->session->set_flashdata('success', 'Data pegawai berhasil dihapus');
            redirect("admin/user");
        }
	}
}