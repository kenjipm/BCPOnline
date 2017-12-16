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
		
		foreach($payments as $payment)
		{
			$temp_payment = new class{};
			
			$temp_payment->id							= $payment->id;
			$temp_payment->paid							= true;
			$temp_payment->payment_method				= $payment->payment_method;
			$temp_payment->payment_method_description	= "";
			$temp_payment->payment_date					= $payment->payment_date;
			$temp_payment->paid_amount					= $payment->paid_amount;
			$temp_payment->description					= $temp_payment->paid ? "Lunas" : "Menunggu Pembayaran";
			
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
				if ($order->init_posted_item() != null)
				{
					$temp_order->posted_item_variance->posted_item->name = $order->posted_item->name;
					$temp_order->posted_item_variance->posted_item->price = $order->posted_item->price;
					$temp_order->posted_item_variance->posted_item->order_status = $order->order_status;
				}
			}
			
			$this->orders[] = $temp_order;
		}
		
		$this->billing->is_paid = ($this->billing->total_not_paid <= 0);
	}
}
?>