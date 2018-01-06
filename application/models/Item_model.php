<?php

class Item_model extends CI_Model {
	
	private $table_item = 'posted_item';
	private $table_item_variance = 'posted_item_variance';
	private $table_category = 'category';
	
	// table attribute
	public $id;
	public $posted_item_id;
	public $posted_item_name;
	public $price;
	public $date_posted;
	public $date_updated;
	public $date_expired;
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
	
	// relation table
	public $category;
	public $brand;
	public $tenant;
	
	// stub attribute
	public $quantity_avalaible;
	
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
		$this->item_type				= "";
		$this->unit_weight				= "";
		$this->posted_item_description	= "";
		$this->image_one_name			= "";
		$this->category_id				= "";
		$this->tenant_id				= "";
		$this->brand_id					= "";
		
		$this->quantity_avalaible		= "";
		
		$this->load->model('Category_model');
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
		$this->item_type				= $db_item->item_type;
		$this->unit_weight				= $db_item->unit_weight;
		$this->posted_item_description	= $db_item->posted_item_description;
		$this->image_one_name			= $db_item->image_one_name;
		$this->category_id				= $db_item->category_id;
		$this->tenant_id				= $db_item->tenant_id;
		$this->brand_id					= $db_item->brand_id;
		
		$this->category->category_name	= $db_item->category_name ?? "";
		$this->brand->brand_name		= $db_item->brand_name ?? "";
		
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
		$db_item->item_type					= $this->item_type;
		$db_item->unit_weight				= $this->unit_weight;
		$db_item->posted_item_description	= $this->posted_item_description;
		$db_item->image_one_name			= $this->image_one_name;
		$db_item->category_id				= $this->category_id;
		$db_item->tenant_id					= $this->tenant_id;
		$db_item->brand_id					= $this->brand_id;
		
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
		$stub->item_type				= $db_item->item_type;
		$stub->unit_weight				= $db_item->unit_weight;
		$stub->posted_item_description	= $db_item->posted_item_description;
		$stub->image_one_name			= $db_item->image_one_name;
		$stub->category_id				= $db_item->category_id;
		$stub->tenant_id				= $db_item->tenant_id;
		$stub->brand_id					= $db_item->brand_id;
		
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
		
		$this->db->select('*, ' . $this->table_item.'.id AS id');
		$this->db->join('category', 'category.id=' . $this->table_item . '.category_id', 'left');
		$this->db->join('brand', 'brand.id=' . $this->table_item . '.brand_id', 'left');
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
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
	
	public function get_all_for_admin()
	{
		$this->db->join('tenant', 'tenant.id=' . $this->table_item . '.tenant_id', 'left');
		$query = $this->db->get($this->table_item);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
	
	public function get_all_from_category_id($category_id)
	{
		$query = $this->db
					  //->join($this->table_category, $this->table_category.'.id' . ' = ' . $this->table_item.'.category_id', 'left');
					  ->where('category_id', $category_id)
					  ->get($this->table_item);
					  
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
	
	public function get_all_from_following_tenants($following_tenants)
	{
		$this->db->where('0', '1');
		foreach ($following_tenants as $following_tenant)
		{
			$this->db->or_where('tenant_id', $following_tenant->tenant_id);
		}
		$query = $this->db
					  ->order_by('id', 'DESC')
					  ->get($this->table_item);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
	
	public function get_all_from_tenant_id($tenant_id, $limit=99)
	{
		$this->db->where('tenant_id', $tenant_id);
		$query = $this->db
					  ->order_by('id', 'DESC')
					  ->get($this->table_item, $limit);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
	
	public function get_from_search($keywords)
	{
		$this->db->like('posted_item_name', $keywords);
		// foreach (explode(" ", $keywords) as $keyword) // untuk search per word
		// {
			// $this->db->or_like('name', $keyword);
		// }
		$query = $this->db->get($this->table_item);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
	
	// insert new item from form post
	public function insert_from_post()
	{
		$this->load->model('Tenant_model');
		$cur_tenant = $this->Tenant_model->get_by_account_id($this->session->userdata('id'));
		
		$this->posted_item_id			= "";
		$this->posted_item_name			= $this->input->post('posted_item_name');
		$this->price					= $this->input->post('price');
		$this->date_posted				= date("d-m-Y");
		$this->date_updated				= date("d-m-Y");
		$this->date_expired				= NULL;
		$this->item_type				= $this->input->post('item_type');
		$this->unit_weight				= $this->input->post('unit_weight');
		$this->posted_item_description	= $this->input->post('posted_item_description');
		$this->image_one_name			= $this->input->post('image_one_name');
		$this->category_id				= $this->input->post('category_id');
		$this->tenant_id				= $cur_tenant->id;
		$this->brand_id					= $this->input->post('brand_id');
	
		
		// insert data, then generate [account_id] based on [id]
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		if ($this->db->insert($this->table_item, $db_item))
		{
			$this->load->library('Id_Generator');
			
			$this->id				= $this->db->insert_id();
			$this->posted_item_id	= $this->id_generator->generate(TYPE['name']['POSTED_ITEM'], $this->id);
			
			$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
			$this->db->where('id', $db_item->id);
			$this->db->update($this->table_item, $db_item);
		}
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function get_all_variance_quantity_available()
	{
		$this->load->model('posted_item_variance_model');
		$posted_item_variances = $this->posted_item_variance_model->get_by_posted_item_id($this->id);
		
		foreach ($posted_item_variances as $posted_item_variance)
		{
			$this->quantity_avalaible += $posted_item_variance->quantity_avalaible;
		}
		
		return $this->quantity_avalaible;
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
	
	public function update_profile_pic($id, $file_path)
	{
		// update data
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$this->db->where('id', $id);
		$this->db->set('image_one_name', $file_path);
		$this->db->update($this->table_item);
		
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