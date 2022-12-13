<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Balance_sheet extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('common_model', 'Common_model', true);
		$this->load->model('acc_rep_model', 'Acc_rep_model', true);
		if(!$this->session->userdata('logged_in')){
			redirect('login');
			exit;
		}
	}
	
	/*********************** Account Head Report ************************/
	public function index(){
		$data['page']='report/balance_sheet.php';
		$this->load->view('master',$data);
	}
}
	