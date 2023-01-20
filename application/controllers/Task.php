<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {
	public function __construct() {
        parent::__construct();
		if( !$this->current_user->is_logged ){
			redirect('login');
		}
        $this->load->model("M_task");
	}

	public function list() {
		$data['data'] = $this->M_task->getAll();
		$data['content'] = 'pages/task/list';
		$this->load->view('index',$data);
	}

	public function add() {
		$Task = $this->M_task;
		$validation = $this->form_validation;
		$validation->set_rules($Task->rules(true));
		$validation->set_message('required', '%s harus diisi');

		if( $validation->run() ) {
			if( $Task->save() ) {
	            $this->session->set_flashdata('success', 'Data tugas berhasil ditambah');
	            redirect("admin/task");
			} else {
				var_dump($this->db->error());
			}
		}

		$this->load->model("M_work_unit");
		$this->load->model("M_work_unit_member");

		$data['content'] = 'pages/task/add';
		$data['arrUnit'] = $this->M_work_unit->getAll();
		$data['arrMember'] = $this->M_work_unit_member->getAllGroupByUnit();
		$this->load->view('index',$data);
	}

	public function edit($id = NULL) {
		$Task = $this->M_task;
		$validation = $this->form_validation;
		$validation->set_message('required', '%s harus diisi');
		if( !empty($this->input->post('password')) ) {
			$validation->set_rules($Task->rules(false, true));
		} else {
			$validation->set_rules($Task->rules(false, false));
		}
		if( $validation->run() ) {
			$Task->update();
            $this->session->set_flashdata('success', 'Data tugas berhasil diubah');
            redirect("admin/task");
		}
		
		$this->load->model("M_work_unit");
		$this->load->model("M_work_unit_member");

		$data['content'] = 'pages/task/edit';
		$data['data'] = $Task->getById($id);
		$data['arrUnit'] = $this->M_work_unit->getAll();
		$data['arrMember'] = $this->M_work_unit_member->getAllGroupByUnit();
		$this->load->view('index',$data);
	}

	public function delete($id = NULL) {
		if (!isset($id)) show_404();
        
        if ($this->M_task->delete($id)) {
        	$this->session->set_flashdata('success', 'Data tugas berhasil dihapus');
            redirect("admin/task");
        }
	}

	public function member($id = NULL) {
		if (!isset($id)) show_404();
		$this->load->model("M_work_unit_member");

		$data['content'] = 'pages/task/member';
		$data['unit'] = $this->M_work_unit->getById($id);
		$data['members'] = $this->M_work_unit_member->getAll($id);
		$this->load->view('index',$data);
	}

	public function addmember($id = NULL) {
		if (!isset($id)) show_404();
		$this->load->model("M_work_unit_member");

		if( $this->input->post('user_id') ) {
			$this->M_work_unit_member->save();
			$this->session->set_flashdata('success', 'Data anggota berhasil ditambah');
			redirect("admin/task/" . $id . "/member");
		}

		$data['content'] = 'pages/task/addmember';
		$data['unit'] = $this->M_work_unit->getById($id);
		$data['members'] = $this->M_work_unit_member->getAvailableMember($id);
		$this->load->view('index',$data);
	}

	public function deletemember($id = NULL, $user_id = NULL) {
		if (!isset($id) || !isset($user_id)) show_404();
		$this->load->model("M_work_unit_member");
        
        if ($this->M_work_unit_member->delete($id, $user_id)) {
        	$this->session->set_flashdata('success', 'Data anggota berhasil dihapus');
            redirect("admin/task/" . $id . "/member");
        }
	}

	public function progress($id) {
		$Task = $this->M_task;
		// $validation = $this->form_validation;
		// $validation->set_message('required', '%s harus diisi');
		// $validation->set_rules($Task->rules());
		// if( $validation->run() ) {
		// 	$Task->progress();
  //           $this->session->set_flashdata('success', 'Data perkembangan tugas berhasil diubah');
  //           redirect("admin/task");
		// }

		if( $this->input->post('progress') ) {
			$Task->progress();
            $this->session->set_flashdata('success', 'Data perkembangan tugas berhasil diubah');
            redirect("admin/task");
		}

		$data['content'] = 'pages/task/progress';
		$data['data'] = $Task->getDetail($id);
		$this->load->view('index',$data);
	}
}