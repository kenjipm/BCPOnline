<?php

class Bidding_model extends CI_Model {
	
	private $table_bidding = 'bidding';
	
	// table attribute
	public $id;
	public $bid_time;
	public $bid_price;
	public $customer_id;
	public $posted_item_id;
	
	//table relation
	public $posted_item;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id				= NULL;
		$this->bid_time			= date("Y-m-d H:i:s");
		$this->bid_price		= 0;
		$this->customer_id		= NULL;
		$this->posted_item_id	= NULL;
		
		$this->load->model('Customer_model');
		$this->load->model('Account_model');
		$this->load->model('Item_model');
		
		$this->posted_item	= new Item_model();
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id				= $db_item->id;
		$this->bid_time			= $db_item->bid_time;
		$this->bid_price		= $db_item->bid_price;
		$this->customer_id		= $db_item->customer_id;
		$this->posted_item_id	= $db_item->posted_item_id;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id				= $this->id;
		$db_item->bid_time			= $this->bid_time;
		$db_item->bid_price			= $this->bid_price;
		$db_item->customer_id		= $this->customer_id;
		$db_item->posted_item_id	= $this->posted_item_id;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new bidding_model();
		
		$stub->id				= $db_item->id;
		$stub->bid_time			= $db_item->bid_time;
		$stub->bid_price		= $db_item->bid_price;
		$stub->customer_id		= $db_item->customer_id;
		$stub->posted_item_id	= $db_item->posted_item_id;
		
		$stub->customer					= new Customer_model();
		$stub->customer->account		= new Account_model();
		$stub->customer->account->name 	= $db_item->name ?? "";
		
		$stub->posted_item 						= new Item_model();
		$stub->posted_item->posted_item_name	= $db_item->posted_item_name ?? "";
		
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
	
	// get bidding detail
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_bidding, 1);
		$bidding = $query->row();
		
		return ($bidding !== null) ? $this->get_stub_from_db($bidding) : null;
	}
	
	// get bidding detail
	public function get_from_customer_id_and_item_id($customer_id, $posted_item_id)
	{
		$where['customer_id'] = $customer_id;
		$where['posted_item_id'] = $posted_item_id;
		
		$this->db->where($where);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get($this->table_bidding, 1);
		$bidding = $query->row();
		
		return ($bidding !== null) ? $this->get_stub_from_db($bidding) : null;
	}
	
	public function get_all()
	{
		$query = $this->db->get($this->table_bidding);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
	
	public function get_all_from_posted_item_id($posted_item_id)
	{
		$where['posted_item_id'] = $posted_item_id;
		
		$this->db->select('*, ' . $this->table_bidding.'.id AS id, customer.id AS customer_id, account.id AS account_id');
		$this->db->join('customer', 'customer.id=' . $this->table_bidding . '.customer_id', 'left');
		$this->db->join('account', 'account.id=customer.account_id', 'left');
		$this->db->where($where);
		$this->db->order_by("bid_price", "asc");
		$query = $this->db->get($this->table_bidding);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
	
	// insert new account from form post
	public function insert_from_stub()
	{
		//$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		
		$this->db->insert($this->table_bidding, $db_item);
		return $this->db->insert_id();
		
		//$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function init_posted_item()
	{
		$this->posted_item = $this->posted_item->get_from_id($this->posted_item_id);
		return $this->posted_item;
	}
	
	/*
	public function get_type()
	{
		$this->db->where('account_id', $this->id);
		foreach($this::TYPE_MODEL as $type => $model)
		{
			$this->load->model($model);
			$item = $this->{$model}->get_by_account_id($this->id);
			
			if ($item !== null)
			{
				return $type;
			}
		}
	}
	*/
}

?>