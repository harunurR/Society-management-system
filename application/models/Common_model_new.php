<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model_new extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function common_insert($table,$data){
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}
	
	public function common_update($table,$data,$con){
		$this->db->where($con);
		$this->db->update($table,$data);
		$r= $this->db->affected_rows();
		return $r;
	}
	public function common_delete($table,$con){
		$this->db->delete($table,$con);
		return $this->db->affected_rows();
	}
	

	public function common_row($table,$field='*',$con=false){
		$this->db->select($field);
		if($con)
			$this->db->where($con);
		$query=$this->db->get($table);
		return $query->row();
	}
	
	public function common_result($table,$field='*',$con=false,$orderby=false,$sort=false,$ex_con=false){
		$this->db->select($field);
		if($con)
			$this->db->where($con);
		if($ex_con)
			$this->db->where($ex_con,NULL,FALSE);
		if($orderby)
			$this->db->order_by($orderby,$sort);
		$query=$this->db->get($table);
		return $query->result();
	}

	public function common_query_result($query){
		 return $this->db->query($query)->result();
	}

	public function common_query_row($query){
		 return $this->db->query($query)->row();
	}
}