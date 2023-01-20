<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	// public function register()
	// {
	// 	$this->load->view('auth/register');
	// }
	// public function lost_password()
	// {
	// 	$this->load->view('auth/lost_password');
	// }
	// public function confirm_mail()
	// {
	// 	$this->load->view('auth/confirm_mail');
	// }
	// public function logout()
	// {
	// 	$this->load->view('auth/logout');
	// }
	// public function dashboard()
	// {
	// 	$this->load->view('index');
	// }
	// public function add()
	// {
	// 	$this->load->view('page/add');
	// }
	// public function addquestion()
	// {
	// 	$this->load->view('page/addquestion');
	// }
}