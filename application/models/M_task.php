<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_task extends CI_Model {
	private $table = 'task';

    public function rules() {
        $rules =  [
            [
                'field' => 'task_name',
                'label' => 'Nama Tugas',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'task_point',
                'label' => 'Beban Kerja',
                'rules' => 'trim|required|numeric',
                'errors' => ['numeric' => 'Beban tugas harus berupa angka']
            ],
        ];

        return $rules;
    }

    public function getAll() {
    	// return $this->db->get($this->table)->result();
        return $this->db->select('task_id, work_unit.work_unit_id, users.user_id, task_name, task_point, task.description, task.status, task.created_at, task.updated_at, unit_name, CONCAT(first_name, \' \', last_name) AS full_name, progress')
                        ->from('task')
                        ->join('users', 'task.user_id = users.user_id', 'left')
                        ->join('work_unit', 'task.work_unit_id = work_unit.work_unit_id', 'left')
                        ->get()
                        ->result();
    }

    public function save() {        
    	$post = $this->input->post();

        $data['task_name'] = $post["task_name"];
        $data['task_point'] = $post["task_point"];
        $data['description'] = $post["description"];
        $data['work_unit_id'] = empty($post["work_unit_id"]) ? 0 : $post["work_unit_id"];
        $data['user_id'] = empty($post["user_id"]) ? 0 : $post["user_id"];
        $data['status'] = 'new';
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = NULL;

        return $this->db->insert($this->table, $data);
    }

    public function update() {        
    	$post = $this->input->post();

        $data['task_name'] = $post["task_name"];
        $data['task_point'] = $post["task_point"];
        $data['description'] = $post["description"];
        $data['work_unit_id'] = empty($post["work_unit_id"]) ? 0 : $post["work_unit_id"];
        $data['user_id'] = empty($post["user_id"]) ? 0 : $post["user_id"];
        // $data['status'] = $post["status"];;
        $data['updated_at'] = date("Y-m-d H:i:s");

        return $this->db->update($this->table, $data, ['task_id' => $post['id']]);
    }

    public function delete($id) {
        return $this->db->delete($this->table, array("task_id" => $id));
    }

    public function getById($id) {
    	return $this->db->get_where($this->table, ['task_id' => $id])->row();
    }

    public function progress() {
        $post = $this->input->post();
        $data['progress'] = $post['progress'];
        if( $post['progress'] > 0 ) {
            $data['status'] = $post['progress'] < 100 ? 'ongoing' : 'finish';
        }
        $data['updated_at'] = date("Y-m-d H:i:s");
        return $this->db->update($this->table, $data, ['task_id' => $post['id']]);
    }

    public function getDetail($id) {
        return $this->db->select('task_id, work_unit.work_unit_id, users.user_id, task_name, task_point, task.description, task.status, task.created_at, task.updated_at, unit_name, CONCAT(first_name, \' \', last_name) AS full_name, progress')
                        ->from('task')
                        ->join('users', 'task.user_id = users.user_id', 'left')
                        ->join('work_unit', 'task.work_unit_id = work_unit.work_unit_id', 'left')
                        ->where(['task_id' => $id])
                        ->get()
                        ->row();
    }
}

?>