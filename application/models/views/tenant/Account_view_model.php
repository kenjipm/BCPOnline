<?php

class Account_view_model extends CI_Model {
	
	public $account;
	public $tenant;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->account = new class{};
		$this->tenant = new class{};
	}
	
	public function get($account, $tenant)
	{
		$this->account->tenant_id = $tenant->id;
		$this->account->name = $account->name;
		$this->account->address = $account->address;
		$this->account->date_of_birth = $account->date_of_birth;
		$this->account->phone_number = $account->phone_number;
		$this->account->email = $account->email;
		$this->account->date_joined = $account->date_joined;
		$this->account->identification_no = $account->identification_no;
		
		$this->account->identification_pic = site_url(($account->identification_pic !== "") ? $account->identification_pic : DEFAULT_IDENTIFICATION_PIC);
		$this->account->profile_pic = site_url(($account->profile_pic !== "") ? $account->profile_pic : DEFAULT_PROFILE_PIC);
		
		$this->account->profile_pic .= "?t=".time();
		
		$this->tenant->tenant_name = $tenant->tenant_name;
		$this->tenant->unit_number = $tenant->unit_number;
		$this->tenant->floor = $tenant->floor;
		
	}
}
?>