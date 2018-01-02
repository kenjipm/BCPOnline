<?php

class Followed_tenant_view_model extends CI_Model {
	
	public $followed_tenants;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->followed_tenants = array();
	}
	
	public function get($followed_tenants)
	{
		foreach($followed_tenants as $followed_tenant)
		{
			$followed_tenant->init_tenant();
			$followed_tenant->tenant->init_account();
			
			$followed_tenant_temp = new class{};
			$followed_tenant_temp->id						= $followed_tenant->id;
			$followed_tenant_temp->date_followed			= date("d M y", strtotime($followed_tenant->date_followed));
			
			$followed_tenant_temp->tenant = new class{};
			$followed_tenant_temp->tenant->id				= $followed_tenant->tenant->id;
			$followed_tenant_temp->tenant->tenant_name		= $followed_tenant->tenant->tenant_name;
			
			$followed_tenant_temp->tenant->account = new class{};
			$followed_tenant_temp->tenant->account->profile_pic	= $followed_tenant->tenant->account->profile_pic;
			
			$this->followed_tenants[] = $followed_tenant_temp;
		}
	}
}
?>