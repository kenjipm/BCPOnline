<?php

class Billing_status_view_model extends CI_Model {
	
	public $billing;
	public $orders;
	public $payments;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->billing = new class{};
		$this->orders = array();
		$this->payments = array();
	}
	
	public function get($billing, $payments, $orders)
	{
		$this->load->library('text_renderer');
		
		$this->billing->id				= $billing->id;
		$this->billing->date_created	= $billing->date_created;
		$this->billing->date_closed		= $billing->date_closed;
		$this->billing->total_payable	= $billing->total_payable;
		
		$this->billing->address			= $billing->shipping_address->get_full_address();
		$this->billing->shipping_charge	= $billing->shipping_charge->fee_amount;
		$this->billing->total_not_paid	= $billing->total_payable; // awalnnya ikutin amount yg harus dibayar dulu
		
		$this->load->config('payment_method');
		foreach($payments as $payment)
		{
			$cur_payment_config = $this->config->item($payment->payment_method);
			
			$temp_payment = new class{};
			
			$temp_payment->id							= $payment->id;
			// $temp_payment->paid							= true;
			$temp_payment->payment_method				= $payment->payment_method;
			$temp_payment->payment_method_description	= $cur_payment_config['long_description'];
			$temp_payment->payment_date					= $payment->payment_date;
			$temp_payment->paid_amount					= $this->text_renderer->to_rupiah($payment->paid_amount);
			$temp_payment->is_paid						= $payment->paid_amount > 0;
			// $temp_payment->description					= $temp_payment->paid ? "Lunas" : "Menunggu Pembayaran";
			
			$this->billing->total_not_paid				-= $payment->paid_amount; // kurangi dari tiap payment
			
			$this->payments[] = $temp_payment;
		}
		
		foreach ($orders as $order)
		{
			$temp_order = new class{};
			
			$temp_order->id				= $order->id;
			$temp_order->quantity		= $order->quantity;
			if ($order->init_posted_item_variance() != null)
			{
				$temp_order->posted_item_variance = $order->posted_item_variance;
				if ($order->posted_item_variance->init_posted_item() != null)
				{
					$temp_order->posted_item_variance->posted_item->posted_item_name = $order->posted_item_variance->posted_item->posted_item_name . " (" . $order->posted_item_variance->var_description .  ")";
					$temp_order->posted_item_variance->posted_item->price = $this->text_renderer->to_rupiah($order->posted_item_variance->posted_item->price);
					$temp_order->order_status = ORDER_STATUS['description'][$order->order_status];
				}
			}
			
			$this->orders[] = $temp_order;
		}
		
		$this->billing->is_paid = ($this->billing->total_not_paid <= 0);
		
		$this->billing->total_payable = $this->text_renderer->to_rupiah($this->billing->total_payable);
		$this->billing->total_not_paid = $this->text_renderer->to_rupiah($this->billing->total_not_paid);
	}
}
?>