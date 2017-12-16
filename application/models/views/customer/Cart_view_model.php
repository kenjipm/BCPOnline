<?php

class Cart_view_model extends CI_Model {
	
	public $items;
	public $price_subtotal;
	public $shipping_charge;
	public $address;
	public $price_total;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->items = array();
		
		$this->price_subtotal = 0;
		$this->shipping_charge = 0;
		$this->address = "";
		$this->price_total = 0;
	}
	
	public function get($cart, $shipping_address)
	{
		$this->load->library('text_renderer');
		
		$this->load->model('item_model');
		foreach ($cart as $id => $cart_item)
		{
			$item = $this->item_model->get_from_id($id);
			
			$temp = new class{};
			
			$temp->id				= $item->id;
			$temp->posted_item_name	= $item->posted_item_name;
			$temp->price			= $item->price;
			$temp->image_one_name	= $item->image_one_name;
			
			$temp->quantity			= $cart_item->quantity;
			$temp->price_total		= $cart_item->quantity * $item->price;
			
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
		
		$this->address			= $shipping_address->get_full_address();
	}
}
?>