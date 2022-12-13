<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Common_model','cm',true);
		if(!$this->session->userdata('logged_in')){
			redirect('login');
			exit;
		}
	}
	
	function index(){
		$data['page']="dashboard.php";
		$this->load->view('master',$data);
	}
}