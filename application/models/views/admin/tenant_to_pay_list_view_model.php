<?php

class Tenant_to_pay_list_view_model extends CI_Model {
	
	public $tenants;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$tenants = array();
	}
	
	public function get($order_details)
	{
		$this->load->library('text_renderer');
		foreach ($order_details as $order_detail)
		{
			$temp_tenant = new class{};
			
			// $temp_tenant->tenant_id		= 
			
			$this->tenants[] = $temp_tenant;
		}
	}
}
?>