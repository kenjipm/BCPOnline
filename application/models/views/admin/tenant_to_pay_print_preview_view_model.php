<?php

class Tenant_to_pay_print_preview_view_model extends CI_Model {
	
	public $print_title;
	
	public $tenant;
	public $order_details;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->tenant = new class{};
		$this->order_details = array();
	}
	
	public function get($tenant, $order_details)
	{
		$this->print_title			= null;
		
		$this->tenant->tenant_name	= $tenant->tenant_name;
		$this->tenant->unit_number	= $tenant->unit_number;
		$this->tenant->floor		= $tenant->floor;
		$this->tenant->bank_account	= $tenant->bank_account;
		$this->tenant->total_unpaid = 0;
		
		$this->load->library('text_renderer');
		foreach ($order_details as $order_detail)
		{
			$temp_order_detail = new class{};
			
			$temp_order_detail->posted_item_name	= $order_detail->posted_item_name;
			$temp_order_detail->quantity			= $order_detail->quantity;
			$temp_order_detail->sold_price			= $this->text_renderer->to_rupiah($order_detail->sold_price);
			
			$order_detail->init_voucher();
			$temp_order_detail->voucher_cut_price	= $this->text_renderer->to_rupiah($order_detail->voucher->voucher_worth);
			
			$temp_order_detail->total_unpaid		= ($order_detail->quantity * $order_detail->sold_price) + $order_detail->voucher->voucher_worth;
			$this->tenant->total_unpaid				+= $temp_order_detail->total_unpaid;
			
			$temp_order_detail->total_unpaid		= $this->text_renderer->to_rupiah($temp_order_detail->total_unpaid);
			
			$this->order_details[] = $temp_order_detail;
		}
		$this->tenant->total_unpaid = $this->text_renderer->to_rupiah($this->tenant->total_unpaid);
		
		$this->print_title = $tenant->tenant_name . " - " . $tenant->unit_number . " - " . $tenant->floor . " (" . date("d M Y") . ")";
	}
}
?>