<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class House_owner extends CI_Controller {
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
        $data['datas']=$this->cm->common_query_result("SELECT tho.*,thf.house_no,thf.flat_no,thf.amount FROM `tbl_house_owner` as tho join tbl_house_owner_flat as thf on thf.house_owner_id=tho.id where tho.status!=0 order by tho.id DESC");
        $data['page']='house_owner/index.php';
        $this->load->view('master',$data);
    }

    public function create(){
        $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
		
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('house_no','House No','trim|required');
		$this->form_validation->set_rules('flat_no','Flat No','trim|required');
		$this->form_validation->set_rules('amount','Pay Amount','trim|required');
		$this->form_validation->set_rules('contact','Contact','trim|required|is_unique[tbl_house_owner.contact]');
		$this->form_validation->set_rules('email','Email','trim|valid_email|is_unique[tbl_house_owner.email]');
		if($this->form_validation->run()==FALSE){
			$data['page']='house_owner/add.php';
            $this->load->view('master',$data);
		}else{
            $data['name']=$this->input->post('name',true);
            $data['contact']=$this->input->post('contact',true);
            $data['alt_contact']=$this->input->post('alt_contact',true);
            $data['email']=$this->input->post('email',true);
            $data['per_add']=$this->input->post('per_add',true);
            $data['created_at']=date('Y-m-d H:i:s');//irfans_include
            $data['created_by']=$this->session->logged_in['id'];//irfans_include
            $data['updated_at']=$data['created_at'];//irfans_include
            $data['updated_by']=$data['created_by'];//irfans_include
            $insert=$this->cm->common_insert('tbl_house_owner',$data);
            if($insert){
                $fdata['created_at']=$data['created_at'];//irfans_include
                $fdata['created_by']=$data['created_by'];//irfans_include
                $fdata['updated_at']=$data['created_at'];//irfans_include
                $fdata['updated_by']=$data['created_by'];//irfans_include
                $fdata['house_owner_id']=$insert;
                $fdata['house_no']=$this->input->post('house_no',true);
                $fdata['flat_no']=$this->input->post('flat_no',true);
                $fdata['amount']=$this->input->post('amount',true);
                if($this->cm->common_insert('tbl_house_owner_flat',$fdata))
                    $this->session->set_flashdata('message','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a> Data save success.</div>');
                else
                    $this->session->set_flashdata('message','<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a> Data save fail. Please Try agian.</div>');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a> Data save fail. Please Try agian.</div>');
            }
            redirect('houseowner');
        }

    }

    public function update($id){
        $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
		
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('house_no','House No','trim|required');
		$this->form_validation->set_rules('flat_no','Flat No','trim|required');
		$this->form_validation->set_rules('amount','Pay Amount','trim|required');
		$this->form_validation->set_rules('contact','Contact','trim|required');
		$this->form_validation->set_rules('email','Email','trim|valid_email');
		if($this->form_validation->run()==FALSE){
            $data['data']=$this->cm->common_query_row("SELECT tho.*,thf.house_no,thf.flat_no,thf.amount FROM `tbl_house_owner` as tho join tbl_house_owner_flat as thf on thf.house_owner_id=tho.id where tho.id=$id");
			$data['page']='house_owner/update.php';
            $this->load->view('master',$data);
		}else{
            $data['name']=$this->input->post('name',true);
            $data['contact']=$this->input->post('contact',true);
            $data['alt_contact']=$this->input->post('alt_contact',true);
            $data['email']=$this->input->post('email',true);
            $data['per_add']=$this->input->post('per_add',true);
            $data['updated_at']=date('Y-m-d H:i:s');//irfans_include
            $data['updated_by']=$this->session->logged_in['id'];//irfans_include
            $con['id']=$id;
            $up=$this->cm->common_update('tbl_house_owner',$data,$con);
            $fcon['house_owner_id']=$id;
            $fdata['updated_at']=$data['updated_at'];//irfans_include
            $fdata['updated_by']=$data['updated_by'];//irfans_include
            $fdata['house_no']=$this->input->post('house_no',true);
            $fdata['flat_no']=$this->input->post('flat_no',true);
            $fdata['amount']=$this->input->post('amount',true);
            $up1=$this->cm->common_update('tbl_house_owner_flat',$fdata,$fcon);
                
            if($up || $up1)
                $this->session->set_flashdata('message','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a> Data update success.</div>');
            else
                $this->session->set_flashdata('message','<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a> Data update fail. Please Try agian.</div>');

            redirect('houseowner');
        }

    }

    Public function delete_data($id){
        $con['id']=$id;
        $con_match['house_owner_id']=$id;
        if(!$this->cm->common_result('tbl_house_owner_payment','*',$con_match)){
            if($this->cm->common_delete('tbl_house_owner',$con)){
                if($this->cm->common_delete('tbl_house_owner_flat',$con_match))   
                    $this->session->set_flashdata('message','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a> Data delete success.</div>');
                else
                   $this->session->set_flashdata('message','<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a> Data delete fail. Please Try agian.</div>');
            }
            else
                $this->session->set_flashdata('message','<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a> Data delete fail. Please Try agian.</div>');
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-info"><a href="#" class="close" data-dismiss="alert">&times;</a> Please Delete relative data first.</div>');
        }
        
        redirect('houseowner');
    }
    
    
    
    Public function payment_record($id){
        $con['house_owner_id']=$id;
        if($this->cm->common_result('tbl_house_owner_payment','*',$con)){
        $data['details']=$this->cm->common_query_result("SELECT tho.id,tho.name,tho.contact,tho.alt_contact,tho.email,tho.per_add,thof.house_no,thof.flat_no,thof.amount FROM tbl_house_owner tho inner join tbl_house_owner_flat thof on thof.house_owner_id=tho.id where tho.id=$id"); 
        $data['datas']=$this->cm->common_query_result("select thop.*,tho.name from tbl_house_owner_payment as thop join tbl_house_owner as tho on tho.id=thop.house_owner_id where thop.house_owner_id=$id order by pdate DESC");
        $data['page']='house_owner_payment/record.php';
        $this->load->view('master',$data);
        // $this->load->view('house_owner_payment/record.php',$data);
        }
    }
}
