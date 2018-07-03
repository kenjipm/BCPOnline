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
		$this->load->config('delivery_method');
		$cur_delivery_config = $this->config->item($billing->delivery_method);
		
		$this->billing->id				= $billing->id;
		$this->billing->delivery_method	= $cur_delivery_config['description'];
		$this->billing->date_created	= $billing->date_created;
		$this->billing->date_closed		= $billing->date_closed;
		$this->billing->total_payable	= $billing->total_payable;
		
		$this->billing->address			= $billing->shipping_address->get_full_address();
		$this->billing->shipping_charge	= $this->text_renderer->to_rupiah($billing->shipping_charge->fee_amount);
		$this->billing->total_not_paid	= $billing->total_payable; // awalnnya ikutin amount yg harus dibayar dulu
		
		$this->load->config('payment_method');
		foreach($payments as $payment)
		{
			$cur_payment_config = $this->config->item($payment->payment_method);
			
			$temp_payment = new class{};
			
			$temp_payment->id							= $payment->id;
			// $temp_payment->paid							= true;
			$temp_payment->payment_method				= $cur_payment_config['description'];
			$temp_payment->payment_method_description	= $cur_payment_config['long_description'];
			$temp_payment->payment_date					= $payment->payment_date;
			$temp_payment->paid_amount					= $this->text_renderer->to_rupiah($payment->paid_amount);
			$temp_payment->is_paid						= $payment->paid_amount > 0;
			// $temp_payment->description					= $temp_payment->paid ? "Lunas" : "Menunggu Pembayaran";
			
			$this->billing->total_not_paid				-= $payment->paid_amount; // kurangi dari tiap payment
			
			$this->payments[] = $temp_payment;
		}
		
		$this->load->model('order_status_history_model');
		$this->billing->subtotal = 0;
		$this->billing->voucher_cut_price = 0;
		foreach ($orders as $order)
		{
			$temp_order = new class{};
			
			$temp_order->id				= $order->order_id;
			$temp_order->quantity		= $order->quantity;
			if ($order->init_posted_item_variance() != null)
			{
				$temp_order->posted_item_variance = $order->posted_item_variance;
				if ($order->posted_item_variance->init_posted_item() != null)
				{
					$temp_order->posted_item_variance->posted_item->posted_item_name = $order->posted_item_variance->posted_item->posted_item_name . " (" . $order->posted_item_variance->var_description . ")";
					$temp_order->posted_item_variance->posted_item->price = $this->text_renderer->to_rupiah($order->sold_price);
					$temp_order->posted_item_variance->posted_item->tenant_id = $order->posted_item_variance->posted_item->tenant_id;
					$temp_order->order_status = ORDER_STATUS['description'][$order->order_status];
					$temp_order->is_received = ($order->order_status == ORDER_STATUS['name']['RECEIVED']);
					$temp_order->is_done = ($order->order_status == ORDER_STATUS['name']['DONE']);
				}
			}
			
			$order_status_histories = $this->order_status_history_model->get_from_order_details_id($order->order_id);
			foreach ($order_status_histories as $order_status_history)
			{
				$temp_order_status_history = new class{};
				$temp_order_status_history->status		= ORDER_STATUS['description'][$order_status_history->status];
				$temp_order_status_history->date_added	= date("d M y H:i:s", strtotime($order_status_history->date_added));
				
				$temp_order->order_status_histories[] = $temp_order_status_history;
			}
			$this->billing->subtotal += ($order->sold_price * $order->quantity);
			$this->billing->voucher_cut_price = $order->voucher_worth;
			$this->orders[] = $temp_order;
		}
		
		$this->billing->is_paid = ($this->billing->total_not_paid <= 0);
		
		$this->billing->subtotal = $this->text_renderer->to_rupiah($this->billing->subtotal);
		$this->billing->voucher_cut_price = $this->text_renderer->to_rupiah($this->billing->voucher_cut_price);
		$this->billing->total_payable = $this->text_renderer->to_rupiah($this->billing->total_payable);
		$this->billing->total_not_paid = $this->text_renderer->to_rupiah($this->billing->total_not_paid);
	}
}
?>