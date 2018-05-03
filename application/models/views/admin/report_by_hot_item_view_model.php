<?php

class report_by_hot_item_view_model extends CI_Model {
	
	public $transactions;
	public $total_payment;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->transactions = array();
		$this->total_payment = 0;
	}
	
	public function get($transactions)
	{
		$this->load->library('text_renderer');
		
		$i = 0;
		foreach ($transactions as $transaction)
		{	
			$this->transactions[$i] = new class{};
			
			$this->transactions[$i]->payment_date 		= $transaction->payment_date;
			$this->transactions[$i]->payment_type 		= ($transaction->payment_type == "SEO") ? "Promoted" : "Hot Item";
			$this->transactions[$i]->tenant_name 		= $transaction->tenant_name;
			$this->transactions[$i]->posted_item_name 	= $transaction->posted_item_name;
			$this->transactions[$i]->promo_price 		= $this->text_renderer->to_rupiah($transaction->promo_price);
			$this->transactions[$i]->promo_description 	= ($transaction->promo_description != "") ? $transaction->promo_description : "-";
			$this->transactions[$i]->payment_value 		= $this->text_renderer->to_rupiah($transaction->payment_value);
			
			$this->total_payment += $transaction->payment_value;
			$i++;
		}
		$this->total_payment = $this->text_renderer->to_rupiah($this->total_payment);
	}
}
?>