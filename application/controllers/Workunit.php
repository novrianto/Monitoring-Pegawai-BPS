<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workunit extends CI_Controller {
	public function __construct() {
        parent::__construct();
		if( !$this->current_user->is_logged ){
			redirect('login');
		}
        $this->load->model("M_work_unit");
	}

	public function list() {
		$data['data'] = $this->M_work_unit->getAll();
		$data['content'] = 'pages/work-unit/list';
		$this->load->view('index',$data);
	}

	public function add() {
		$WorkUnit = $this->M_work_unit;
		$validation = $this->form_validation;
		$validation->set_rules($WorkUnit->rules(true));
		$validation->set_message('required', '%s harus diisi');

		if( $validation->run() ) {
			$theId = $WorkUnit->save();
			if( $theId ) {

				$this->load->model("M_work_unit_member");
				$this->M_work_unit_member->save($theId, $this->current_user->user['user_id']);

	            $this->session->set_flashdata('success', 'Data unit kerja berhasil ditambah');
	            redirect("admin/work-unit");
			} else {
				var_dump($this->db->error());
			}
		}

		$data['content'] = 'pages/work-unit/add';
		$this->load->view('index',$data);
	}

	public function edit($id = NULL) {
		$WorkUnit = $this->M_work_unit;
		$validation = $this->form_validation;
		$validation->set_message('required', '%s harus diisi');
		if( !empty($this->input->post('password')) ) {
			$validation->set_rules($WorkUnit->rules(false, true));
		} else {
			$validation->set_rules($WorkUnit->rules(false, false));
		}
		if( $validation->run() ) {
			$WorkUnit->update();
            $this->session->set_flashdata('success', 'Data unit kerja berhasil diubah');
            redirect("admin/work-unit");
		}

		$data['content'] = 'pages/work-unit/edit';
		$data['data'] = $WorkUnit->getById($id);
		$this->load->view('index',$data);
	}

	public function delete($id = NULL) {
		if (!isset($id)) show_404();
        
        if ($this->M_work_unit->delete($id)) {
        	// $this->load->model("M_work_unit_member");
        	// $this->M_work_unit_member->deleteByUnitId($id);

        	$this->db->where('work_unit_id', $id)->delete(['work_unit_member', 'task']);

        	$this->session->set_flashdata('success', 'Data unit kerja berhasil dihapus');
            redirect("admin/work-unit");
        }
	}

	public function member($id = NULL) {
		if (!isset($id)) show_404();
		$this->load->model("M_work_unit_member");

		$data['content'] = 'pages/work-unit/member';
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
			redirect("admin/work-unit/" . $id . "/member");
		}

		$data['content'] = 'pages/work-unit/addmember';
		$data['unit'] = $this->M_work_unit->getById($id);
		$data['members'] = $this->M_work_unit_member->getAvailableMember($id);
		$this->load->view('index',$data);
	}

	public function deletemember($id = NULL, $user_id = NULL) {
		if (!isset($id) || !isset($user_id)) show_404();
		$this->load->model("M_work_unit_member");
        
        if ($this->M_work_unit_member->delete($id, $user_id)) {
        	$this->session->set_flashdata('success', 'Data anggota berhasil dihapus');

        	$this->db->where('user_id', $id)->delete(['task']);

            redirect("admin/work-unit/" . $id . "/member");
        }
	}

	public function detail($id) {
        $work_unit = $this->db->select('work_unit.*, CONCAT(first_name, \' \', last_name) AS supervisor_name, COALESCE(progress,0) AS progress, COALESCE(total_task, 0) AS total_task, ( CASE WHEN (progress > 0) THEN CEIL(progress / total_task) ELSE 0 END ) AS curr_progress')
                        ->from('work_unit')
                        ->join('users', 'work_unit.supervisor_id = users.user_id', 'inner')
                        ->join('( SELECT work_unit_id, sum(progress) AS progress, count(*) AS total_task FROM task GROUP BY work_unit_id ) AS task', 'work_unit.work_unit_id = task.work_unit_id', 'left')
                        ->where(['work_unit.work_unit_id' => $id])
                        ->get()
                        ->row_array();

        $task = $this->db->select('task.*, CONCAT(first_name, \' \', last_name) AS full_name')
                        ->from('task')
                        ->join('users', 'task.user_id = users.user_id', 'inner')
                        ->where(['work_unit_id' => $id])
                        ->get()
                        ->result_array();
		
		$data['work_unit'] = $work_unit;
		$data['task'] = empty($task) ? [] : $task;
		$data['content'] = 'pages/work-unit/detail';
		$this->load->view('index',$data);
	}
}