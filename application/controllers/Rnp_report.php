<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rnp_report extends CI_Controller {
	public function __construct(){
		parent::__construct();
        if(!$this->session->userdata('logged_in')){
			redirect('login');
			exit;
		}
		//$this->load->model('Common_model','cm',true);
		$this->load->model('Common_model_new','cm',true);
	}
    
    public function index(){
        $con['status != ']=0;
        $data['page']='reports/rnp_report.php';
        $this->load->view('master',$data);
    }
    
	
	public function get_rnp_report(){
		$accmonth=$_GET['accmonth'];
		$accyear=$_GET['accyear'];
		
		$startDate=$accyear.'-'.$accmonth.'-01';
		$endDate=$accyear.'-'.$accmonth.'-31';
		$c_data['tbl_debit_voucher.current_date>='] = $startDate;
		$c_data['tbl_debit_voucher.current_date<='] = $endDate;
		// $data['accData']=$this->Acc_rep_model->get_acc_report_head($c_data);
		// $cb_data['table_id'] = $idtab[0];
		// $cb_data['table_name'] = $idtab[1];
		// $balancename="";
		// if($idtab[1]=="tbl_fcoa_bkdn_sub")
		//     $balancename = "sub_balance";
		// elseif($idtab[1]=="tbl_fcoa_bkdn")
		//     $balancename = "bkdn_balance";
		// elseif($idtab[1]=="tbl_fcoa")
		//     $balancename = "fcoa_balance";
		    
		// $where_in= date('Y-m-d', strtotime('-1 day', strtotime($startDate)));
		// $data['startDate']=$startDate;
		// $data['accBalData']=$this->Acc_rep_model->get_acc_report_balance($cb_data,$where_in,$balancename);
		 $data['month_id']=$accmonth;	
		 if($accmonth=="10"){
			$mainContent=$this->load->view('mnt/oct', $data, true);
		 }elseif($accmonth=="11"){
			$mainContent=$this->load->view('mnt/nov', $data, true);
		 }else{
			$mainContent=$this->load->view('mnt/no_report', $data, true);
		 }
		
		
        $result = 'success';
        $return = array('result' => $result, 'mainContent'=> $mainContent);
        print json_encode($return);
        exit;   
    }
}