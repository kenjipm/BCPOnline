<?php

class Order_details_model extends CI_Model {
	
	private $table_order_details = 'order_details';
	
	const ORDER_STATUS = array(
		"QUEUED" => "QUEUED"
		);
	
	// table attribute
	public $id;
	public $order_id;
	public $quantity;
	public $offered_price;
	public $sold_price;
	public $order_status;
	public $collection_code;
	public $collection_method;
	public $cust_rec_code;
	public $tent_repr_rec_code;
	public $date_repr_decided;
	public $billing_id;
	public $posted_item_variance_id;
	public $deliverer_id;
	public $tnt_paid_receipt_id;
	public $voucher_cut_price;
	
	// relation table
	public $billing;
	public $posted_item_variance;
	public $deliverer;
	public $tnt_paid_receipt;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id						= 0;
		$this->order_id					= 0;
		$this->quantity					= 0;
		$this->offered_price			= 0;
		$this->sold_price				= 0;
		$this->order_status				= "";
		$this->collection_code			= "";
		$this->collection_method		= "";
		$this->cust_rec_code			= "";
		$this->tent_repr_rec_code		= "";
		$this->date_repr_decided		= "";
		$this->billing_id				= 0;
		$this->posted_item_variance_id	= 0;
		$this->deliverer_id				= 0;
		$this->tnt_paid_receipt_id		= 0;
		$this->voucher_cut_price		= 0;
		
		$this->billing					= $this->load->model('billing_model');
		$this->posted_item_variance		= $this->load->model('posted_item_variance_model');
		// $this->deliverer				= $this->load->model('deliverer_model');
		// $this->tnt_paid_receipt			= $this->load->model('tnt_paid_receipt_model');
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id						= $db_item->id;
		$this->order_id					= $db_item->order_id;
		$this->quantity					= $db_item->quantity;
		$this->offered_price			= $db_item->offered_price;
		$this->sold_price				= $db_item->sold_price;
		$this->order_status				= $db_item->order_status;
		$this->collection_code			= $db_item->collection_code;
		$this->collection_method		= $db_item->collection_method;
		$this->cust_rec_code			= $db_item->cust_rec_code;
		$this->tent_repr_rec_code		= $db_item->tent_repr_rec_code;
		$this->date_repr_decided		= $db_item->date_repr_decided;
		$this->billing_id				= $db_item->billing_id;
		$this->posted_item_variance_id	= $db_item->posted_item_variance_id;
		$this->deliverer_id				= $db_item->deliverer_id;
		$this->tnt_paid_receipt_id		= $db_item->tnt_paid_receipt_id;
		$this->voucher_cut_price		= $db_item->voucher_cut_price;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id						= $this->id;
		$db_item->order_id					= $this->order_id;
		$db_item->quantity					= $this->quantity;
		$db_item->offered_price				= $this->offered_price;
		$db_item->sold_price				= $this->sold_price;
		$db_item->order_status				= $this->order_status;
		$db_item->collection_code			= $this->collection_code;
		$db_item->collection_method			= $this->collection_method;
		$db_item->cust_rec_code				= $this->cust_rec_code;
		$db_item->tent_repr_rec_code		= $this->tent_repr_rec_code;
		$db_item->date_repr_decided			= $this->date_repr_decided;
		$db_item->billing_id				= $this->billing_id;
		$db_item->posted_item_variance_id	= $this->posted_item_variance_id;
		$db_item->deliverer_id				= $this->deliverer_id;
		$db_item->tnt_paid_receipt_id		= $this->tnt_paid_receipt_id;
		$db_item->voucher_cut_price			= $this->voucher_cut_price;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Payment_model();
		
		$stub->id						= $db_item->id;
		$stub->order_id					= $db_item->order_id;
		$stub->quantity					= $db_item->quantity;
		$stub->offered_price			= $db_item->offered_price;
		$stub->sold_price				= $db_item->sold_price;
		$stub->order_status				= $db_item->order_status;
		$stub->collection_code			= $db_item->collection_code;
		$stub->collection_method		= $db_item->collection_method;
		$stub->cust_rec_code			= $db_item->cust_rec_code;
		$stub->tent_repr_rec_code		= $db_item->tent_repr_rec_code;
		$stub->date_repr_decided		= $db_item->date_repr_decided;
		$stub->billing_id				= $db_item->billing_id;
		$stub->posted_item_variance_id	= $db_item->posted_item_variance_id;
		$stub->deliverer_id				= $db_item->deliverer_id;
		$stub->tnt_paid_receipt_id		= $db_item->tnt_paid_receipt_id;
		$stub->voucher_cut_price		= $db_item->voucher_cut_price;
		
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
	
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_order_details, 1);
		$item = $query->row();
		
		return ($reward !== null) ? $this->get_stub_from_db($item) : null;
	}
	
	public function get_all()
	{
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
	
	public function get_all_from_billing_id($billing_id)
	{
		$where['billing_id'] = $billing_id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
	
	public function insert_from_cart($cart, $billing_id)
	{
		$this->load->library('id_generator');
		$this->load->model('item_model');
		$this->db->trans_start();
		
		foreach ($cart as $id => $cart_item)
		{
			$cur_item = $this->item_model->get_from_id($id);
			
			$this->id						= 0;
			$this->quantity					= $cart_item->quantity;
			$this->offered_price			= $cur_item->price;
			$this->sold_price				= $cart_item->price;
			$this->order_status				= $this->ORDER_STATUS['QUEUED'];
			$this->billing_id				= $billing_id;
			$this->posted_item_variance_id	= $id;
			
			if ($this->db->insert($this->table_order_details, $this))
			{
				$this->id	= $this->db->insert_id();
			}
			
			$natural_id = $this->id_generator->generate(TYPE['name']['ORDER_DETAILS'], $this->id);
			$this->update_natural_id($natural_id);
		}
		
		$this->db->trans_complete();
	}
	
	public function init_billing()
	{
		$this->billing = $this->billing->get_from_id($this->billing_id);
		return $this->billing;
	}
	
	public function init_posted_item_variance()
	{
		$this->posted_item_variance = $this->posted_item_variance->get_from_id($this->posted_item_variance_id);
		return $this->posted_item_variance;
	}
}

?>