<?php

class Billing_view_model extends CI_Model {
	
	public $billing;
	public $orders;
	public $payment_methods;
	public $delivery_methods;
	
	// private $billing_class;
	// private $order_class;
	// private $posted_item_class;
	// private $payment_method_class;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		// $this->billing_class = new class
		// {
			// public $id = 0;
			// public $date_created = ""; //date("d-m-Y");
			// public $date_closed = ""; //date("d-m-Y", strtotime("+".INVOICE_DUE." days"));
			// public $address = "";
			// public $shipping_charge = 0;
			// public $total_payable = 0;
			// public $action = "";
			// public $action_name = "";
			// public $is_paid = false;	
		// };
		
		// $this->posted_item_class = new class
		// {
			// public $name = "";
			// public $price = "";
		// };
		
		// $this->order_class = new class
		// {
			// public $id = 0;
			// public $quantity = 1;
			// public $posted_item = "";
		// };
		
		// $this->payment_method_class = new class
		// {
			// public $id = 0;
			// public $name = "";
			// public $selected = false;
		// };
		
		// $this->billing = $this->billing_class;
		$this->billing = new class{};
		$this->orders = array();
		$this->payment_methods = array();
	}
	
	public function get_from_cart($cart, $shipping_address, $shipping_charge, $new_billing)
	{
		$this->load->library('text_renderer');
		
		$this->load->model('posted_item_variance_model');
		foreach ($cart as $id => $cart_item)
		{
			$posted_item_variance = $this->posted_item_variance_model->get_from_id($id);
			$posted_item_variance->init_posted_item();
			
			$temp_order = new class{};
			$temp_order->quantity									= $cart_item['quantity'];
			$temp_order->posted_item_variance						= new class{};
			$temp_order->posted_item_variance->id					= $posted_item_variance->id;
			// $temp_order->posted_item_variance->var_type				= $posted_item_variance->var_type;
			$temp_order->posted_item_variance->var_description		= $posted_item_variance->var_description;
			$temp_order->posted_item_variance->posted_item			= new class{};
			$temp_order->posted_item_variance->posted_item->name	= $posted_item_variance->posted_item->posted_item_name;
			$temp_order->posted_item_variance->posted_item->price	= $this->text_renderer->to_rupiah($posted_item_variance->posted_item->price);
			$temp_order->price_total								= $this->text_renderer->to_rupiah($cart_item['quantity'] * $posted_item_variance->posted_item->price);
			
			$this->orders[] = $temp_order; // baru di add ke array items
		}
			
		$this->billing->id				= $new_billing->id;
		$this->billing->date_created	= $new_billing->date_created;
		$this->billing->date_closed		= $new_billing->date_closed;
		$this->billing->total_payable	= $this->text_renderer->to_rupiah($new_billing->total_payable);
		$this->billing->customer_id		= $new_billing->customer_id;
		$this->billing->action			= "create_from_cart";
		$this->billing->action_name		= "Bayar";
		$this->billing->is_paid			= false;
		
		$this->billing->shipping_charge = new class{};
		$this->billing->shipping_charge->fee_amount	= $shipping_charge->fee_amount;
		$this->billing->shipping_address = new class{};
		$this->billing->shipping_address->id			= $shipping_address->id ?? 0;
		$this->billing->shipping_address->full_address	= $shipping_address->get_full_address() ?? "";
		
		$this->load->config('payment_method');
		// if ($order_type == "REPAIR") 
			// $payment_method_list = $this->config->item('repair_payment_methods');
		// else //if ($order_type == "ORDER") 
			$payment_method_list = $this->config->item('order_payment_methods');
		
		foreach ($payment_method_list as $payment_method_name)
		{
			$cur_payment_method = $this->config->item($payment_method_name);
			
			$temp_payment_method = new class{};
			$temp_payment_method->name = $cur_payment_method['name'];
			$temp_payment_method->description = $cur_payment_method['description'];
			$temp_payment_method->selected = count($this->payment_methods) == 0; // select elemen pertama dulu aja
			
			$this->payment_methods[] = $temp_payment_method;
		}
		
		$this->load->config('delivery_method');
		// if ($order_type == "REPAIR") 
			// $payment_method_list = $this->config->item('repair_delivery_methods');
		// else //if ($order_type == "ORDER") 
			$delivery_method_list = $this->config->item('order_delivery_methods');
		
		foreach ($delivery_method_list as $delivery_method_name)
		{
			$cur_delivery_method = $this->config->item($delivery_method_name);
			
			$temp_delivery_method = new class{};
			$temp_delivery_method->name = $cur_delivery_method['name'];
			$temp_delivery_method->description = $cur_delivery_method['description'];
			$temp_delivery_method->selected = count($this->delivery_methods) == 0; // select elemen pertama dulu aja
			
			$this->delivery_methods[] = $temp_delivery_method;
		}
	}
}
?>