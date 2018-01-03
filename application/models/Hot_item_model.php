<?php

class Hot_item_model extends CI_Model {
	
	private $table_hot_item = 'hot_item';
	private $table_item = 'posted_item';
	
	// table attribute
	public $id;
	public $hot_item_id;
	public $promo_price;
	public $promo_description;
	public $posted_item_id;
	
	public $posted_item;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id						= 0;
		$this->hot_item_id				= "";
		$this->promo_price				= 0;
		$this->promo_description		= "";
		$this->posted_item_id			= 0;
		
		// $this->load->model('item_model');
		// $this->posted_item				= new item_model();
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id						= $db_item->id;
		$this->hot_item_id				= $db_item->hot_item_id;
		$this->promo_price				= $db_item->promo_price;
		$this->promo_description		= $db_item->promo_description;
		$this->posted_item_id			= $db_item->posted_item_id;
		
		$this->posted_item->posted_item_name	= $db_item->posted_item_name ?? "";
		$this->posted_item->price				= $db_item->price ?? "";
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id					= $this->id;
		$db_item->hot_item_id			= $this->hot_item_id;
		$db_item->promo_price			= $this->promo_price;
		$db_item->promo_description		= $this->promo_description;
		$db_item->posted_item_id		= $this->posted_item_id;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Hot_item_model();
		
		$stub->id						= $db_item->id;
		$stub->hot_item_id				= $db_item->hot_item_id;
		$stub->promo_price				= $db_item->promo_price;
		$stub->promo_description		= $db_item->promo_description;
		$stub->posted_item_id			= $db_item->posted_item_id;
		
		$stub->posted_item->posted_item_name	= $db_item->posted_item_name ?? "";
		$stub->posted_item->price				= $db_item->price ?? "";
		
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
	
	public function get_all($limit=10, $offset=0)
	{
		$this->db->join($this->table_item, $this->table_hot_item.'.posted_item_id' . ' = ' . $this->table_item.'.id', 'left');
		$query = $this->db
					  ->order_by($this->table_hot_item.'.id', 'DESC')
					  ->get($this->table_hot_item, $limit??"", $limit?$offset:""); // kalau ga ada limit, jgn taro offset nya
		
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
}

?>