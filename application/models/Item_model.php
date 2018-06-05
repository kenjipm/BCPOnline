<?php

class Item_model extends CI_Model {
	
	private $table_item = 'posted_item';
	private $table_item_variance = 'posted_item_variance';
	private $table_category = 'category';
	private $table_tenant_bill = 'tenant_bill';
	private $table_order_details = 'order_details';
	private $table_feedback = 'feedback';
	
	// table attribute
	public $id;
	public $posted_item_id;
	public $posted_item_name;
	public $price;
	public $date_posted;
	public $date_updated;
	public $date_expired;
	public $bidding_max_range;
	public $item_type;
	public $unit_weight;
	public $posted_item_description;
	public $image_one_name;
	public $image_two_name;
	public $image_three_name;
	public $image_four_name;
	public $category_id;
	public $tenant_id;
	public $brand_id;
	public $is_confirmed;
	
	// relation table
	public $category;
	public $brand;
	public $tenant;
	
	// stub attribute
	public $quantity_available;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id						= NULL;
		$this->posted_item_id			= "";
		$this->posted_item_name			= "";
		$this->price					= "";
		$this->date_posted				= "";
		$this->date_updated				= "";
		$this->date_expired				= "";
		$this->bidding_max_range		= "";
		$this->item_type				= "";
		$this->unit_weight				= "";
		$this->posted_item_description	= "";
		$this->image_one_name			= DEFAULT_ITEM_IMAGE;
		$this->category_id				= "";
		$this->tenant_id				= "";
		$this->brand_id					= "";
		$this->is_confirmed				= 0;
		
		$this->quantity_available		= "";
		
		// $this->load->model('Category_model');
		$this->load->model('Brand_model');
		$this->load->model('Tenant_model');
		
		$this->category					= new Category_model();
		$this->brand					= new Brand_model();
		$this->tenant					= new Tenant_model();
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id						= $db_item->id;
		$this->posted_item_id			= $db_item->posted_item_id;
		$this->posted_item_name			= $db_item->posted_item_name;
		$this->price					= $db_item->price;
		$this->date_posted				= $db_item->date_posted;
		$this->date_updated				= $db_item->date_updated;
		$this->date_expired				= $db_item->date_expired;
		$this->bidding_max_range		= $db_item->bidding_max_range;
		$this->item_type				= $db_item->item_type;
		$this->unit_weight				= $db_item->unit_weight;
		$this->posted_item_description	= $db_item->posted_item_description;
		$this->image_one_name			= $db_item->image_one_name;
		$this->category_id				= $db_item->category_id;
		$this->tenant_id				= $db_item->tenant_id;
		$this->brand_id					= $db_item->brand_id;
		$this->is_confirmed					= $db_item->is_confirmed;
		
		$this->category->category_name	= $db_item->category_name ?? "";
		$this->brand->brand_name		= $db_item->brand_name ?? "";
		$this->tenant->tenant_name		= $db_item->tenant_name ?? "";
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id						= $this->id;
		$db_item->posted_item_id			= $this->posted_item_id;
		$db_item->posted_item_name			= $this->posted_item_name;
		$db_item->price						= $this->price;
		$db_item->date_posted				= $this->date_posted;
		$db_item->date_updated				= $this->date_updated;
		$db_item->date_expired				= $this->date_expired;
		$db_item->bidding_max_range			= $this->bidding_max_range;
		$db_item->item_type					= $this->item_type;
		$db_item->unit_weight				= $this->unit_weight;
		$db_item->posted_item_description	= $this->posted_item_description;
		$db_item->image_one_name			= $this->image_one_name;
		$db_item->category_id				= $this->category_id;
		$db_item->tenant_id					= $this->tenant_id;
		$db_item->brand_id					= $this->brand_id;
		$db_item->is_confirmed					= $this->is_confirmed;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Item_model();
		
