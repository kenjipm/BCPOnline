<?php

class Following_tenant_model extends CI_Model {
	
	private $table_following_tenant = 'following_tenant';

	// table attribute
	public $id;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id		= 0;
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id						= $db_item->id;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id						= $this->id;
		
		return $db_item;
	}
	
	public function map_list($items)
	{
		$result = array();
		foreach ($items as $item)
		{
			$result[] = $this->get_stub_from_db($item);
		}
		return $result;
	}
	
	// get item detail
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_item, 1);
		$item = $query->row();
		
		return ($item !== null) ? $this->get_stub_from_db($item) : null;
	}
	
	public function get_all()
	{
		$query = $this->db->get($this->table_item);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
	
}

?>