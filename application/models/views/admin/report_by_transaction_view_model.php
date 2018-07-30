<?php

class report_by_transaction_view_model extends CI_Model {
	
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
		
		$i = 0;
		foreach ($transactions as $transaction)
		{	
			$this->transactions[$i] = new class{};
			
			$this->transactions[$i]->billing_id 	= $transaction->billing_id;
			$this->transactions[$i]->natural_billing_id 	= $transaction->natural_billing_id;
			$this->transactions[$i]->date_bill_created 	= $transaction->date_bill_created;
			$this->transactions[$i]->total_price 	= $this->text_renderer->to_rupiah($transaction->total_price);
			$this->transactions[$i]->total_customer_paid_price 	= $this->text_renderer->to_rupiah($transaction->total_customer_paid_price);
			$this->transactions[$i]->total_done_paid_price 	= $this->text_renderer->to_rupiah($transaction->total_done_paid_price);
			$this->transactions[$i]->total_admin_paid_price 	= $this->text_renderer->to_rupiah($transaction->total_admin_paid_price);
			$this->transactions[$i]->total_admin_not_paid_price 	= $this->text_renderer->to_rupiah($transaction->total_done_paid_price - $transaction->total_admin_paid_price);
			
			$this->total_price += $transaction->total_price;
			$this->total_customer_paid_price += $transaction->total_customer_paid_price;
			$this->total_done_paid_price += $transaction->total_done_paid_price;
			$this->total_admin_paid_price += $transaction->total_admin_paid_price;
			$this->total_admin_not_paid_price += $transaction->total_done_paid_price - $transaction->total_admin_paid_price;
			
			$i++;
		}
		$this->total_price = $this->text_renderer->to_rupiah($this->total_price);
		$this->total_customer_paid_price = $this->text_renderer->to_rupiah($this->total_customer_paid_price);
		$this->total_done_paid_price = $this->text_renderer->to_rupiah($this->total_done_paid_price);
		$this->total_admin_paid_price = $this->text_renderer->to_rupiah($this->total_admin_paid_price);
		$this->total_admin_not_paid_price = $this->text_renderer->to_rupiah($this->total_admin_not_paid_price);
	}
}
?>