<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_work_unit extends CI_Model {
	private $table = 'work_unit';

    public function rules($validate_username = true, $validate_password = true ) {
        $rules =  [
            [
                'field' => 'unit_name',
                'label' => 'Nama Unit Kerja',
                'rules' => 'trim|required|min_length[5]',
                'errors' => ['min_length' => 'Jumlah karakter nama unit kerja harus lebih atau sama dengan 5']
            ],
            [
                'field' => 'description',
                'label' => 'Deskripsi',
                'rules' => 'trim',
            ]
        ];

        return $rules;
    }

    public function getAll() {
        return $this->db->select('work_unit.*, CONCAT(first_name, \' \', last_name) AS supervisor_name')
                        ->from('work_unit')
                        ->join('users', 'work_unit.supervisor_id = users.user_id', 'inner')
                        ->get()
                        ->result();
    }

    public function save() {        
    	$post = $this->input->post();

        $data['unit_name'] = $post["unit_name"];
        $data['description'] = $post["description"];
        $data['supervisor_id'] = $this->current_user->user['user_id']; // current logged user (supervisor)
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = NULL;
        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    public function update() {        
    	$post = $this->input->post();

        $data['unit_name'] = $post["unit_name"];
        $data['description'] = $post["description"];
        $data['updated_at'] = date("Y-m-d H:i:s");

        return $this->db->update($this->table, $data, ['work_unit_id' => $post['id']]);
    }

    public function delete($id) {
        return $this->db->delete($this->table, array("work_unit_id" => $id));
    }

    public function getById($id) {
    	return $this->db->get_where($this->table, ['work_unit_id' => $id])->row();
    }
}

?>