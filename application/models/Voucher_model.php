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
	public $brand_id;
	public $voucher_code;
	
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
		$this->brand_id				= "";
		$this->voucher_code			= "";
		
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
		$this->brand_id				= $db_item->brand_id;
		$this->voucher_code			= $db_item->voucher_code;
		
		$this->brand				= $this->load->model('Brand_model');
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
		$db_item->brand_id				= $this->brand_id;
		$db_item->voucher_code			= $this->voucher_code;
		
		return $db_item;
	}
	
	public function map_list($vouchers)
	{
		$result = array();
		foreach ($vouchers as $voucher)
		{
			$result[] = $this->get_stub_from_db($voucher);
		}
		return $result;
	}
	
	// get voucher detail
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_voucher, 1);
		$voucher = $query->row();
		
		return ($voucher !== null) ? $this->get_stub_from_db($voucher) : null;
	}
	
	public function get_all()
	{	
		$this->db->join('brand', 'brand.id=' . $this->table_voucher . '.brand_id', 'left');
		$query = $this->db->get($this->table_voucher, 1);
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
		$this->brand_id				= $this->input->post('brand_id');
		$this->voucher_code			= $this->input->post('voucher_code');
	
		
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
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}

}

?>