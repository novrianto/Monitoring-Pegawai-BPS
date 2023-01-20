<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_work_unit_member extends CI_Model {
	private $table = 'work_unit_member';

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

    public function getAll($id) {
        return $this->db->select('work_unit_member.user_id, first_name, last_name, work_unit_member.created_at')
                        ->from('work_unit_member')
                        ->join('users', 'work_unit_member.user_id = users.user_id', 'inner')
                        ->where('work_unit_id = ' . $id . ' AND users.user_id IS NOT NULL')
                        ->get()
                        ->result();
    }

    public function save($work_unit_id = NULL, $user_id = NULL) {        
    	$post = $this->input->post();

        $data['work_unit_id'] = empty($work_unit_id) ? $post["work_unit_id"] : $work_unit_id;
        $data['user_id'] = empty($user_id) ? $post["user_id"] : $user_id;
        $data['created_at'] = date("Y-m-d H:i:s");

        return $this->db->insert($this->table, $data);
    }

    public function delete($id, $user_id) {
        return $this->db->delete($this->table, array("work_unit_id" => $id, "user_id" => $user_id));
    }

    public function getAvailableMember($id) {
        return $this->db->select('*')
                        ->from('users')
                        ->where('role = \'user\' AND user_id NOT IN (SELECT user_id FROM work_unit_member WHERE work_unit_id = ' . $id . ')')
                        ->get()
                        ->result();
    }

    public function getAllGroupByUnit() {
        $tempData = $this->db->select('work_unit_id, work_unit_member.user_id, first_name, last_name, work_unit_member.created_at')
                        ->from('work_unit_member')
                        ->join('users', 'work_unit_member.user_id = users.user_id', 'inner')
                        ->where('users.user_id IS NOT NULL')
                        ->get()
                        ->result();

        $data = [];
        foreach ($tempData as $member) {
            $data[ $member->work_unit_id ][ $member->user_id ] =  $member->first_name . ' ' . $member->last_name;
        }

        return $data;
    }

    public function deleteByUnitId($id) {
        return $this->db->delete($this->table, array("work_unit_id" => $id));
    }
}

?>