<?php

class Category_model extends CI_Model {
	
	private $table_category = 'category';
	private $table_posted_item = 'posted_item';
	private $table_brand = 'brand';
	
	// table attribute
	public $id;
	public $category_name;
	public $category_description;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id					= NULL;
		$this->category_name		= "";
		$this->category_description	= "";
		
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->category_name		= $db_item->category_name;
		$this->category_description	= $db_item->category_description;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id					= $this->id;
		$db_item->category_name			= $this->category_name;
		$db_item->category_description	= $this->category_description;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Category_model();
		
		$stub->id					= $db_item->id;
		$stub->category_name		= $db_item->category_name;
		$stub->category_description	= $db_item->category_description;
		
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
	
	// get category detail
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_category, 1);
		$category = $query->row();
		
		return ($category !== null) ? $this->get_stub_from_db($category) : null;
	}
	
	public function get_all()
	{
		// $query = $this->db
					// ->order_by('category_name', 'ASC')
					// ->get($this->table_category);
		$query = $this->db->query(
			" SELECT * " .
			" FROM " . $this->table_category .
			" ORDER BY (CASE WHEN category_name LIKE '%Lainnya%' THEN 1 ELSE 0 END) ASC, category_name ASC");
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_all_with_brand()
	{
		$query = $this->db->query(
			" SELECT DISTINCT *, category.id AS id, brand.id AS brand_id" .
			" FROM " . $this->table_brand . //table_category .
				//" LEFT JOIN " . $this->table_posted_item . " ON category.id = posted_item.category_id " .
				//" LEFT JOIN " . $this->table_brand . " ON posted_item.brand_id = brand.id " .
				" LEFT JOIN " . $this->table_posted_item . " ON brand.id = posted_item.brand_id " .
				" LEFT JOIN " . $this->table_category . " ON posted_item.category_id = category.id " .
			" WHERE item_type = 'ORDER' " .
			" GROUP BY category.id, brand.id " .
			" ORDER BY (CASE WHEN category_name LIKE '%Lainnya%' THEN 1 ELSE 0 END) ASC, category_name ASC,
					   (CASE WHEN brand_name LIKE '%Lainnya%' THEN 1 ELSE 0 END) ASC, brand_name ASC");
		$items = $query->result();
		
		return $items ?? array();
	}
	
	// insert new account from form post
	public function insert_from_post()
	{
		// $this->load->model('Category_model');
		
		$this->category_name		= $this->input->post('category_name');
		$this->category_description	= $this->input->post('category_description');
	
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		if ($this->db->insert($this->table_category, $db_item))
		{	
			$db_item->id = $this->db->insert_id();
			
			$this->db->where('id', $db_item->id);
			$this->db->update($this->table_category, $db_item);
		}
		
		$this->db->trans_complete(); // selesai nge lock db transaction
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