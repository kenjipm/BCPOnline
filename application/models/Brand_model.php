<?php

class Brand_model extends CI_Model {
	
	// Nama tabel di DB
	private $table_brand = 'brand';
	
	// table attribute
	public $id;
	public $brand_id;
	public $brand_name;
	public $brand_description;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id					= NULL;
		$this->brand_id				= "";
		$this->brand_name			= "";
		$this->brand_description	= "";
		
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->brand_id				= $db_item->brand_id;
		$this->brand_name			= $db_item->brand_name;
		$this->brand_description	= $db_item->brand_description;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id				= $this->id;
		$db_item->brand_id			= $this->brand_id;
		$db_item->brand_name		= $this->brand_name;
		$db_item->brand_description	= $this->brand_description;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Brand_model();
		
		$stub->id					= $db_item->id;
		$stub->brand_id				= $db_item->brand_id;
		$stub->brand_name			= $db_item->brand_name;
		$stub->brand_description	= $db_item->brand_description;
		
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
	
	// get item detail
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_brand, 1);
		$item = $query->row();
		
		return ($item !== null) ? $this->get_stub_from_db($item) : null;
	}
	
	public function get_from_voucher_id($voucher_id)
	{
		$where['voucher_brand.voucher_id'] = $voucher_id;
		
		$this->db->where($where);
		$this->db->join('voucher_brand', 'voucher_brand.brand_id=' . $this->table_brand . '.id', 'left');
		$query = $this->db
					->order_by('brand_name', 'ASC')
					->get($this->table_brand);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_all()
	{
		$query = $this->db
					->order_by('brand_name', 'ASC')
					->get($this->table_brand);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	// insert new account from form post
	public function insert_from_post()
	{
		$this->load->model('Tenant_model');
		$cur_tenant = $this->Tenant_model->get_by_account_id($this->session->userdata('id'));
		
		$this->brand_id				= "";
		$this->brand_name			= $this->input->post('brand_name');
		$this->brand_description	= $this->input->post('brand_description');
	
		
		// insert data, then generate [account_id] based on [id]
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		if ($this->db->insert($this->table_brand, $db_item))
		{
			$this->load->library('Id_generator');
			
			$db_item->id				= $this->db->insert_id();
			$db_item->brand_id	= $this->id_generator->generate(TYPE['name']['BRAND'], $db_item->id);
			
			$this->db->where('id', $db_item->id);
			$this->db->update($this->table_brand, $db_item);
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