<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	public function login($email,$password){
		$this->db->where('password',$password);
		$this->db->group_start();
			$this->db->where('email',$email);
			$this->db->or_where('contact',$email);
		$this->db->group_end();
		$this->db->where('status !=',0);
		$query=$this->db->get('tbl_auth');
		return $query->row();
	}
	
	public function register($table_name,$data){
		$this->db->insert($table_name,$data);
		return $this->db->insert_id();
	}
}