<?php

class Tenant_to_pay_list_view_model extends CI_Model {
	
	public $tenants;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->tenants = array();
	}
	
	// $tenant_pay_receipt->payment_period_start	
	// $tenant_pay_receipt->payment_period_end		
	// $tenant_pay_receipt->payment_purpose		
	// $tenant_pay_receipt->paid_amount			
	
	public function get($order_details)
	{
		$this->load->library('text_renderer');
		foreach ($order_details as $order_detail)
		{
			$temp_tenant = new class{};
			
			$temp_tenant->tenant_name		= $order_detail->tenant_name;
			$temp_tenant->tenant_id			= $order_detail->tenant_id;
			
			$order_detail->init_voucher();
			$temp_tenant->total_unpaid		= ($order_detail->quantity * $order_detail->sold_price) + $order_detail->voucher->voucher_worth;
			
			if (!isset($this->tenants[$temp_tenant->tenant_id]))
			{
				$this->tenants[$temp_tenant->tenant_id] = $temp_tenant;
				$this->tenants[$temp_tenant->tenant_id]->tenant_pay_receipt = new class{};
				$this->tenants[$temp_tenant->tenant_id]->tenant_pay_receipt->payment_period_start	= "";
				$this->tenants[$temp_tenant->tenant_id]->tenant_pay_receipt->payment_period_end		= "";
				$this->tenants[$temp_tenant->tenant_id]->tenant_pay_receipt->payment_purpose		= "";
			}
			else
			{
				$this->tenants[$temp_tenant->tenant_id]->total_unpaid += $temp_tenant->total_unpaid;
			}
		}
			
		foreach($this->tenants as $tenant)
		{
			$this->tenants[$temp_tenant->tenant_id]->tenant_pay_receipt->paid_amount = $tenant->total_unpaid;
			$tenant->total_unpaid = $this->text_renderer->to_rupiah($tenant->total_unpaid);
		}
	}
}
?>