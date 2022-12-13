<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class House_owner_payment extends CI_Controller {
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
        $data['datas']=$this->cm->common_query_result('select thop.house_owner_id,thop.pay_amount,thop.actual_amount,thop.pdate,thop.status,thop.id as payment_id, tho.name from tbl_house_owner_payment as thop join tbl_house_owner as tho where tho.id=thop.house_owner_id order by thop.pdate DESC');
        $data['page']='house_owner_payment/index.php';
        $this->load->view('master',$data);
    }

    /*SELECT * FROM tbl_house_owner_payment WHERE pdate in (SELECT MAX(pdate) from tbl_house_owner_payment order BY house_owner_id);*/
   /* SELECT *,MAX(pdate) from tbl_house_owner_payment group BY house_owner_id;*/
    public function create(){
        $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
		
		$this->form_validation->set_rules('id_of_name','House owner','trim|required',array('required' => 'you must select %s'));
		$this->form_validation->set_rules('amount','Pay Amount','trim|required');
        $this->form_validation->set_rules('pdate','Pay Amount','trim|required');
		if($this->form_validation->run()==FALSE){
            $data['last_payment']=$this->cm->common_query_result("SELECT house_owner_id,MAX(pdate) as dat from tbl_house_owner_payment group BY house_owner_id");
            $data['datas']=$this->cm->common_query_result("SELECT tho.*,thf.house_no,thf.flat_no,thf.amount FROM `tbl_house_owner` as tho join tbl_house_owner_flat as thf on thf.house_owner_id=tho.id where tho.status!=0 order by tho.id DESC");
			$data['page']='house_owner_payment/add.php';
            $this->load->view('master',$data);
		}else{
            // var_dump($this->input->post());
            // die();
            $data['house_owner_id']=$this->input->post('id_of_name',true);
            $data['actual_amount']=$this->input->post('a_amount',true);
            $data['pay_amount']=$this->input->post('amount',true);   
            $data['pdate']=$this->input->post('pdate',true);
            $data['created_at']=date('Y-m-d H:i:s');//irfans_include
            $data['created_by']=$this->session->logged_in['id'];//irfans_include
            $data['updated_at']=$data['created_at'];//irfans_include
            $data['updated_by']=$data['created_by'];//irfans_include
            $insert=$this->cm->common_insert('tbl_house_owner_payment',$data);
            if($insert){               
                    $this->session->set_flashdata('message','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">X</a> Data save success.</div>'); 
                }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">X</a> Data save fail. Please Try agian.</div>');
            }
            redirect('payment');
        }

    }

    public function update($id){
        $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
		
		$this->form_validation->set_rules('amount','Pay Amount','trim|required');
        $this->form_validation->set_rules('pdate','Pay Amount','trim|required');
		if($this->form_validation->run()==FALSE){
            $data["all_user"]=$this->cm->common_query_result("SELECT tho.*,thf.house_no,thf.flat_no,thf.amount FROM `tbl_house_owner` as tho join tbl_house_owner_flat as thf on thf.house_owner_id=tho.id where tho.status!=0 order by tho.id DESC");
            $data['datas']=$this->cm->common_query_result("select tho.name,tho.contact,thf.house_no,thf.flat_no,thf.amount,thop.pay_amount,thop.pdate,thop.id as thop_id,thop.house_owner_id FROM tbl_house_owner as tho join tbl_house_owner_flat as thf on thf.house_owner_id=tho.id join tbl_house_owner_payment as thop on thop.house_owner_id=tho.id where tho.status!=0 and thop.id=".$id);
           $data['page']='house_owner_payment/update.php';
            $this->load->view('master',$data);
		}else{
            $data['house_owner_id']=$this->input->post('id_of_name',true);
            $data['actual_amount']=$this->input->post('a_amount',true);
            $data['pay_amount']=$this->input->post('amount',true);   
            $data['pdate']=$this->input->post('pdate',true);
            $data['updated_at']=date('Y-m-d H:i:s');//irfans_include
            $data['updated_by']=$this->session->logged_in['id'];//irfans_include
            $con['id']=$id;
            $up=$this->cm->common_update('tbl_house_owner_payment',$data,$con);
            
            if($up)
                $this->session->set_flashdata('message','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a> Data update success.</div>');
            else
                $this->session->set_flashdata('message','<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a> Data update fail. Please Try agian.</div>');

            redirect('payment');
        }

    }


    Public function delete_data($id){
        $con['id']=$id;
        $con_match['id']=$id;
            if($this->cm->common_delete('tbl_house_owner_payment',$con))
            $this->session->set_flashdata('message','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a> Data delete success.</div>');
        else
            $this->session->set_flashdata('message','<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a> Data delete fail. Please Try agian.</div>');
        
        redirect('payment');
    }
    
    Public function paynow($id,$status,$amount){
        $data['pdate']=date("Y-m-d");
        $data['pay_amount']=$amount;   
        $data['status']=$status;
        $data['updated_at']=date('Y-m-d H:i:s');//irfans_include
        $data['updated_by']=$this->session->logged_in['id'];//irfans_include
        $con['id']=$id;
        if($this->cm->common_update('tbl_house_owner_payment',$data,$con))
            $this->session->set_flashdata('message','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a> Payment success.</div>');
        else
            $this->session->set_flashdata('message','<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a> Payment fail. Please Try agian.</div>');
        
        redirect('payment');
    }

}
