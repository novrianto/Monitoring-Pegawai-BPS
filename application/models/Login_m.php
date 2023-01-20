<?php

class Login_m extends CI_Model {
	public function cek_login($username)
	{
		return $this->db->get_where('users',["username"=>$username])->row_array();
	}
	public function proses_tambah_user($data)
	{
		$this->db->insert('users',$data);
	}
	public function proses_tambah_kontraktor($data)
	{
		$this->db->insert('kontraktor',$data);
	}
	public function getPengguna()
	{
		return $this->db->get('users')->result_array();

	}
	public function getKontraktor()
	{
		return $this->db->get('kontraktor')->result_array();

	}
	public function getUserById($id)
	{
		return $this->db->get_where('users',['id_user'=>$id])->row_array();

	}
	public function getKontraktorById($id)
	{
		return $this->db->get_where('kontraktor',['id_kontraktor'=>$id])->row_array();

	}
	public function proses_edit_user($data,$id)
	{
		$this->db->update('users',$data,['id_user'=>$id]);
	}
	public function proses_edit_kontraktor($data,$id)
	{
		$this->db->update('kontraktor',$data,['id_kontraktor'=>$id]);
	}
	public function proses_tambah_proyek($data)

	{
		$this->db->insert('proyek',$data);
		return $this->db->insert_id();
	}
	public function proses_tambah_detail_proyek($data)

	{
		$this->db->insert('detail_proyek',$data);
		
	}
	public function getProyek()
	{
		
		return $this->db->select('a.id_proyek,a.nama_proyek,a.nomor_proyek,b.id_detail,(b.rencana+b.realisasi+b.deviasi)/3 as progress')
		->join('detail_proyek b','b.id_proyek=a.id_proyek')
		->get('proyek a')->result_array();

	}
	public function getProyekBySatker($id)
	{
		return $this->db->select('a.id_proyek,a.nama_proyek,a.nomor_proyek,b.id_detail,(b.rencana+b.realisasi+b.deviasi)/3 as progress')
		->join('detail_proyek b','b.id_proyek=a.id_proyek')
		->where('a.id_user',$id)
		->get('proyek a')->result_array();

	}
	public function getProyekProses()
	{
		return $this->db->select('a.id_proyek,a.nama_proyek,a.nomor_proyek,(b.rencana+b.realisasi+b.deviasi)/3 as progress')
		->join('detail_proyek b','b.id_proyek=a.id_proyek')
		->where('(b.rencana+b.realisasi+b.deviasi)/3<100')
		->get('proyek a')->result_array();

	}
	public function getProyekSelesai()
	{
		return $this->db->select('a.id_proyek,a.nama_proyek,a.nomor_proyek,(b.rencana+b.realisasi+b.deviasi)/3 as progress')
		->join('detail_proyek b','b.id_proyek=a.id_proyek')
		->where('(b.rencana+b.realisasi+b.deviasi)/3=100')
		->get('proyek a')->result_array();

	}
	public function getProyekById($id)
	{

		return $this->db->select('*')
		->join('detail_proyek b','a.id_proyek=b.id_proyek')
		->where('a.id_proyek',$id)
		->get('proyek a')->row_array();
	}
	public function proses_edit_proyek($data,$id)
	{
		$this->db->update('proyek',$data,['id_proyek'=>$id]);
	}
	public function proses_edit_detail_proyek($data,$id)
	{
		$this->db->update('detail_proyek',$data,['id_detail'=>$id]);
	}
	public function getViewProyekById($id)
	{

		return $this->db->select('a.*,b.*,c.*,d.*,(b.rencana+b.realisasi+b.deviasi)/3 as total_progress')
		->join('detail_proyek b','a.id_proyek=b.id_proyek')
		->join('users c','c.id_user=a.id_user')
		->join('kontraktor d','d.id_kontraktor=b.id_kontraktor')
		->where('a.id_proyek',$id)
		->get('proyek a')->row_array();

	}
	public function getSatkers()
	{
		return $this->db->get_where('users',['tipe'=>'satker'])->result_array();

	}
	public function uploadDokumentasi($namafile,$filesize,$id)

	{
		$data = [
			"id_proyek"=>$id,
			"nama_file"=>$namafile,
			"file_size"=>$filesize
		];
		$this->db->insert('dokumentasi',$data);
		
	}
	public function getAllfile($id)
	{
		return $this->db->get_where('dokumentasi',['id_proyek'=>$id])->result_array();

	}
	public function ubahProgress($data,$id)
	{
		$this->db->update('detail_proyek',$data,['id_detail'=>$id]);
	}
	public function getFileName($id)
	{
		$data = $this->db->select('nama_file')
		->get_where('dokumentasi',['id_file'=>$id])->row_array();
		return $data['nama_file'];
	}
}
