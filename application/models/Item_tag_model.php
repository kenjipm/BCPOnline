<?php

class Item_tag_model extends CI_Model {
	
	private $table_item_tag = 'item_tag';
	
	// table attribute
	public $id;
	public $tag_id;
	public $posted_item_id;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id				= NULL;
		$this->tag_id			= "";
		$this->posted_item_id	= "";
		
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id				= $db_item->id;
		$this->tag_id			= $db_item->tag_id;
		$this->posted_item_id	= $db_item->posted_item_id;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id				= $this->id;
		$db_item->tag_id			= $this->tag_id;
		$db_item->posted_item_id	= $this->posted_item_id;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Item_tag_model();
		
		$stub->id				= $db_item->id;
		$stub->tag_id			= $db_item->tag_id;
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
		$query = $this->db->get($this->table_item_tag, 1);
		$item_tag = $query->row();
		
		return ($item_tag !== null) ? $this->get_stub_from_db($item_tag) : null;
	}
	
	public function get_all()
	{
		$query = $this->db->get($this->table_item_tag);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	// insert new account from form post
	public function insert_from_post($posted_item_id, $tag_id)
	{
		$this->load->model('Item_tag_model');
		
		$this->tag_id			= $tag_id;
		$this->posted_item_id	= $posted_item_id;
	
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		if ($this->db->insert($this->table_item_tag, $db_item))
		{	
			$db_item->id = $this->db->insert_id();
			
			$this->db->where('id', $db_item->id);
			$this->db->update($this->table_item_tag, $db_item);
		}
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
}

?>