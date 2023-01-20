<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model {
	private $table = 'users';

    public $username = "";
	public $password = "";

    public function rules($validate_password = true) {
        return  [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required',
            ]
        ];
    }

    public function getByUsernam($id) {
    	return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function checkLogin($username, $password) {
        $currData = $this->db->get_where($this->table, ['username' => $username])->row();
        if( !empty($currData) ) {
            if(password_verify($password, $currData->password)) {
                $sessionData = [
                    // "user_token"=>$currData->password
                    "user_token" => md5($username)
                ];
                $this->session->set_userdata($sessionData);
                redirect('/');
            } else {
                $this->session->set_flashdata('error','Username / password salah');
            }
        } else {
            $this->session->set_flashdata('error','Username / password salah');
        }
    }
}

?>