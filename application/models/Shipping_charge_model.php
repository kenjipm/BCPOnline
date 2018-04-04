<?php

class Shipping_charge_model extends CI_Model {
	
	private $table_shipping_charge = 'shipping_charge';
	
	public $id;
	public $fee_id;
	public $fee_amount;
	public $fee_description;
	public $shipping_distance;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->id					= 0;
		$this->fee_id				= "";
		$this->fee_amount			= 0;
		$this->fee_description		= "";
		$this->shipping_distance	= "";
	}
	
	public function get_stub_from_db($db_item)
	{
		if ($db_item != null)
		{
			$this->id					= $db_item->id;
			$this->fee_id				= $db_item->fee_id;
			$this->fee_amount			= $db_item->fee_amount;
			$this->fee_description		= $db_item->fee_description;
			$this->shipping_distance	= $db_item->shipping_distance;
		}
		return $this;
	}
	
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id					= $this->id;
		$db_item->fee_id				= $this->fee_id;
		$db_item->fee_amount			= $this->fee_amount;
		$db_item->fee_description		= $this->fee_description;
		$db_item->shipping_distance		= $this->shipping_distance;
		
		return $db_item;
	}
	
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Shipping_charge_model();
		if ($db_item != null)
		{
			$stub->id					= $db_item->id;
			$stub->fee_id				= $db_item->fee_id;
			$stub->fee_amount			= $db_item->fee_amount;
			$stub->fee_description		= $db_item->fee_description;
			$stub->shipping_distance	= $db_item->shipping_distance;
		}
		return $stub;
	}
	
	public function get_from_shipping_address($shipping_address)
	{
		$this->fee_amount			= $this->calculate_fee_amount();
		$this->shipping_distance	= 0;
		
		return $this;
	}
	
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_shipping_charge, 1);
		$shipping_charge = $query->row();
		
		return ($shipping_charge !== null) ? $this->get_stub_from_db($shipping_charge) : new Shipping_charge_model();
	}
	
	public function insert()
	{
		$this->load->library('id_generator');
		
		$this->db->trans_start();
		
		if ($this->db->insert($this->table_shipping_charge, $this))
		{
			$this->id	= $this->db->insert_id();
		}
		
		$natural_id = $this->id_generator->generate(TYPE['name']['SHIPPING_CHARGE'], $this->id);
		$this->update_natural_id($natural_id);
		
		$this->db->trans_complete();
	}
	
	public function update_natural_id($natural_id)
	{
		$this->fee_id = $natural_id;
		
		$this->db->set('fee_id', $natural_id)
				 ->where('id', $this->id)
				 ->update($this->table_shipping_charge);
	}
	
	public function calculate_fee_amount()
	{
		return 0;
	}
}

?>