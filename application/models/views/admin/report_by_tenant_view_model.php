<?php

class report_by_tenant_view_model extends CI_Model {
	
	public $transactions;
	public $total_price;
	public $total_customer_paid_price;
	public $total_done_paid_price;
	public $total_admin_paid_price;
	public $total_admin_not_paid_price;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->transactions = array();
		$this->total_price = 0;
		$this->total_customer_paid_price = 0;
		$this->total_done_paid_price = 0;
		$this->total_admin_paid_price = 0;
		$this->total_admin_not_paid_price = 0;
	}
	
	public function get($transactions)
	{
		$this->load->library('text_renderer');
		
		foreach ($transactions as $transaction)
		{	
			$key = $transaction->billing_id;
			
			if (!isset($this->transactions[$key]))
			{
				$this->transactions[$key] = new class{};
				
				$this->transactions[$key]->date_bill_created 			= $transaction->date_bill_created;
				$this->transactions[$key]->posted_items 				= array();
				$this->transactions[$key]->total_price					= 0;
				$this->transactions[$key]->total_customer_paid_price	= 0;
				$this->transactions[$key]->total_done_paid_price 		= 0;
				$this->transactions[$key]->total_admin_paid_price 		= 0;
				$this->transactions[$key]->total_admin_not_paid_price 	= 0;
			}
			
			$this->transactions[$key]->total_price 					+= $transaction->total_price;
			$this->transactions[$key]->total_customer_paid_price 	+= $transaction->total_customer_paid_price;
			$this->transactions[$key]->total_done_paid_price 		+= $transaction->total_done_paid_price;
			$this->transactions[$key]->total_admin_paid_price 		+= $transaction->total_admin_paid_price;
			$this->transactions[$key]->total_admin_not_paid_price 	+= $transaction->total_done_paid_price - $transaction->total_admin_paid_price;
			
			$this->total_price 					+= $transaction->total_price;
			$this->total_customer_paid_price 	+= $transaction->total_customer_paid_price;
			$this->total_done_paid_price 		+= $transaction->total_done_paid_price;
			$this->total_admin_paid_price 		+= $transaction->total_admin_paid_price;
			$this->total_admin_not_paid_price 	+= $transaction->total_done_paid_price - $transaction->total_admin_paid_price;
			
			$item_temp = new class{};
			$item_temp->posted_item_name 	= $transaction->posted_item_name;
			$item_temp->quantity 			= $transaction->quantity;
			$item_temp->sold_price 			= $this->text_renderer->to_rupiah($transaction->sold_price);
			$item_temp->total_price			= $this->text_renderer->to_rupiah($transaction->total_price);
			
			$this->transactions[$key]->posted_items[] = $item_temp;
			
		}
		
		foreach ($this->transactions as $transaction)
		{
			$transaction->total_price 					= $this->text_renderer->to_rupiah($transaction->total_price);
			$transaction->total_customer_paid_price 	= $this->text_renderer->to_rupiah($transaction->total_customer_paid_price);
			$transaction->total_done_paid_price 		= $this->text_renderer->to_rupiah($transaction->total_done_paid_price);
			$transaction->total_admin_paid_price 		= $this->text_renderer->to_rupiah($transaction->total_admin_paid_price);
			$transaction->total_admin_not_paid_price 	= $this->text_renderer->to_rupiah($transaction->total_done_paid_price - $transaction->total_admin_paid_price);
			
			foreach ($transaction->posted_items as $posted_item)
			{
				
			}
		}
		
		$this->total_price = $this->text_renderer->to_rupiah($this->total_price);
		$this->total_customer_paid_price = $this->text_renderer->to_rupiah($this->total_customer_paid_price);
		$this->total_done_paid_price = $this->text_renderer->to_rupiah($this->total_done_paid_price);
		$this->total_admin_paid_price = $this->text_renderer->to_rupiah($this->total_admin_paid_price);
		$this->total_admin_not_paid_price = $this->text_renderer->to_rupiah($this->total_admin_not_paid_price);
	}
}
?>