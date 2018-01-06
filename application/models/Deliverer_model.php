<?php

class Deliverer_model extends CI_Model {
	
	private $table_default = 'deliverer';
	private $table_deliverer = 'deliverer';
	private $table_order_details = 'order_details';
	
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
		
		$this->load->model('Account_model');
		$this->account = new Account_model();
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id				= $db_item->id;
		$this->deliverer_id		= $db_item->deliverer_id;
		$this->account_id		= $db_item->account_id;
		$this->license_plate	= $db_item->license_plate;
		$this->vehicle_desc		= $db_item->vehicle_desc;
		
		$this->account				= $this->load->model('Account_model');
		$this->account->name		= $db_item->name;
		$this->account->email		= $db_item->email;
		$this->account->status		= $db_item->status;
		$this->account->date_joined = $db_item->date_joined;
		
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
		$stub = new Deliverer_model();
		
		$stub->id				= $db_item->id;
		$stub->deliverer_id		= $db_item->deliverer_id;
		$stub->account_id		= $db_item->account_id;
		$stub->license_plate	= $db_item->license_plate;
		$stub->vehicle_desc		= $db_item->vehicle_desc;
		
		$stub->account				= new Account_model();
		$stub->account->id			= $db_item->id;
		$stub->account->name		= $db_item->name;
		$stub->account->email		= $db_item->email;
		$stub->account->status		= $db_item->status;
		$stub->account->date_joined = $db_item->date_joined;
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
		
		$this->db->join('account', 'account.id=' . $this->table_deliverer . '.account_id', 'left');	
		
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
	
	public function get_idle_deliverer()
	{	
		// Get Busy Deliverer dulu
		$this->db->select('deliverer.id AS id');
		$this->db->join($this->table_order_details, $this->table_order_details. '.deliverer_id=deliverer.id', 'left');
		$this->db->where($this->table_order_details. '.deliverer_id is NOT NULL');
		$this->db->where($this->table_order_details. '.order_status !=', ORDER_STATUS['name']['RECEIVED']); // Dummy
		
		$query = $this->db->get('deliverer');
		$items = $query->result();
		//print_r($items);
		$deliverers = array();
		
		// Masukin Array ID Deliverer yg busy
		if ($items)
		{
			foreach($items as $item)
			{
				$deliverers[] = $item->id;
			}
		}
		//print_r($deliverers);
		
		// Baru di-not_in buat nyari idle nya
		$this->db->select('*, deliverer.id AS id');
		$this->db->join('account', 'account.id=deliverer.account_id', 'left');
		if (count($deliverers) > 0)
			$this->db->where_not_in('deliverer.id', $deliverers);
		$query = $this->db->get('deliverer');
		$items = $query->result();		
		//print_r($items);
		
		return ($items !== null) ? $this->map_list($items) : null;
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