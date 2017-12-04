<?php

class Account_model extends CI_Model {
	
	private $table_account = 'account';

	public $id;
	public $account_id;
	public $address;
	public $date_of_birth;
	public $phone_number;
	public $email;
	public $password;
	public $identification_no;
	public $identification_pic;
	public $status;
	public $date_joined;
	public $profile_pic;
	
	public function get_user_login($account_id, $password)
	{
		$where['account_id'] = $account_id;
		$where['password'] = $password;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_account, 1);
		
		return $query->result()[0];
	}
}

?>