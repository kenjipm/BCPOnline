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
			// public $add_fee = 0;
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
	
	public function get_from_cart($cart, $new_billing, $shipping_address)
	{
		$this->load->library('text_renderer');
		
		$this->load->model('item_model');
		foreach ($cart as $id => $quantity)
		{
			$item = $this->item_model->get_from_id($id);
			
			$temp_order = new class{}:
			$temp_order->quantity			= $quantity;
			$temp_order->posted_item		= new class{}:
			$temp_order->posted_item->name	= $item->posted_item_name;
			$temp_order->posted_item->price	= $this->text_renderer->to_rupiah($item->price);
			
			$this->billing->id				= $new_billing->id;
			$this->date_created				= $new_billing->date_created;
			$this->date_closed				= $new_billing->date_created;
			$this->total_payable			= $new_billing->;
			$this->action					= $new_billing->;
			$this->action_name				= $new_billing->;
			$this->is_paid					= $new_billing->;
			
			$this->add_fee					= $new_billing->add_fee;
			$this->address					= $new_billing->shipping_address;
			
			$temp->price			= $item->price;
			$temp->image_one_name	= $item->image_one_name;
			
			$temp->quantity			= $quantity;
			$temp->price_total		= $quantity * $item->price;
			
			$this->price_subtotal	+= $temp->price_total; // dijumlahkan dulu ke subtotal nya
			
			$temp->price_total		= $this->text_renderer->to_rupiah($temp->price_total);
			
			$this->orders[] = $temp_order; // baru di add ke array items
		}
		
		$this->add_fee			= 0;
		$this->price_total		= $this->price_subtotal + $this->add_fee;
			
		$this->add_fee			= $this->text_renderer->to_rupiah($this->add_fee);
		$this->price_subtotal	= $this->text_renderer->to_rupiah($this->price_subtotal);
		$this->price_total		= $this->text_renderer->to_rupiah($this->price_total);
		
		$this->address			= $shipping_address->address_detail ? $shipping_address->address_detail : "";
		$this->address		   .= $shipping_address->kelurahan ? ($this->address ? ", " : "").$shipping_address->kelurahan : "";
		$this->address		   .= $shipping_address->kecamatan ? ($this->address ? ", " : "").$shipping_address->kecamatan : "";
		$this->address		   .= $shipping_address->city ? ($this->address ? ", " : "").$shipping_address->city : "";
		$this->address		   .= $shipping_address->postal_code ? ($this->address ? ", " : "").$shipping_address->postal_code : "";
	}
}
?>