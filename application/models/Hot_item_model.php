<?php

class Hot_item_model extends CI_Model {
	
	private $table_hot_item = 'hot_item';
	private $table_item = 'posted_item';
	
	// table attribute
	public $id;
	public $hot_item_id;
	public $promo_price;
	public $promo_description;
	public $posted_item_id;
	
	public $posted_item;
	public $tenant;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id					= 0;
		$this->hot_item_id			= "";
		$this->promo_price			= 0;
		$this->promo_description	= "";
		$this->posted_item_id		= 0;
		
		$this->load->model('item_model');
		$this->posted_item	= new item_model();
		$this->tenant		= new tenant_model();
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->hot_item_id			= $db_item->hot_item_id;
		$this->promo_price			= $db_item->promo_price;
		$this->promo_description	= $db_item->promo_description;
		$this->posted_item_id		= $db_item->posted_item_id;
		
		$this->posted_item->posted_item_name	= $db_item->posted_item_name ?? "";
		$this->posted_item->price				= $db_item->price ?? "";
		$this->posted_item->image_one_name		= $db_item->image_one_name ?? "";
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id				= $this->id;
		$db_item->hot_item_id		= $this->hot_item_id;
		$db_item->promo_price		= $this->promo_price;
		$db_item->promo_description	= $this->promo_description;
		$db_item->posted_item_id	= $this->posted_item_id;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Hot_item_model();
		
		$stub->id					= $db_item->id;
		$stub->hot_item_id			= $db_item->hot_item_id;
		$stub->promo_price			= $db_item->promo_price;
		$stub->promo_description	= $db_item->promo_description;
		$stub->posted_item_id		= $db_item->posted_item_id;
		
		$stub->posted_item->posted_item_name	= $db_item->posted_item_name ?? "";
		$stub->posted_item->price				= $db_item->price ?? "";
		$stub->posted_item->image_one_name		= $db_item->image_one_name ?? "";
		$stub->tenant->tenant_name				= $db_item->tenant_name ?? "";
		
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
	
	public function get_all($limit=10, $offset=0)
	{
		$this->db->where('tenant_bill.payment_date != 0');
		$this->db->where('tenant_bill.hot_item_id is NOT NULL');
		$this->db->join($this->table_hot_item, 'tenant_bill.hot_item_id' . ' = ' . $this->table_hot_item.'.id', 'left');
		$this->db->join($this->table_item, $this->table_hot_item.'.posted_item_id' . ' = ' . $this->table_item.'.id', 'left');
		$query = $this->db
					  ->order_by($this->table_hot_item.'.id', 'DESC')
					  ->get('tenant_bill', $limit??"", $limit?$offset:""); // kalau ga ada limit, jgn taro offset nya
		
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_all_registered()
	{
		$this->db->select('*, ' . $this->table_hot_item.'.posted_item_id AS posted_item_id, '. $this->table_hot_item.'.id AS id');
		$this->db->join($this->table_item, $this->table_hot_item.'.posted_item_id' . ' = ' . $this->table_item.'.id', 'left');
		$this->db->join('tenant', $this->table_item.'.tenant_id = tenant.id', 'left');
		$query = $this->db->get($this->table_hot_item);
		$hot_items = $query->result();
		
		return ($hot_items !== null) ? $this->map_list($hot_items) : array();
	}
	
	public function get_posted_item_id($id)
	{
		$where['hot_item.id'] = $id;
		
		$this->db->select('*, ' . $this->table_hot_item . '.id AS id');
		$this->db->where($where);
		$query = $this->db->get($this->table_hot_item, 1);
		$hot_items = $query->row();
		
		return ($hot_items !== null) ? $hot_items->posted_item_id : array();
	}
	
	// get hot_item detail
	public function get_from_posted_item_id($posted_item_id)
	{
		$where['posted_item_id'] = $posted_item_id;
		
		$this->db->where($where);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get($this->table_hot_item, 1);
		$item = $query->row();
		
		return ($item !== null) ? $this->get_stub_from_db($item) : null;
	}
	
	public function insert_from_post($posted_item_id)
	{	
		$this->hot_item_id			= "";
		$this->promo_price			= $this->input->post('promo_price');
		$this->promo_description 	= $this->input->post('promo_description');
		$this->posted_item_id		= $posted_item_id;
	
		
		// insert data, then generate [reward_id] based on [id]
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		if ($this->db->insert($this->table_hot_item, $db_item))
		{
			$this->load->library('Id_Generator');
			
			$db_item->id		= $this->db->insert_id();
			$db_item->hot_item_id	= $this->id_generator->generate(TYPE['name']['HOT_ITEM'], $db_item->id);
			
			$this->db->where('id', $db_item->id);
			$this->db->update($this->table_hot_item, $db_item);
		}
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}

	public function deposit_status_set($id, $value)
	{
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$this->db->where('id', $id);
		$this->db->set('deposit_status', $value);
		$this->db->update($this->table_customer);
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
}

?>