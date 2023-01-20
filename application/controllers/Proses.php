<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses extends CI_Controller {
	function __construct()
	{
		parent:: __construct();
		if(!$this->session->userdata('username')){
			redirect('login');
		}
		$this->load->model('login_m');
	}
	public function tambah_pengguna()
	{
		$this->form_validation->set_rules('username','Username','min_length[5]|is_unique[users.username]');
		$data = [
			"nama"=> $this->input->post('nama',true),
			"username"=>$this->input->post('username',true),
			"password"=>password_hash($this->input->post('password',true),PASSWORD_DEFAULT),
			"tipe"=>$this->input->post('tipe',true)
		];
		if($this->form_validation->run() == true){
			$this->login_m->proses_tambah_user($data);
			$this->session->set_flashdata('success','Anda berhasil menambahkan data pengguna');
			redirect(base_url('admin/pengguna'));
		}else{
			$this->session->set_flashdata('error',validation_errors());
			redirect(base_url('admin/tambah_pengguna'));
		}
	}
	public function tambah_kontraktor()
	{
		$data = [
			"nama_kontraktor"=> $this->input->post('nama_kontraktor',true),
			"no_hp"=>$this->input->post('no_hp',true),
			"alamat"=>$this->input->post('alamat',true)
			
		];
		$this->login_m->proses_tambah_kontraktor($data);
		$this->session->set_flashdata('success','Anda berhasil menambahkan data kontraktor');
		redirect(base_url('admin/kontraktor'));
		
		
	}
	public function tambah_proyek()
	{
		
		$data = [
			"id_user"=> $this->input->post('satker',true),
			"nama_proyek"=>$this->input->post('nama',true),
			"nomor_proyek"=>$this->input->post('nomor_proyek',true)
			
		];
		$idproyek=$this->login_m->proses_tambah_proyek($data);
		$data2 = [
			"id_proyek"=> $idproyek,
			"id_kontraktor"=> $this->input->post('kontraktor',true),
			"tanggal_proyek"=>date('Y-m-d',strtotime($this->input->post('tanggal_proyek',true))),
			"target_proyek"=>date('Y-m-d',strtotime($this->input->post('target_proyek',true))),
			"budget"=>$this->input->post('budget',true),
			"rencana"=>$this->input->post('rencana',true),
			"realisasi"=>$this->input->post('realisasi',true),
			"deviasi"=>$this->input->post('deviasi',true)
			
		];
		$this->login_m->proses_tambah_detail_proyek($data2);
			
			$this->session->set_flashdata('success','Anda berhasil menambahkan data pengguna');
			redirect(base_url('admin/data_proyek'));
		
		
		
	}
	public function edit_pengguna()
	{
		if(empty($this->input->post('password',true))){
			$password = $this->input->post('password_lama',true);
		}else{
			$password = password_hash($this->input->post('password',true),PASSWORD_DEFAULT);
		}
		$data = [
			"nama"=> $this->input->post('nama',true),
			"username"=>$this->input->post('username',true),
			"password"=>$password,
			"tipe"=>$this->input->post('tipe',true)
		];

		$this->login_m->proses_edit_user($data,$this->input->post('id_user',true));
		$this->session->set_flashdata('success','Anda berhasil mengubah data');
		redirect(base_url('admin/pengguna'));
	}

	public function edit_kontraktor()
	{
		$data = [
			"nama_kontraktor"=> $this->input->post('nama_kontraktor',true),
			"no_hp"=>$this->input->post('no_hp',true),
			"alamat"=>$this->input->post('alamat',true)
			
		];

		$this->login_m->proses_edit_kontraktor($data,$this->input->post('id_kontraktor',true));
		$this->session->set_flashdata('success','Anda berhasil mengubah data kontraktor');
		redirect(base_url('admin/kontraktor'));
	}
	public function hapus_pengguna($id)
	{
		$this->db->delete('users',['id_user'=>$id]);
		$this->session->set_flashdata('success','Anda berhasil menghapus data');
		redirect(base_url('admin/pengguna'));
	}
	public function hapus_kontraktor($id)
	{
		$this->db->delete('kontraktor',['id_kontraktor'=>$id]);
		$this->session->set_flashdata('success','Anda berhasil menghapus data kontraktor');
		redirect(base_url('admin/kontraktor'));
	}
	public function hapus_proyek($id)
	{
		$this->db->delete('detail_proyek',['id_proyek'=>$id]);
		$this->db->delete('proyek',['id_proyek'=>$id]);
		$this->session->set_flashdata('success','Anda berhasil menghapus data');
		redirect(base_url('admin/data_proyek'));
	}
	public function delete_file($id)
	{
		$nama_file = $this->login_m->getFileName($id);
		if(unlink('./uploads/'.$nama_file)){
			$this->db->delete('dokumentasi',['id_file'=>$id]);
		}
		$this->session->set_flashdata('success','Anda berhasil menghapus data');
		echo '<script>javascript:history.back()</script>';
	}
	public function edit_proyek()
	
	{
		// var_dump($_POST);die;
		$data = [
			"id_user"=> $this->input->post('satker',true),
			"nama_proyek"=>$this->input->post('nama',true),
			"nomor_proyek"=>$this->input->post('nomor_proyek',true)
			
		];
		$this->login_m->proses_edit_proyek($data,$this->input->post('id_proyek',true));
		$data2 = [
			"id_kontraktor"=> $this->input->post('kontraktor',true),
			"tanggal_proyek"=>date('Y-m-d',strtotime($this->input->post('tanggal_proyek',true))),
			"target_proyek"=>date('Y-m-d',strtotime($this->input->post('target_proyek',true))),
			"budget"=>$this->input->post('budget',true),
			"rencana"=>$this->input->post('rencana',true),
			"realisasi"=>$this->input->post('realisasi',true),
			"deviasi"=>$this->input->post('deviasi',true)
			
		];
		$this->login_m->proses_edit_detail_proyek($data2,$this->input->post('id_detail',true));
			
		$this->session->set_flashdata('success','Anda berhasil mengubah data proyek');
		redirect(base_url('admin/data_proyek'));
		
		
		
	}
	public function ubah_progress()
	{
		$data = [
			"rencana"=>$this->input->post('rencana',true),
			"realisasi"=>$this->input->post('realisasi',true),
			"deviasi"=>$this->input->post('deviasi',true)
		];
		$this->login_m->ubahProgress($data,$this->input->post('id_detail',true));
        $this->session->set_flashdata('success','Jumlah progress berhasil diperbaharui');
        echo '<script>javascript:history.back()</script>';
	}
	public function upload_dokumentasi()
	{
		// var_dump($_FILES);die;
		$id_proyek = $this->input->post('id_proyek',true);
		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|jpeg|png|xlsx|pdf';
        $config['max_size']             = 2048;
        $config['encrypt_name']			= true;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file_dokumentasi'))
        {
            $this->session->set_flashdata('error',$this->upload->display_errors());
        }
        else
        {
            $data = $this->upload->data();
            $this->login_m->uploadDokumentasi($data['file_name'],$data['file_size'],$id_proyek);
            $this->session->set_flashdata('success','File dokumentasi berhasil ditambahkan');

        }
        redirect(base_url('admin/detail_proyek/'.$id_proyek));
	}

}
