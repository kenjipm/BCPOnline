<?php

class report_product_by_tenant_view_model extends CI_Model {
	
	public $transactions;
	public $total_price;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->transactions = array();
		$this->total_price = 0;
	}
	
	public function get($transactions)
	{
		$this->load->library('text_renderer');
		
		foreach ($transactions as $transaction)
		{	
			$key = $transaction->tenant_id;
			
			if (!isset($this->transactions[$key]))
			{
				$this->transactions[$key] = new class{};
				
				$this->transactions[$key]->tenant_name		 			= $transaction->tenant_name;
				$this->transactions[$key]->posted_items 				= array();
				$this->transactions[$key]->total_price					= 0;
			}
			
			$this->transactions[$key]->total_price 					+= $transaction->total_price;
			
			$this->total_price 					+= $transaction->total_price;
			
			$item_temp = new class{};
			$item_temp->posted_item_name 	= $transaction->posted_item_name;
			$item_temp->quantity 			= $transaction->quantity;
			$item_temp->total_price			= $this->text_renderer->to_rupiah($transaction->total_price);
			
			$this->transactions[$key]->posted_items[] = $item_temp;
		}
		
		foreach ($this->transactions as $transaction)
		{
			$transaction->total_price 					= $this->text_renderer->to_rupiah($transaction->total_price);
		}
		
		$this->total_price = $this->text_renderer->to_rupiah($this->total_price);
	}
}
?>