		$stub->id						= $db_item->id;
		$stub->posted_item_id			= $db_item->posted_item_id;
		$stub->posted_item_name			= $db_item->posted_item_name;
		$stub->price					= $db_item->price;
		$stub->date_posted				= $db_item->date_posted;
		$stub->date_updated				= $db_item->date_updated;
		$stub->date_expired				= $db_item->date_expired;
		$stub->bidding_max_range		= $db_item->bidding_max_range;
		$stub->item_type				= $db_item->item_type;
		$stub->unit_weight				= $db_item->unit_weight;
		$stub->posted_item_description	= $db_item->posted_item_description;
		$stub->image_one_name			= $db_item->image_one_name;
		$stub->category_id				= $db_item->category_id;
		$stub->tenant_id				= $db_item->tenant_id;
		$stub->brand_id					= $db_item->brand_id;
		$stub->is_confirmed					= $db_item->is_confirmed;
		
		$stub->category->category_name	= $db_item->category_name ?? "";
		$stub->brand->brand_name		= $db_item->brand_name ?? "";
		$stub->tenant->tenant_name		= $db_item->tenant_name ?? "";
		
		return $stub;
	}
	
	// new stub object from database object
	public function get_new_bidding_stub_from_db($db_item)
	{
		$stub = new Item_model();
		
		$stub->id						= $db_item->id;
		$stub->posted_item_id			= $db_item->posted_item_id;
		$stub->posted_item_name			= $db_item->posted_item_name;
		$stub->price					= $db_item->price;
		$stub->date_posted				= $db_item->date_posted;
		$stub->date_updated				= $db_item->date_updated;
		$stub->date_expired				= $db_item->date_expired;
		$stub->bidding_max_range		= $db_item->bidding_max_range;
		$stub->item_type				= $db_item->item_type;
		$stub->unit_weight				= $db_item->unit_weight;
		$stub->posted_item_description	= $db_item->posted_item_description;
		$stub->image_one_name			= $db_item->image_one_name;
		$stub->category_id				= $db_item->category_id;
		$stub->tenant_id				= $db_item->tenant_id;
		$stub->brand_id					= $db_item->brand_id;
		$stub->is_confirmed				= $db_item->is_confirmed;
		
		$stub->var_type					= $db_item->var_type;
		$stub->var_description			= $db_item->var_description;
		
		$stub->category->category_name	= $db_item->category_name ?? "";
		$stub->brand->brand_name		= $db_item->brand_name ?? "";
		$stub->tenant->tenant_name		= $db_item->tenant_name ?? "";
		
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
		$where['posted_item.id'] = $id;
		
		$this->db->select('*, ' . $this->table_item.'.id AS id, ' . $this->table_item.'.brand_id AS brand_id, '. $this->table_item. '.tenant_id AS tenant_id');
		$this->db->join('category', 'category.id=' . $this->table_item . '.category_id', 'left');
		$this->db->join('brand', 'brand.id=' . $this->table_item . '.brand_id', 'left');
		$this->db->join('tenant', 'tenant.id=' . $this->table_item . '.tenant_id', 'left');
		$this->db->where($where);
		$query = $this->db->get($this->table_item, 1);
		$item = $query->row();
		
		return ($item !== null) ? $this->get_stub_from_db($item) : null;
	}
	
	public function get_all()
	{
		$this->db->where('tenant_id', $this->session->child_id);
		$query = $this->db->get($this->table_item);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_all_for_admin($limit=9, $offset=0)
	{
		$this->db->select('*, ' . $this->table_item.'.id AS id, ' . $this->table_item. '.tenant_id AS tenant_id');
		$this->db->join('tenant', 'tenant.id=' . $this->table_item . '.tenant_id', 'left');
		$query = $this->db->order_by($this->table_item. '.tenant_id', 'DESC')
						  ->get($this->table_item, $limit??"", $limit?$offset:"");
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
	
	public function get_all_bidding_items()
	{
		$this->db->where('item_type', 'BID');
		$query = $this->db->get($this->table_item);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_all_service_items()
	{
		$this->db->where('item_type', 'REPAIR');
		$query = $this->db->get($this->table_item);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_all_promoted_from_category_id($category_id, $offset=0, $limit=6)
	{
		$query = $this->db
					  ->select('*, ' . $this->table_item.'.id AS id')
					  ->join($this->table_item_variance, $this->table_item.'.id' . ' = ' . $this->table_item_variance.'.posted_item_id', 'left')
					  ->join($this->table_tenant_bill, $this->table_item.'.id' . ' = ' . $this->table_tenant_bill.'.posted_item_id', 'left')
					  ->where($this->table_item_variance.'.quantity_available > 0')
					  ->where($this->table_tenant_bill.'.payment_date > 0')
					  ->where($this->table_tenant_bill.'.payment_expiration < CURDATE()')
					  ->where('category_id', $category_id)
					  // ->where('item_type', 'ORDER')
					  ->group_by($this->table_item.'.id')
					  ->distinct()
					  ->order_by('id', 'RANDOM')
					  //->join($this->table_category, $this->table_category.'.id' . ' = ' . $this->table_item.'.category_id', 'left');
					  ->get($this->table_item, $limit??"", $limit?$offset:"");
					  
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_related_items($item)
	{
		return $this->get_all_from_category_id($item->category_id, 1, 10);
	}
	
	public function get_all_from_category_id($category_id, $offset=0, $limit=16, $order="RANDOM")
	{
		$query = $this->db
					  ->select('*, ' . $this->table_item.'.id AS id')
					  ->join($this->table_item_variance, $this->table_item.'.id' . ' = ' . $this->table_item_variance.'.posted_item_id', 'left')
					  ->where($this->table_item_variance.'.quantity_available > 0')
					  ->where('category_id', $category_id)
					  // ->where('item_type', 'ORDER')
					  ->group_by($this->table_item.'.id')
					  ->distinct()
					  ->order_by($this->table_item.'.id', $order)
					  //->join($this->table_category, $this->table_category.'.id' . ' = ' . $this->table_item.'.category_id', 'left');
					  ->get($this->table_item, $limit??"", $limit?$offset:"");
					  
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function count_from_category_id($category_id)
	{
		$query = $this->db
					  ->select('*, ' . $this->table_item.'.id AS id')
					  ->join($this->table_item_variance, $this->table_item.'.id' . ' = ' . $this->table_item_variance.'.posted_item_id', 'left')
					  ->where($this->table_item_variance.'.quantity_available > 0')
					  ->where('category_id', $category_id)
					  ->group_by($this->table_item.'.id')
					  ->distinct()
					  ->get($this->table_item);
					  
		$num_rows = $query->num_rows();
		
		return $num_rows;
	}
	
	public function get_all_from_following_tenants($following_tenants, $offset=0, $limit=10)
	{
		$this->db->or_group_start();
		$this->db->where('0', "1");
		foreach ($following_tenants as $following_tenant)
		{
			$this->db->or_where('tenant_id', $following_tenant->tenant_id);
			$this->db->where('item_type', "ORDER");
		}
		$this->db->group_end();
		$query = $this->db
					  ->select('*, ' . $this->table_item.'.id AS id')
					  ->join($this->table_item_variance, $this->table_item.'.id' . ' = ' . $this->table_item_variance.'.posted_item_id', 'left')
					  ->where($this->table_item_variance.'.quantity_available > 0')
					  ->group_by($this->table_item.'.id')
					  ->distinct()
					  ->order_by($this->table_item.'.id', 'DESC')
					  ->get($this->table_item, $limit??"", $limit?$offset:"");
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_all_from_tenant_id($tenant_id, $limit=99)
	{
		$this->db->where('tenant_id', $tenant_id);
		$query = $this->db
					  ->order_by('id', 'DESC')
					  ->get($this->table_item, $limit);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_all_promoted_from_search($keywords, $offset=0, $limit=4)
	{
		$this->db->select('*, ' . $this->table_item.'.id AS id');
		$this->db->join($this->table_item_variance, $this->table_item.'.id' . ' = ' . $this->table_item_variance.'.posted_item_id', 'left');
		$this->db->join($this->table_tenant_bill, $this->table_item.'.id' . ' = ' . $this->table_tenant_bill.'.posted_item_id', 'left');
		$this->db->where($this->table_item_variance.'.quantity_available > 0');
		$this->db->where($this->table_tenant_bill.'.payment_date > 0');
		$this->db->where($this->table_tenant_bill.'.payment_expiration < CURDATE()');
		$this->db->like('posted_item_name', $keywords);
		$this->db->group_by($this->table_item.'.id');
		$this->db->distinct();
		$this->db->order_by('id', 'RANDOM');
		// foreach (explode(" ", $keywords) as $keyword) // untuk search per word
		// {
			// $this->db->or_like('name', $keyword);
		// }
		$query = $this->db->get($this->table_item, $limit??"", $limit?$offset:"");
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_from_search($keywords, $offset=0, $limit=20, $order="RANDOM")
	{
		$this->db->select('*, ' . $this->table_item.'.id AS id');
		$this->db->join($this->table_item_variance, $this->table_item.'.id' . ' = ' . $this->table_item_variance.'.posted_item_id', 'left');
		$this->db->where($this->table_item_variance.'.quantity_available > 0');
		$this->db->like('posted_item_name', $keywords);
		$this->db->group_by($this->table_item.'.id');
		$this->db->distinct();
		$this->db->order_by($this->table_item.'.id', $order);
		// foreach (explode(" ", $keywords) as $keyword) // untuk search per word
		// {
			// $this->db->or_like('name', $keyword);
		// }
		$query = $this->db->get($this->table_item, $limit??"", $limit?$offset:"");
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function count_from_search($keywords)
	{
		$this->db->select($this->table_item.'.id');
		$this->db->join($this->table_item_variance, $this->table_item.'.id' . ' = ' . $this->table_item_variance.'.posted_item_id', 'left');
		$this->db->where($this->table_item_variance.'.quantity_available > 0');
		$this->db->like('posted_item_name', $keywords);
		$this->db->group_by($this->table_item.'.id');
		$this->db->distinct();
		
		$query = $this->db->get($this->table_item);
		$num_rows = $query->num_rows();
		
		return $num_rows;
	}
	
	public function get_last_bidding_item()
	{
		$this->db->where('item_type', "BID");
		$this->db->where('date_expired > ', date("Y-m-d H:i:s"));
		$this->db->where('is_confirmed', 1);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get($this->table_item, 1);
		$item = $query->row();
		
		return ($item !== null) ? $this->get_stub_from_db($item) : null;
	}
	
	public function get_unconfirmed_bidding_item()
	{
		$this->db->select('*, ' . $this->table_item.'.id AS id');
		$this->db->join($this->table_item_variance, $this->table_item.'.id' . ' = ' . $this->table_item_variance.'.posted_item_id', 'left');
		$this->db->where('item_type', "BID");
		$this->db->where('date_expired > ', date("Y-m-d H:i:s"));
		$this->db->where('is_confirmed', 0);
		$this->db->order_by($this->table_item.'.id', 'DESC');
		$query = $this->db->get($this->table_item, 1);
		$item = $query->row();
		
		return ($item !== null) ? $this->get_new_bidding_stub_from_db($item) : null;
	}
	
	public function get_bid_time_left()
	{
		return strtotime($this->date_expired) - time();
	}
	
	public function is_expired()
	{
		return (time() > strtotime($this->date_expired));
	}
	
	public function is_bid_price_valid($value)
	{
		$bid_step = $this->bidding_max_range / 10;
		return ($value <= ($this->price + $this->bidding_max_range)) && // bid lebih kecil dari max price available nya
			   ($value >= ($this->price + $bid_step)) && // bid lebih besar dari harga awalnya
			   (($value - $this->price) % $bid_step == 0); // bid kelipatan step nya
	}
	
	public function is_bid_live_price_valid($value)
	{
		$bid_step = $this->bidding_max_range;
		return ($value >= ($this->price + $bid_step)) && // bid lebih besar dari harga awalnya
			   (($value - $this->price) % $bid_step == 0); // bid kelipatan step nya
	}
	
	public function is_can_bid_this_session($last_bid_time)
	{
		return ($last_bid_time == null) || (strtotime($last_bid_time) < strtotime($this->date_updated));
	}
	
	// insert new item from form post
	public function insert_from_post()
	{
		$this->load->model('Tenant_model');
		$cur_tenant = $this->Tenant_model->get_by_account_id($this->session->userdata('id'));
		$this->item_type				= $this->input->post('item_type');
		if ($this->item_type == "ORDER")
		{
			$this->posted_item_id			= "";
			$this->posted_item_name			= $this->input->post('posted_item_name');
			$this->price					= $this->input->post('price');
			$this->date_posted				= date("Y-m-d H:i:s", time());
			$this->date_updated				= date("Y-m-d H:i:s", time());
			$this->date_expired				= NULL;
			$this->is_confirmed				= 0;
			$this->unit_weight				= $this->input->post('unit_weight');
			$this->posted_item_description	= $this->input->post('posted_item_description');
			$this->category_id				= $this->input->post('category_id');
			$this->tenant_id				= $cur_tenant->id;
			$this->brand_id					= $this->input->post('brand_id');
		} 
		else if ($this->item_type == "REPAIR")
		{
			$this->posted_item_id			= "";
			$this->price					= "25000";
			$this->date_posted				= date("Y-m-d H:i:s", time());
			$this->date_updated				= date("Y-m-d H:i:s", time());
			$this->date_expired				= NULL;
			$this->posted_item_description	= $this->input->post('posted_item_description');
			$this->category_id				= $this->input->post('category_id');
			$this->tenant_id				= $cur_tenant->id;
			$this->brand_id					= $this->input->post('brand_id');
		}
		else // BID
		{
			$this->posted_item_id			= "";
			$this->posted_item_name			= $this->input->post('posted_item_name');
			$this->price					= $this->input->post('price');
			$this->date_posted				= date("Y-m-d H:i:s", time());
			$this->date_updated				= date("Y-m-d H:i:s", time());
			$this->date_expired				= $this->input->post('date_expired');
			$this->bidding_max_range		= $this->input->post('bidding_max_range');
			$this->unit_weight				= $this->input->post('unit_weight');
			$this->posted_item_description	= $this->input->post('posted_item_description');
			$this->category_id				= $this->input->post('category_id');
			$this->tenant_id				= 0;
			$this->brand_id					= $this->input->post('brand_id');
		}
		// insert data, then generate [account_id] based on [id]
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		if ($this->db->insert($this->table_item, $db_item))
		{
			$this->load->library('Id_generator');
			
			$this->id				= $this->db->insert_id();
			$this->posted_item_id	= $this->id_generator->generate(TYPE['name']['POSTED_ITEM'], $this->id);
			
			$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
			$this->db->where('id', $db_item->id);
			$this->db->update($this->table_item, $db_item);
		}
		
		$this->upload_image($this->id);
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function update_from_post()
	{
		$this->get_from_id($this->input->post('id'));
		
		$this->load->model('Tenant_model');
		$cur_tenant = $this->Tenant_model->get_by_account_id($this->session->userdata('id'));
		$this->item_type				= $this->input->post('item_type');
		if ($this->item_type == "ORDER")
		{
			$this->id						= $this->input->post('id');
			$this->posted_item_name			= $this->input->post('item_name');
			$this->price					= $this->input->post('price');
			$this->date_updated				= date("Y-m-d H:i:s", time());
			$this->date_expired				= NULL;
			$this->unit_weight				= $this->input->post('unit_weight');
			$this->posted_item_description	= $this->input->post('posted_item_description');
			$this->category_id				= $this->input->post('category_id');
			$this->tenant_id				= $cur_tenant->id;
			$this->brand_id					= $this->input->post('brand_id');
		} 
		else if ($this->item_type == "REPAIR")
		{
			$this->id						= ($this->input->post('id'));
			$this->price					= "25000";
			$this->date_posted				= date("Y-m-d H:i:s", time());
			$this->date_updated				= date("Y-m-d H:i:s", time());
			$this->date_expired				= NULL;
			$this->posted_item_description	= $this->input->post('posted_item_description');
			$this->category_id				= $this->input->post('category_id');
			$this->tenant_id				= $cur_tenant->id;
			$this->brand_id					= $this->input->post('brand_id');
		}
		
		// update data
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		
		$this->db->where('id', $db_item->id);
		$this->db->update($this->table_item, $db_item);
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function get_all_variance_quantity_available()
	{
		$this->load->model('posted_item_variance_model');
		$posted_item_variances = $this->posted_item_variance_model->get_by_posted_item_id($this->id);
		
		foreach ($posted_item_variances as $posted_item_variance)
		{
			$this->quantity_available += $posted_item_variance->quantity_available;
		}
		
		return $this->quantity_available;
	}
	
	public function is_favorite($customer_id)
	{
		if (!$customer_id) return null;
		
		$this->load->model('favorite_item_model');
		$favorite_id = $this->favorite_item_model->is_favorite($customer_id, $this->id);
		return $favorite_id;
	}
	
	public function init_tenant()
	{
		$this->tenant = $this->tenant->get_from_id($this->tenant_id);
		return $this->tenant;
	}
	
	public function upload_image($id)
	{
		$data['error'] = array();
		$file_path = array();
		$this->load->config('upload');
		
		$config_upload_image = $this->config->item('upload_image');
		$config_upload_image['upload_path'] .= $this->session->account_id."/".$this->posted_item_id."/";

		$this->load->library('upload', $config_upload_image);
		
		$config_compress_image = $this->config->item('compress_image_item');
		$this->load->library('image_lib');
		
		if ($_FILES['image_one_name']['name'])
		{
			if (!is_dir($config_upload_image['upload_path'])) {
				mkdir($config_upload_image['upload_path'], 0777, true);
			}
			if (!$this->upload->do_upload('image_one_name'))
			{
				$data['error'] = $this->upload->display_errors('', '');
			}
			else
			{
				$file_path['image_one_name'] = $config_upload_image['upload_path'].$this->upload->data('file_name');
				
				$config_compress_image['source_image'] = $file_path['image_one_name'];
				$this->image_lib->initialize($config_compress_image);
				if (!$this->image_lib->resize())
				{
					$data['error'] = $this->image_lib->display_errors();
				}
			}
		}
		
		if (count($data['error']) == 0)
		{
			$this->db->set('image_one_name', $file_path['image_one_name']);
			$this->db->where('id', $id);
			$this->db->update($this->table_item);
		}
	}
	
	public function update_price()
	{
		$this->db->set('price', $this->input->post('update_price'));
		$this->db->set('date_updated', date('Y-m-d H:i:s'));
		$this->db->where('id', $this->input->post('posted_item_id'));
		$this->db->update($this->table_item);
	}
	
	public function update_date_expired()
	{
		$this->db->set('date_expired', $this->date_expired);
		$this->db->where('id', $this->id);
		$this->db->update($this->table_item);
	}
	
	public function update_price_live($price, $posted_item_id)
	{
		$this->db->set('price', $price);
		$this->db->set('date_updated', date('Y-m-d H:i:s'));
		$this->db->where('id', $posted_item_id);
		$this->db->update($this->table_item);
	}
	
	public function set_is_confirmed($value=1)
	{
		$this->db->set('is_confirmed', 1);
		$this->db->where('id', $this->id);
		$this->db->update($this->table_item);
	}
	
	public function delete_from_id($id)
	{
		$this->db->where('posted_item_id', $id);
		$this->db->delete($this->table_item_variance);
		
		$this->db->where('id', $id);
		$this->db->delete($this->table_item);
	}
	
	public function calculate_rating()
	{
		$query = $this->db
					  ->select('AVG('.$this->table_feedback.'.rating) AS rating_average, COUNT('.$this->table_feedback.'.id) AS rating_count')
					  ->join($this->table_order_details, $this->table_feedback.'.order_detail_id' . ' = ' . $this->table_order_details.'.id', 'left')
					  ->join($this->table_item_variance, $this->table_order_details.'.posted_item_variance_id' . ' = ' . $this->table_item_variance.'.id', 'left')
					  ->where($this->table_item_variance.'.posted_item_id', $this->id)
					  ->where($this->table_order_details.'.order_status', ORDER_STATUS['name']['DONE'])
					  ->get($this->table_feedback);
		$item = $query->row();
		
		if ($item == null)
		{
			$item = new class{};
			$item->rating_average = 0;
			$item->rating_average_round = "0-0";
			$item->rating_count = 0;
		}
		else
		{
			$item->rating_average_round = number_format(round($item->rating_average * 2) / 2, 1, "-", "");
		}
		
		return $item;
		
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