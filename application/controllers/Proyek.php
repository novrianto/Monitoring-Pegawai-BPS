<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek extends CI_Controller {
	function __construct()
	{
		parent:: __construct();
		if(!$this->session->userdata('username')){
			redirect('login');
		}
		// $this->load->model('login_m');
	}
	public function index()
	{
		$this->load->view('daftar_proyek');
	}
}