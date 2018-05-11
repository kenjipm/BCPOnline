<?php

class Voucher_model extends CI_Model {
	
	private $table_voucher = 'voucher';
	
	// table attribute
	public $id;
	public $voucher_id;
	public $voucher_worth;
	public $voucher_description;
	public $date_added;
	public $date_expired;
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
		$this->date_added			= date("Y-m-d H:i:s", time());
		$this->date_expired			= "";
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
		$this->date_expired			= $db_item->date_expired;
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
		$db_item->date_expired			= $this->date_expired;
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
		$stub->date_expired			= $db_item->date_expired;
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
		
		$this->db->select('*, '.$this->table_voucher.'.id AS id');
		$this->db->join('voucher_brand', 'voucher_brand.voucher_id=' . $this->table_voucher . '.id', 'left');
		$this->db->join('brand', 'brand.id=voucher_brand.brand_id', 'left');
		$this->db->where($where);
		$query = $this->db->get($this->table_voucher, 1);
		$voucher = $query->row();
		
		return ($voucher !== null) ? $this->get_stub_from_db($voucher) : null;
	}
	
	public function get_all()
	{	
		
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
		$this->date_expired			= $this->input->post('date_expired');
		$this->voucher_stock		= $this->input->post('voucher_stock');
		$this->voucher_code			= $this->input->post('voucher_code');
		$this->min_order_price		= $this->input->post('min_order_price');
		$this->use_per_day			= $this->input->post('use_per_day');
		
		// insert data, then generate [voucher_id] based on [id]
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		if ($this->db->insert($this->table_voucher, $db_item))
		{
			$this->load->library('Id_generator');
			
			$db_item->id			= $this->db->insert_id();
			$db_item->voucher_id	= $this->id_generator->generate(TYPE['name']['VOUCHER'], $db_item->id);
			
			$this->db->where('id', $db_item->id);
			$this->db->update($this->table_voucher, $db_item);
		}
		$this->load->model('Voucher_brand_model');
		$this->Voucher_brand_model->insert_from_post($db_item->id);
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function is_ready_stock()
	{
		return $this->voucher_stock != 0;
	}
	
	public function is_expired()
	{
		return (time() > strtotime($this->date_expired));
	}
	
	public function is_usable_this_day($total_used_today)
	{
		return $total_used_today < $this->use_per_day;
	}
	
	public function is_order_sufficient($total_order)
	{
		return $total_order >= $this->min_order_price;
	}
	
	public function get_first_item_id_from_voucher_code($voucher_code)
	{
		if ($voucher_code)
		{
			$voucher = $this->get_from_voucher_code($voucher_code);
			
			if ($voucher)
			{
				if ($voucher->is_expired()) { return -1; }
				if (!$voucher->is_ready_stock()) { return -2; }
				
				$this->load->model('order_details_model');
				$cur_vouchered_order_list = $this->order_details_model->get_all_from_customer_id_and_voucher_id_and_date($this->session->child_id, $voucher->id, date_create());
				if (!$voucher->is_usable_this_day(count($cur_vouchered_order_list))) { return -3; }
				
				$this->load->model('posted_item_variance_model');
				$this->load->model('voucher_brand_model');
				$voucher_brands = $this->voucher_brand_model->get_all_from_voucher_id($voucher->id);
				$cart = $this->session->cart;
				$total_order = 0;
				foreach ($cart as $id => $cart_item)
				{
					$posted_item_variance = $this->posted_item_variance_model->get_from_id($id);
					$posted_item_variance->init_posted_item();
					
					foreach ($voucher_brands as $voucher_brand)
					{
						if ($voucher_brand->brand_id == $posted_item_variance->posted_item->brand_id)
						{
							$total_order += $cart_item['quantity'] * $cart_item['price'];
						}
					}
				}
				if (!$voucher->is_order_sufficient($total_order)) { return -4; }
				
				foreach ($cart as $id => $cart_item)
				{
					$posted_item_variance = $this->posted_item_variance_model->get_from_id($id);
					$posted_item_variance->init_posted_item();
					
					foreach ($voucher_brands as $voucher_brand)
					{
						if ($voucher_brand->brand_id == $posted_item_variance->posted_item->brand_id)
						{
							return $id;
						}
					}
				}
			}
		}
		
		return 0;
	}
	
	public function quantity_sub($value)
	{
		$this->db->where('id', $this->id);
		$this->db->set('voucher_stock', 'voucher_stock - ' . $value, false);
		$this->db->update($this->table_voucher);
		
		return $this;
	}
}

?>