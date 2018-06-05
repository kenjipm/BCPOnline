<?php

class report_by_product_view_model extends CI_Model {
	
	public $transactions;
	public $total_sold;
	public $total_price;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->transactions = array();
		$this->total_sold = 0;
		$this->total_price = 0;
	}
	
	public function get($transactions)
	{
		$this->load->library('text_renderer');
		
		$i = 0;
		foreach ($transactions as $transaction)
		{	
			$this->transactions[$i] = new class{};
			
			$this->transactions[$i]->posted_item_name 	= $transaction->posted_item_name;
			$this->transactions[$i]->tenant_name 		= $transaction->tenant_name;
			$this->transactions[$i]->quantity 			= $transaction->quantity;
			$this->transactions[$i]->total_price 		= $this->text_renderer->to_rupiah($transaction->total_price);
			
			$this->total_sold += $transaction->quantity;
			$this->total_price += $transaction->total_price;
			
			$i++;
		}
		
		$this->total_price = $this->text_renderer->to_rupiah($this->total_price);
	}
}
?>