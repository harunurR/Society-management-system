<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Auth_model','am',true);
		//$this->load->model('Common_model','cm',true);
		$this->load->model('Common_model_new','cm',true);
	}
	
	function login(){
		if($this->session->userdata('logged_in')){
			redirect('dashboard');
			exit;
		}
		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

		$this->form_validation->set_rules('email','Contact / Email','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required|callback_check_user');
		if($this->form_validation->run()==FALSE){
			//echo $this->db->last_query();
			$data['setting']=$this->cm->common_row('tbl_settings');
			$this->load->view('auth/login',$data);
		}else{
			redirect('dashboard');
		}
	}

	function check_user($pass){
		$email=$this->input->post('email',true);
		$password=sha1(md5($pass));
		$rs=$this->am->login($email,$password);
		if($rs){
			if($rs->status==1){
				 if($rs->image){
					$a=$rs->image;
				}else{
					$a='149071.png';
				}
				
				$sess_arr=array(
					'id'=>$rs->id,
					'contact'=>$rs->contact,
					'email'=>$rs->email,
					'name'=>$rs->name,
					'image'=>$a
				);

				$this->session->set_userdata('logged_in',$sess_arr);
				/*var_dump($this->session->logged_in['name']);
				var_dump($this->session->userdata('logged_in')['name']);*/
				$ld['last_login']=date('Y-m-d H:i:s');
				$ld['login_ip']=$_SERVER['REMOTE_ADDR'];
				$con['id']=$rs->id;
				$this->cm->common_update('tbl_auth',$ld,$con);
				return TRUE;
			}else{
				$this->form_validation->set_message('check_user','You are not active user. Please contact to authority.');
				return FALSE;
			}
		}else{
			$this->form_validation->set_message('check_user','Either invalid email/contact or password.');
			return FALSE;
		}
	}

	function register(){
		if($this->session->userdata('logged_in')){
			redirect('dashboard');
			exit;
		}

		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
		
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('contact','Contact','trim|required|is_unique[tbl_auth.contact]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[tbl_auth.email]');
		$this->form_validation->set_rules('password','Password','trim|required|max_length[20]|min_length[6]');
		$this->form_validation->set_rules('repassword','Repeat password','trim|required|max_length[20]|min_length[6]|matches[password]');
		if($this->form_validation->run()==FALSE){
			$data['setting']=$this->cm->common_row('tbl_settings');
			$this->load->view('auth/register',$data);
		}else{
			$data['name']=$this->input->post('name',true);
			$data['contact']=$this->input->post('contact',true);
			$data['email']=$this->input->post('email',true);
			$data['password']=sha1(md5($this->input->post('password',true)));
			$data['status']=1;
			$data['created_at']=date('Y-m-d H:i:s');
			$data['updated_at']=date('Y-m-d H:i:s');
			$data['updated_by']=1;
			$data['created_by']=1;
			
			if(!empty($_FILES['image']['name'])){
				$this->load->library('upload');
				$con['upload_path']='upload/user/';
				$con['file_name']=str_replace(' ','_',$this->input->post('name',true)).time();
				$con['allowed_types']='jpg|png|jpeg|gif';
				$con['overwrite']=false;
				$dir="upload";
				$dir1="upload/user";
				if(!file_exists($dir)){
					mkdir($dir);
				}
				if(!file_exists($dir1)){
					mkdir($dir1);
				}
				$this->upload->initialize($con);
				if($this->upload->do_upload('image')){
					$imgdata=$this->upload->data();
					$data['image']=$imgdata['file_name'];
				}
			}
			
			if($this->am->register('tbl_auth',$data)){
				$this->session->set_flashdata('message','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&time;</a> Registration success.</div>');
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&time;</a> Registration fail. Please Try agian.</div>');
			}
			redirect('login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->load->view('auth/logout');
	}

	

	public function forget_pass(){
		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
		
		$this->form_validation->set_rules('email','Email','trim|required|callback_check_email');
		if($this->form_validation->run()==FALSE){
			$data['setting']=$this->cm->common_row('tbl_settings');
			$this->load->view('auth/forget',$data);
		}else{
			$data['forget_key']=md5(uniqid());
			$con['email']=$this->input->post('email',true);
			if($this->cm->common_update('tbl_auth',$data,$con)){
				if($this->send_forget_email($con['email'],$data['forget_key']))
				$this->session->set_flashdata('message','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&time;</a> Email send success.</div>');
				else
				$this->session->set_flashdata('message','<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&time;</a>  Email send fail. Please try agian.</div>');
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&time;</a>  Password reset fail. Please try agian.</div>');
			}
			redirect('forget');
		}
	}


	public function check_email($email){
		$con['email']=$email;
		$rs=$this->cm->common_row('tbl_auth','*',$con);
		if(!$rs){
			$this->form_validation->set_message('check_email','This email address is not valid.');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function send_forget_email($email,$key){
		$this->load->library('email');
		$c['protocol']='sendmail';
		$c['smtp_server']='smtp.gmail.com';
		$c['smtp_port']=587;
		$c['smtp_user']='idbwdpfr46@gmail.com';
		$c['smtp_password']='&META@@charset&';
		$c['mailtype']='html';
		$c['charset']='utf-8';

		$msg="Your password reset link is:<br>";
		$msg.=base_url('resetpassword').$key;
		$this->email->initialize($c);
		$this->email->from('idbwdpfr46@gmail.com','WDPF R46');
		$this->email->to($email);
		$this->email->subject('Password change code');
		$this->email->message($msg);
		if($this->email->send())
			return true;
		else
			return false;
	}

	
	public function reset_password($key){
		$con['forget_key']=$key;
		$rs=$this->cm->common_row('tbl_auth','*',$con);
		if(!$rs){
			$this->session->set_flashdata('message','<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&time;</a> Your key is not valid.</div>');
			redirect('forget');
		}else{
			$data['key']=$key;
			$data['setting']=$this->cm->common_row('tbl_settings');
			$this->load->view('auth/reset_password',$data);
		}
	}

	public function change_password($key){
		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

		$this->form_validation->set_rules('password','Password','trim|required|max_length[20]|min_length[6]');
		$this->form_validation->set_rules('repassword','Repeat password','trim|required|max_length[20]|min_length[6]|matches[password]');
		if($this->form_validation->run()==FALSE){
			$data['key']=$key;
			$data['setting']=$this->cm->common_row('tbl_settings');
			$this->load->view('auth/reset_password',$data);
		}else{
			$data['password']=sha1(md5($this->input->post('password',true)));
			$data['forget_key']="";
			$data['updated_at']=date('Y-m-d H:i:s');//irfans_include
			$con['forget_key']=$key;
			if($this->cm->common_update('tbl_auth',$data,$con)){
				$this->session->set_flashdata('message','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&time;</a> Password reset success.</div>');
				redirect('login');
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&time;</a>  Password reset fail. Please try agian.</div>');
				redirect('forget');
			}
		}
	}
}