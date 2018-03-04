<?php

class Voucher_brand_model extends CI_Model {
	
	private $table_voucher_brand = 'voucher_brand';
	
	// table attribute
	public $id;
	public $voucher_id;
	public $brand_id;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id			= NULL;
		$this->voucher_id	= "";
		$this->brand_id		= "";
		
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id			= $db_item->id;
		$this->voucher_id	= $db_item->voucher_id;
		$this->brand_id		= $db_item->brand_id;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id			= $this->id;
		$db_item->voucher_id	= $this->voucher_id;
		$db_item->brand_id		= $this->brand_id;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new voucher_brand_model();
		
		$stub->id			= $db_item->id;
		$stub->voucher_id	= $db_item->voucher_id;
		$stub->brand_id		= $db_item->brand_id;
		
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
	
	// get voucher_brand detail
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_voucher_brand, 1);
		$items = $query->row();
		
		return ($items !== null) ? $this->get_stub_from_db($items) : null;
	}
	
	public function get_all()
	{
		$query = $this->db->get($this->table_voucher_brand);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_all_from_voucher_id($voucher_id)
	{
		$where[$this->table_voucher_brand. '.voucher_id'] = $voucher_id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_voucher_brand);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	// insert new account from form post
	public function insert_from_post($voucher_id)
	{	
		$this->voucher_id = $voucher_id;
		$brand_list = $this->input->post('brand_list[]');
	
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		foreach($brand_list as $brand)
		{
			$this->brand_id = $brand;
		
			$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
			if ($this->db->insert($this->table_voucher_brand, $db_item))
			{	
				$this->load->library('Id_Generator');
				
				$db_item->id = $this->db->insert_id();
				
				$this->db->where('id', $db_item->id);
				$this->db->update($this->table_voucher_brand, $db_item);
			}
		}
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
}

?>