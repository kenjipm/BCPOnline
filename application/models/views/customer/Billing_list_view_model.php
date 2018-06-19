<?php

class Billing_list_view_model extends CI_Model {
	
	public $billings;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->billings = array();
	}
	
	public function get($billings)
	{
		$this->load->library('text_renderer');
		foreach ($billings as $billing)
		{
			$billing->init_shipping_address();
			$billing->init_shipping_charge();
			
			$temp_billing = new class{};
			$temp_billing->id				= $billing->id;
			$temp_billing->date_created		= date("d-m-Y H:i:s", strtotime($billing->date_created));
			$temp_billing->date_closed		= date("d-m-Y H:i:s", strtotime($billing->date_closed));
			$temp_billing->address			= $billing->shipping_address->get_full_address();
			$temp_billing->shipping_charge	= $this->text_renderer->to_rupiah($billing->shipping_charge->fee_amount);
			// $temp_billing->total_payable	= $this->text_renderer->to_rupiah($billing->calculate_total_payable());
			$temp_billing->total_payable	= $this->text_renderer->to_rupiah($billing->total_payable);
			
			$temp_billing->count_unread_order = $billing->count_unread_order_customer();
			
			$this->billings[] = $temp_billing;
		}
	}
}
?>