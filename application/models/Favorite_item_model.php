<?php

class Favorite_item_model extends CI_Model {
	
	private $table_favorite_item = 'favorite_item';
	
	// table attribute
	public $id;
	public $customer_id;
	public $posted_item_id;
	
	// relation table
	public $customer;
	public $posted_item;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id				= NULL;
		$this->customer_id		= 0;
		$this->posted_item_id	= 0;
		
		$this->load->model('customer_model');
		$this->load->model('item_model');
		
		$this->customer = new customer_model();
		$this->posted_item = new item_model();
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id				= $db_item->id;
		$this->customer_id		= $db_item->customer_id;
		$this->posted_item_id	= $db_item->posted_item_id;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id				= $this->id;
		$db_item->customer_id		= $this->customer_id;
		$db_item->posted_item_id	= $this->posted_item_id;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Favorite_item_model();
		
		$stub->id				= $db_item->id;
		$stub->customer_id		= $db_item->customer_id;
		$stub->posted_item_id	= $db_item->posted_item_id;
		
		return $stub;
	}
	
	public function map_list($items)
	{
		$result = array();
		foreach ($items as $item)
		{
			$result[] = $this->get_new_stub_from_db($item);
		}
		return $result;
	}
	
	// get item_tag detail
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_favorite_item, 1);
		$favorite_item = $query->row();
		
		return ($favorite_item !== null) ? $this->get_stub_from_db($favorite_item) : null;
	}
	
	public function get_all()
	{
		$query = $this->db->get($this->table_favorite_item);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
	
	// get item detail
	public function get_all_from_customer_id($customer_id, $limit=10, $offset=0)
	{
		$where['customer_id'] = $customer_id;
		
		$query = $this->db
					  ->where($where)
					  ->order_by($this->table_favorite_item.'.id', 'DESC')
					  ->get($this->table_favorite_item, $limit??"", $limit?$offset:""); // kalau ga ada limit, jgn taro offset nya
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
	
	public function is_favorite($customer_id, $posted_item_id)
	{
		$where['customer_id'] = $customer_id;
		$where['posted_item_id'] = $posted_item_id;
		
		$query = $this->db
					  ->where($where)
					  ->get($this->table_favorite_item, 1);
					  
		$item = $query->row();
		return ($item != null) ? $item->id : false;
	}
	
	public function toggle_item_favorite($customer_id, $posted_item_id)
	{
		$id = $this->is_favorite($customer_id, $posted_item_id);
		
		if ($id == null) // kalau ga ada, insert new
		{
			$this->insert($customer_id, $posted_item_id);
			return $this->id;
		}
		else // kalau ada, hapus
		{
			$this->db->where('id', $id);
			$this->db->delete($this->table_favorite_item);
			
			return false;
		}
	}
	
	public function init_customer()
	{
		$this->customer = $this->customer->get_from_id($this->customer_id);
		return $this->customer;
	}
	
	public function init_posted_item()
	{
		$this->posted_item = $this->posted_item->get_from_id($this->posted_item_id);
		return $this->posted_item;
	}
	
	public function insert($customer_id, $posted_item_id)
	{
		$this->customer_id		= $customer_id;
		$this->posted_item_id	= $posted_item_id;
		
		$item = $this->get_db_from_stub();
		
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		if ($this->db->insert($this->table_favorite_item, $item))
		{
			$this->id	= $this->db->insert_id();
		}
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
}

?>