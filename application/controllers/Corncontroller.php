<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Corncontroller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Common_model');
		$this->load->model('Accounts_model');
	}

	public function index()
	{
		$housePauyment = $this->db->query("select * from tbl_house_owner_flat where status=1")->result();
		$data = array();
		foreach ($housePauyment as $pay) {
			
			$row = $this->db->query("select count(id) as c from tbl_house_owner_payment where house_owner_id='" . $pay->house_owner_id . "' and month(created_at)='" . date('m') . "' and year(created_at)='" . date('Y') . "'")->row();

			if ($row->c <= 0) {
				$data[] = array(
					'house_owner_id' => $pay->house_owner_id,
					'actual_amount' => $pay->amount,
					'pay_amount' => 0,
					'pdate' => null,
					'status' => 0,
					'created_at' => date('Y-m-d H:i:s'),
					'created_by' => 1
				);
			}
		}
		
		if (!empty($data))
			$insert = $this->Common_model->common_insert_batch($data, 'tbl_house_owner_payment');
	}

	public function fee_to_account($date = false)
	{
		if (!$date)
			$date = date('Y-m-d');

		
		$sum = $this->db->query("SELECT sum(pay_amount) as fee,GROUP_CONCAT(id) as ids FROM `tbl_house_owner_payment` 
		                        WHERE status=1")->row_array();

	
		if ($sum['fee'] > 0 && $sum['ids']) {
			$my_id = 1;
			$rec_date		= date('Y-m-d H:i:s', strtotime($date));
			$current_date	= $date;
			$pay_name		= 'Subscription Fee';
			$pay_status		= 'pay_by';
			$purpose		= 'Subscription Fee';
			$debit_sum  	= $sum['fee'];
			$credit_sum  	= $sum['fee'];
			$cheque_no  	= '';
			$cheque_dt		= '';
			$bank			= '';
			$voucher_no		= $this->Accounts_model->create_voucher_no($my_id);

			if (!empty($voucher_no)) {
				$data1 = array(
					'my_id'    		=> $my_id,
					'voucher_no'    => $voucher_no,
					'current_date'	=> $current_date,
					'pay_status'	=> $pay_status,
					'pay_name'		=> $pay_name,
					'purpose'		=> $purpose,
					'debit_sum'    	=> $debit_sum,
					'credit_sum'    => $credit_sum,
					'cheque_no'     => $cheque_no,
					'cheque_dt'   	=> $cheque_dt,
					'bank'    		=> $bank,
					'rec_date'    	=> $rec_date,
					'createdBy' 	=> 1
				);

				$insert_id = $this->Common_model->common_insert($data1, 'tbl_debit_voucher');

				if (!empty($insert_id) and $insert_id > 0) {
					$particularsArr		= array('cash', 'Subscription Fee');
					$account_codeArr	= array('11001002-Main Cash', '41001-Subscription');
					$table_nameArr    	= array('tbl_fcoa_bkdn_sub', 'tbl_fcoa_bkdn');
					$table_idArr 		= array(4, 11);
					$debitArr 			= array($debit_sum, '');
					$creditArr 			= array('', $credit_sum);
					$bkdn_idArr 		= array('', '');

					$inc = 0;
					foreach ($bkdn_idArr as $bkdn_id) {
						$insertid = '';
						$particulars	= '';
						$account_code	= '';
						$table_name    	= '';
						$table_id 		= '';
						$debit 			= '';
						$credit 		= '';

						if (!empty($particularsArr[$inc])) {
							$particulars = trim($particularsArr[$inc]);
						}
						if (!empty($account_codeArr[$inc])) {
							$account_code = $account_codeArr[$inc];
						}
						if (!empty($table_nameArr[$inc])) {
							$table_name = $table_nameArr[$inc];
						}
						if (!empty($table_idArr[$inc])) {
							$table_id = $table_idArr[$inc];
						}
						if (!empty($debitArr[$inc])) {
							$debit = $debitArr[$inc];
						}
						if (!empty($creditArr[$inc])) {
							$credit = $creditArr[$inc];
						}

						$data2 = array(
							'debit_voucher_id'  => $insert_id,
							'particulars'    	=> $particulars,
							'account_code'		=> $account_code,
							'table_name'		=> $table_name,
							'table_id'    		=> $table_id,
							'debit'    			=> $debit,
							'credit'    		=> $credit
						);

						$insertid = $this->Common_model->common_insert($data2, 'tbl_devoucher_bkdn');

						if (!empty($insertid) and $insertid > 0) {
							
							if ($table_name == "tbl_fcoa_master")
								$field_name = "fcoa_master_id";
							elseif ($table_name == "tbl_fcoa")
								$field_name = "fcoa_id";
							elseif ($table_name == "tbl_fcoa_bkdn")
								$field_name = "fcoa_bkdn_id";
							elseif ($table_name == "tbl_fcoa_bkdn_sub")
								$field_name = "fcoa_bkdn_sub_id";

							if ($debit > 0 && empty($credit)) {
								$journal_title = $particulars;
								$data3 = array(
									'journal_title' => $journal_title,
									'dr' => $debit,
									'rec_date' => $rec_date,
									'my_id' => $my_id,
									'jv_id' => $voucher_no,
									'debit_voucher_id' => $insert_id,
									'devoucher_bkdn_id' => $insertid,
									'' . $field_name . '' => $table_id
								);

								$this->Common_model->common_insert($data3, 'tbl_general_ledger');
							}
							if (empty($debit) && $credit > 0) {
								$journal_title = $particulars;
								$data3 = array(
									'journal_title' 	=> $journal_title,
									'cr'    			=> $credit,
									'rec_date'			=> $rec_date,
									'my_id'    		=> $my_id,
									'jv_id'    			=> $voucher_no,
									'debit_voucher_id'  => $insert_id,
									'devoucher_bkdn_id' => $insertid,
									'' . $field_name . ''	=> $table_id
								);
								$this->Common_model->common_insert($data3, 'tbl_general_ledger');
							}
						} 
						$inc++;
					}
				}
				$up = $this->db->query("UPDATE `tbl_house_owner_payment` SET `status`=2 where id in (" . $sum['ids'] . ")");
			} 
		}
	}
}
