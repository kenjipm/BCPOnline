<?php

class Billing_unconfirmed_view_model extends CI_Model {
	
	public $items;
	public $billing_id;
	public $price_subtotal;
	public $shipping_charge;
	public $var_type;
	public $var_description;
	public $shipping_addresses;
	public $price_total;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->items = array();
		
		$this->billing_id = 0;
		$this->price_subtotal = 0;
		$this->shipping_charge = 0;
		$this->shipping_addresses = array();
		$this->price_total = 0;
	}
	
	public function get($billing_id, $order_details, $shipping_addresses)
	{
		$this->load->library('text_renderer');
		
		$this->billing_id = $billing_id;
		
		$this->load->model('posted_item_variance_model');
		foreach ($order_details as $order_detail)
		{
			$posted_item_variance = $this->posted_item_variance_model->get_from_id($order_detail->posted_item_variance_id);
			$posted_item_variance->init_posted_item();
			
			$temp = new class{};
			
			$temp->id				= $posted_item_variance->id;
			$temp->posted_item_id	= $posted_item_variance->posted_item->id;
			$temp->posted_item_name	= $posted_item_variance->posted_item->posted_item_name;
			$temp->price			= $order_detail->sold_price;
			$temp->image_one_name	= $posted_item_variance->image_two_name;
			$temp->var_type			= $posted_item_variance->var_type;
			$temp->var_description	= $posted_item_variance->var_description;
			
			$temp->quantity			= $order_detail->quantity;
			$temp->price_total		= $order_detail->quantity * $order_detail->sold_price;
			
			$this->price_subtotal	+= $temp->price_total; // dijumlahkan dulu ke subtotal nya
			
			$temp->price			= $this->text_renderer->to_rupiah($temp->price); // baru di format sesuai rupiah
			$temp->price_total		= $this->text_renderer->to_rupiah($temp->price_total);
			
			$this->items[] = $temp; // baru di add ke array items
		}
		
		$this->shipping_charge	= 0;
		$this->price_total		= $this->price_subtotal + $this->shipping_charge;
			
		$this->shipping_charge	= $this->text_renderer->to_rupiah($this->shipping_charge);
		$this->price_subtotal	= $this->text_renderer->to_rupiah($this->price_subtotal);
		$this->price_total		= $this->text_renderer->to_rupiah($this->price_total);
		
		foreach ($shipping_addresses as $shipping_address)
		{
			$temp_shipping_address = new class{};
			$temp_shipping_address->id				= $shipping_address->id;
			$temp_shipping_address->full_address	= $shipping_address->get_full_address();
			
			$this->shipping_addresses[] = $temp_shipping_address;
		}
		
		$this->btn_address_text	= (count($this->shipping_addresses) <= 0) ? "Tambah Alamat Kirim" : "Tambah Alamat Kirim";
	}
}
?>