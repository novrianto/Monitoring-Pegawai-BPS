<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model {
	private $table = 'users';

    public function rules($validate_username = true, $validate_password = true ) {
        $rules =  [
            [
                'field' => 'first_name',
                'label' => 'Nama Depan',
                'rules' => 'trim|required'
            ],
            // [
            //     'field' => 'last_name',
            //     'label' => 'Nama Belakang',
            //     'rules' => 'trim|required'
            // ],
            [
                'field' => 'role',
                'label' => 'Role',
                'rules' => 'trim|required'
            ],
        ];
        if( $validate_username ) {
            $rules[] = [
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'trim|required|is_unique[users.username]',
                        'errors' => ['is_unique' => 'Username invalid']
                    ];
        }

        if( $validate_password ) {
            $rules[] =  [
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required|min_length[6]',
                        'errors' => ['min_length' => 'Jumlah karakter password harus lebih atau sama dengan 6']
                    ];
        }

        return $rules;
    }

    public function getAll() {
    	return $this->db->get($this->table)->result();
    }

    public function save() {        
    	$post = $this->input->post();

        $data['username'] = $post["username"];
        $data['password'] = password_hash($post["password"], PASSWORD_DEFAULT );
        $data['first_name'] = $post["first_name"];
        $data['last_name'] = $post["last_name"];
        $data['role'] = $post["role"];
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = NULL;

        return $this->db->insert($this->table, $data);
    }

    public function update() {        
    	$post = $this->input->post();

        $data['first_name'] = $post["first_name"];
        $data['last_name'] = $post["last_name"];
        $data['role'] = $post["role"];
        $data['updated_at'] = date("Y-m-d H:i:s");

        if( $post["password"] != "" ) {
            $data['password'] = password_hash($post["password"], PASSWORD_DEFAULT );
        }

        return $this->db->update($this->table, $data, ['user_id' => $post['id']]);
    }

    public function delete($id) {
        return $this->db->delete($this->table, array("user_id" => $id));
    }

    public function getById($id) {
    	return $this->db->get_where($this->table, ['user_id' => $id])->row();
    }

    public function getUserByRole($role) {
        return $this->db->get_where($this->table, ['role' => $role])->result();
    }
}

?>