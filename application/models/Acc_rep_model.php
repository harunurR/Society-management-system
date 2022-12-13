<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acc_rep_model extends CI_Model {
    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
	
	/************************ acc report for acc head *********************************/
	public function get_acc_report_head($data,$where_inc=false){
		$this->db->select('`tbl_devoucher_bkdn`.*, `tbl_debit_voucher`.`voucher_no`, `tbl_debit_voucher`.`current_date`, `tbl_debit_voucher`.`rec_date`, `tbl_debit_voucher`.`purpose`');
		$this->db->from('tbl_devoucher_bkdn');
		$this->db->join('tbl_debit_voucher','tbl_devoucher_bkdn.debit_voucher_id=tbl_debit_voucher.debit_voucher_id','left');
		$this->db->where($data);
		if($where_inc)
			$this->db->where_in('tbl_devoucher_bkdn.particulars',$where_inc);
		
		$this->db->order_by('tbl_devoucher_bkdn.devoucher_bkdn_id','ASC');
		$query = $this->db->get();
        $result = $query->result_array();
        return $result;   
    }
	public function get_acc_report_balance($data,$where_in,$balancename){
		$table_id=$data['table_id'];
		$table_name=$data['table_name'];
		$tbl_id=substr($data['table_name'],4).'_id';
		
		$this->db->select("(sum(`debit`)-sum(`credit`)) as balance,(select $balancename from $table_name where $tbl_id=$table_id) as sub_balance");
		$this->db->from('tbl_devoucher_bkdn');
		$this->db->where($data);
		if($where_in)
		$this->db->where(" debit_voucher_id in (select `debit_voucher_id` from tbl_debit_voucher where tbl_debit_voucher.current_date <= '$where_in')");
		$query = $this->db->get();
        $result = $query->row_array();
        return $result;   
    }
	/***** acc report for acc head/ *****/
	
	/***** acc report for Profit_loss_report *****/

	public function gplre($data){
		$this->db->select('`tbl_devoucher_bkdn`.`account_code`,(sum(`tbl_devoucher_bkdn`.`debit`)-sum(`tbl_devoucher_bkdn`.`credit`)) as cost,`tbl_devoucher_bkdn`.`table_name`,`tbl_devoucher_bkdn`.`table_id`');
		$this->db->from('tbl_devoucher_bkdn');
		$this->db->join('tbl_debit_voucher','tbl_devoucher_bkdn.debit_voucher_id=tbl_debit_voucher.debit_voucher_id','left');
		$this->db->where($data);
		$this->db->where("((`tbl_devoucher_bkdn`.`table_name` = 'tbl_fcoa_bkdn'
	AND `tbl_devoucher_bkdn`.`table_id` IN (select fcoa_bkdn_id from tbl_fcoa_bkdn where fcoa_id = 13)) or (`tbl_devoucher_bkdn`.`table_name` = 'tbl_fcoa_bkdn_sub' AND `tbl_devoucher_bkdn`.`table_id` IN (select fcoa_bkdn_sub_id from tbl_fcoa_bkdn_sub where fcoa_bkdn_id = 46)))", NULL, FALSE);
		
		$this->db->group_by('`tbl_devoucher_bkdn`.`account_code`');
		$this->db->order_by('tbl_devoucher_bkdn.devoucher_bkdn_id','ASC');
		$query = $this->db->get();
        $result = $query->result_array();
        return $result;   
    }
	
	public function gplri($data){
		$this->db->select('`tbl_devoucher_bkdn`.`account_code`,(sum(`tbl_devoucher_bkdn`.`credit`)-sum(`tbl_devoucher_bkdn`.`debit`)) as income,`tbl_devoucher_bkdn`.`table_name`,`tbl_devoucher_bkdn`.`table_id`');
		$this->db->from('tbl_devoucher_bkdn');
		$this->db->join('tbl_debit_voucher','tbl_devoucher_bkdn.debit_voucher_id=tbl_debit_voucher.debit_voucher_id','left');
		$this->db->where($data);
		$this->db->where("((`tbl_devoucher_bkdn`.`table_name` = 'tbl_fcoa_bkdn'
	AND `tbl_devoucher_bkdn`.`table_id` IN (select fcoa_bkdn_id from tbl_fcoa_bkdn where fcoa_id in (11,10,9,8))) or (`tbl_devoucher_bkdn`.`table_name` = 'tbl_fcoa_bkdn_sub' AND `tbl_devoucher_bkdn`.`table_id` IN (select fcoa_bkdn_sub_id from tbl_fcoa_bkdn_sub where fcoa_bkdn_id = 34)))", NULL, FALSE);
	
		
		$this->db->group_by('`tbl_devoucher_bkdn`.`account_code`');
		$this->db->order_by('tbl_devoucher_bkdn.devoucher_bkdn_id','ASC');
		$query = $this->db->get();
        $result = $query->result_array();
        return $result;   
    }
	
	/***** /acc report for Profit_loss_report/ *****/
	
	/***** acc report for Receipt_payment_report *****/
	
	/***** /acc report for Receipt_payment_report *****/
	
}
?>