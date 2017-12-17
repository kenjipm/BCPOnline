<?php

class Deliverer_model extends CI_Model {
	
	private $table_default = 'deliverer';
	private $table_deliverer = 'deliverer';
	
	public $id;
	public $deliverer_id;
	public $account_id;
	public $license_plate;
	public $vehicle_desc;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id				= NULL;
		$this->deliverer_id		= "";
		$this->account_id		= "";
		$this->license_plate	= "";
		$this->vehicle_desc		= "";
		
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id				= $db_item->id;
		$this->deliverer_id		= $db_item->deliverer_id;
		$this->account_id		= $db_item->account_id;
		$this->license_plate	= $db_item->license_plate;
		$this->vehicle_desc		= $db_item->vehicle_desc;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id				= $this->id;
		$db_item->deliverer_id		= $this->deliverer_id;
		$db_item->account_id		= $this->account_id;
		$db_item->license_plate		= $this->license_plate;
		$db_item->vehicle_desc		= $this->vehicle_desc;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Customer_model();
		
		$stub->id				= $db_item->id;
		$stub->deliverer_id		= $db_item->deliverer_id;
		$stub->account_id		= $db_item->account_id;
		$stub->license_plate	= $db_item->license_plate;
		$stub->vehicle_desc		= $db_item->vehicle_desc;
		
		return $stub;
	}
	
	public function map_list($deliverers)
	{
		$result = array();
		foreach ($deliverers as $deliverer)
		{
			$result[] = $this->get_new_stub_from_db($deliverer);
		}
		return $result;
	}
	
	// get deliverer detail
	// public function get_from_id($id)
	// {
		// $where['posted_item.id'] = $id;
		
		// $this->db->select('*, ' . $this->table_item.'.id AS id');
		// $this->db->join('category', 'category.id=' . $this->table_item . '.category_id', 'left');
		// $this->db->join('brand', 'brand.id=' . $this->table_item . '.brand_id', 'left');
		// $this->db->where($where);
		// $query = $this->db->get($this->table_item, 1);
		// $item = $query->row();
		
		// return ($item !== null) ? $this->get_stub_from_db($item) : null;
	// }
	
	public function get_all()
	{
		$this->load->model('Deliverer_model');
		
		$query = $this->db->get($this->table_deliverer);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
	
	public function get_by_account_id($account_id)
	{
		$this->db->where('account_id', $account_id);
		$query = $this->db->get($this->table_deliverer, 1);
		
		return $query->row();
	}
	
	public function insert_from_account($account_id)
	{
		$this->account_id			= $account_id;
		$this->deliverer_id			= "";
		$this->license_plate		= "";
		$this->vehicle_desc			= "";
		
		$this->db->trans_start();
		
		if ($this->db->insert($this->table_deliverer, $this))
		{
			$this->id	= $this->db->insert_id();
		}
		
		$this->db->trans_complete();
	}
	
	public function update_natural_id($natural_id)
	{
		$this->deliverer_id = $natural_id;
		
		$this->db->trans_start();
		
		$this->db->set('deliverer_id', $natural_id)
				 ->where('id', $this->id)
				 ->update($this->table_deliverer);
		
		$this->db->trans_complete();
	}
}

?>