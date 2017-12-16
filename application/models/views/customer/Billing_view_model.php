<?php

class Billing_view_model extends CI_Model {
	
	public $billing;
	public $orders;
	public $payment_methods;
	
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
		
		$this->load->model('item_model');
		foreach ($cart as $id => $cart_item)
		{
			$item = $this->item_model->get_from_id($id);
			
			$temp_order = new class{};
			$temp_order->quantity			= $cart_item->quantity;
			$temp_order->posted_item		= new class{};
			$temp_order->posted_item->id	= $item->id;
			$temp_order->posted_item->name	= $item->posted_item_name;
			$temp_order->posted_item->price	= $this->text_renderer->to_rupiah($item->price);
			$temp_order->price_total		= $this->text_renderer->to_rupiah($cart_item->quantity * $item->price);
			
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
		$this->billing->shipping_address->id			= $shipping_address->id;
		$this->billing->shipping_address->full_address	= $shipping_address->get_full_address();
		
		// DUMMY (taro mana??)
		$this->payment_methods[0] = new class{};
		$this->payment_methods[0]->id = 1;
		$this->payment_methods[0]->name = "Cash on Delivery";
		$this->payment_methods[0]->selected = true;
		$this->payment_methods[1] = new class{};
		$this->payment_methods[1]->id = 2;
		$this->payment_methods[1]->name = "KlikBCA";
		$this->payment_methods[1]->selected = false;
		$this->payment_methods[2] = new class{};
		$this->payment_methods[2]->id = 3;
		$this->payment_methods[2]->name = "BCA KlikPay";
		$this->payment_methods[2]->selected = false;
		$this->payment_methods[3] = new class{};
		$this->payment_methods[3]->id = 4;
		$this->payment_methods[3]->name = "BNI e-Banking";
		$this->payment_methods[3]->selected = false;
		$this->payment_methods[4] = new class{};
		$this->payment_methods[4]->id = 5;
		$this->payment_methods[4]->name = "Doku Wallet";
		$this->payment_methods[4]->selected = false;
		foreach ($this->payment_methods as $payment_method)
		{
			
		}
	}
}
?>