<?php

class report_main_view_model extends CI_Model {
	
	public $tenants;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->tenants = array();
	}
	
	public function get($tenants)
	{
		$i = 0;
		foreach ($tenants as $tenant)
		{	
			$this->tenants[$i] = new class{};
			
			$this->tenants[$i]->id 				= $tenant->id;
			$this->tenants[$i]->tenant_name 	= $tenant->tenant_name;
			
			$i++;
		}
	}
}
?>