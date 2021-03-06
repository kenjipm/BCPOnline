<?php

class Account_Detail_View_Model extends CI_Model{
	
	public $account_list;
	// constructor
	public function __construct()
	{	
		parent::__construct();
	}
	
	public function get($account)
	{
		$this->account = new class{};
		
		$this->account->id 					= $account->id;
		$this->account->name 				= $account->name;
		$this->account->address 			= $account->address;
		$this->account->date_of_birth 		= date("d-M-Y", strtotime($account->date_of_birth));
		$this->account->phone_number 		= $account->phone_number;
		$this->account->identification_no	= $account->identification_no;
		$this->account->email 				= $account->email;
		$this->account->status 				= $account->status;
		$this->account->date_joined 		= $account->date_joined;
		$this->account->profile_pic 		= $account->profile_pic;
		$this->account->type				= "NOT TENANT";
	}
	
	public function get_tenant($account, $tenant)
	{
		$this->account = new class{};
		
		$this->account->id 					= $account->id;
		$this->account->name 				= $account->name;
		$this->account->address 			= $account->address;
		$this->account->date_of_birth 		= date("d-M-Y", strtotime($account->date_of_birth));
		$this->account->phone_number 		= $account->phone_number;
		$this->account->identification_no	= $account->identification_no;
		$this->account->email 				= $account->email;
		$this->account->status 				= $account->status;
		$this->account->date_joined 		= $account->date_joined;
		$this->account->profile_pic 		= $account->profile_pic;
		
		$this->account->type		 		= "TENANT";
		$this->account->bank_account 		= $tenant->bank_account;
		$this->account->bank_name 			= $tenant->bank_name;
		$this->account->bank_account_owner	= $tenant->bank_account_owner;
		$this->account->bank_branch 		= $tenant->bank_branch;
		
	}
	
}

?>