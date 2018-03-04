<?php

class Voucher_model extends CI_Model {
	
	private $table_voucher = 'voucher';
	
	// table attribute
	public $id;
	public $voucher_id;
	public $voucher_worth;
	public $voucher_description;
	public $date_added;
	public $voucher_stock;
	public $voucher_code;
	public $min_order_price;
	public $use_per_day;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id					= NULL;
		$this->voucher_id			= "";
		$this->voucher_worth		= "";
		$this->voucher_description	= "";
		$this->date_added			= "";
		$this->voucher_stock		= "";
		$this->voucher_code			= "";
		$this->min_order_price		= "";
		$this->use_per_day			= "";
		
		$this->load->model('Voucher_brand_model');
		$this->load->model('Brand_model');
		
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->voucher_id			= $db_item->voucher_id;
		$this->voucher_worth		= $db_item->voucher_worth;
		$this->voucher_description	= $db_item->voucher_description;
		$this->date_added			= $db_item->date_added;
		$this->voucher_stock		= $db_item->voucher_stock;
		$this->voucher_code			= $db_item->voucher_code;
		$this->min_order_price		= $db_item->min_order_price;
		$this->use_per_day			= $db_item->use_per_day;
		
		$this->voucher_brand		= new Voucher_brand_model();
		$this->brand				= new Brand_model();
		$this->brand->brand_name	= $db_item->brand_name;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id					= $this->id;
		$db_item->voucher_id			= $this->voucher_id;
		$db_item->voucher_worth			= $this->voucher_worth;
		$db_item->voucher_description	= $this->voucher_description;
		$db_item->date_added			= $this->date_added;
		$db_item->voucher_stock			= $this->voucher_stock;
		$db_item->voucher_code			= $this->voucher_code;
		$db_item->min_order_price		= $this->min_order_price;
		$db_item->use_per_day			= $this->use_per_day;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Voucher_model();
		
		$stub->id					= $db_item->id;
		$stub->voucher_id			= $db_item->voucher_id;
		$stub->voucher_worth		= $db_item->voucher_worth;
		$stub->voucher_description	= $db_item->voucher_description;
		$stub->date_added			= $db_item->date_added;
		$stub->voucher_stock		= $db_item->voucher_stock;
		$stub->voucher_code			= $db_item->voucher_code;
		$stub->min_order_price		= $db_item->min_order_price;
		$stub->use_per_day			= $db_item->use_per_day;
		
		$stub->voucher_brand		= new Voucher_brand_model();
		$stub->brand				= new Brand_model();
		$stub->brand->brand_name	= $db_item->brand_name ?? "";
		
		return $stub;
	}
	
	public function map_list($vouchers)
	{
		$result = array();
		foreach ($vouchers as $voucher)
		{
			$result[] = $this->get_new_stub_from_db($voucher);
		}
		return $result;
	}
	
	// get voucher detail
	public function get_from_id($id)
	{
		$where[$this->table_voucher. '.id'] = $id;
		
		$this->db->join('voucher_brand', 'voucher_brand.voucher_id=' . $this->table_voucher . '.id', 'left');
		$this->db->join('brand', 'brand.id=voucher_brand.brand_id', 'left');
		$this->db->where($where);
		$query = $this->db->get($this->table_voucher, 1);
		$voucher = $query->row();
		
		return ($voucher !== null) ? $this->get_stub_from_db($voucher) : null;
	}
	
	// get voucher detail
	public function get_from_voucher_code($voucher_code)
	{
		$where[$this->table_voucher. '.voucher_code'] = $voucher_code;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_voucher, 1);
		$voucher = $query->row();
		
		return ($voucher !== null) ? $this->get_stub_from_db($voucher) : null;
	}
	
	public function get_all()
	{	
		$this->db->join('voucher_brand', 'voucher_brand.voucher_id=' . $this->table_voucher . '.id', 'left');
		$this->db->join('brand', 'brand.id=voucher_brand.brand_id', 'left');
		$query = $this->db->get($this->table_voucher);
		$vouchers = $query->result();
		
		return ($vouchers !== null) ? $this->map_list($vouchers) : null;
	}
	
	// insert new authorized voucher from form post
	public function insert_from_post()
	{	
		$this->voucher_id			= "";
		$this->voucher_worth		= $this->input->post('voucher_worth');
		$this->voucher_description	= $this->input->post('voucher_description');
		$this->date_added			= date("d-m-Y");
		$this->voucher_stock		= $this->input->post('voucher_stock');
		$this->voucher_code			= $this->input->post('voucher_code');
		$this->min_order_price		= $this->input->post('min_order_price');
		$this->use_per_day			= $this->input->post('use_per_day');
		
		// insert data, then generate [voucher_id] based on [id]
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		if ($this->db->insert($this->table_voucher, $db_item))
		{
			$this->load->library('Id_Generator');
			
			$db_item->id			= $this->db->insert_id();
			$db_item->voucher_id	= $this->id_generator->generate(TYPE['name']['VOUCHER'], $db_item->id);
			
			$this->db->where('id', $db_item->id);
			$this->db->update($this->table_voucher, $db_item);
		}
		$this->load->model('Voucher_brand_model');
		$this->Voucher_brand_model->insert_from_post($db_item->id);
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
}

?>