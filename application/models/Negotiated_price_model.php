<?php

class Negotiated_price_model extends CI_Model {
	
	private $table_nego = 'negotiated_price';
	
	public $id;
	public $negotiation_id;
	public $agreement_date;
	public $discounted_price;
	public $status;
	public $order_id;
	public $tenant_id;
	public $customer_id;
	
	public $customer;
	public $account;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id				= NULL;
		$this->negotiation_id	= "";
		$this->agreement_date	= "";
		$this->discounted_price	= "";
		$this->status			= "";
		$this->order_id	= "";
		$this->tenant_id		= "";
		$this->customer_id		= "";
		
		$this->customer			= $this->load->model('Customer_model');
		$this->account			= $this->load->model('Account_model');
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id				= $db_item->id;
		$this->negotiation_id	= $db_item->negotiation_id;
		$this->agreement_date	= $db_item->agreement_date;
		$this->discounted_price	= $db_item->discounted_price;
		$this->status			= $db_item->status;
		$this->order_id			= $db_item->order_id;
		$this->tenant_id		= $db_item->tenant_id;
		$this->customer_id		= $db_item->customer_id;
		
		$this->customer			= $this->load->model('Customer_model');
		$this->account			= $this->load->model('Account_model');
		
		$this->account->email	= $db_item->email?? "";
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id				= $this->id;
		$db_item->negotiation_id	= $this->negotiation_id;
		$db_item->agreement_date	= $this->agreement_date;
		$db_item->discounted_price	= $this->discounted_price;
		$db_item->status			= $this->status;
		$db_item->order_id			= $this->order_id;
		$db_item->tenant_id			= $this->tenant_id;
		$db_item->customer_id		= $this->customer_id;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Negotiated_price_model();
		
		$stub->id				= $db_item->id;
		$stub->negotiation_id	= $db_item->negotiation_id;
		$stub->agreement_date	= $db_item->agreement_date;
		$stub->discounted_price	= $db_item->discounted_price;
		$stub->status			= $db_item->status;
		$stub->order_id			= $db_item->order_id;
		$stub->tenant_id		= $db_item->tenant_id;
		$stub->customer_id		= $db_item->customer_id;
		
		$stub->account->email	= $db_item->email?? "";
		$stub->account->name	= $db_item->name?? "";
		
		return $stub;
	}
	
	public function map_list($negotiated_prices)
	{
		$result = array();
		foreach ($negotiated_prices as $negotiated_price)
		{
			$result[] = $this->get_new_stub_from_db($negotiated_price);
		}
		return $result;
	}
	
	// get tenant detail
	// public function get_from_id($id)
	// {
		// $where['posted_item.id'] = $id;
		
		// $this->db->select('*, ' . $this->table_item.'.id AS id');
		// $this->db->join('category', 'category.id=' . $this->table_item . '.category_id', 'left');
		// $this->db->join('brand', 'brand.id=' . $this->table_item . '.brand_id', 'left');
		// $this->db->where($where);
		// $query = $this->db->get($this->table_item, 1);
		// $item = $query->row();
		
		// return ($item !== null) ? $this->get_stub_from_db($item) : null;
	// }
	
	public function get_all()
	{
		$this->db->where('tenant_id', $this->session->child_id);
		
		$this->db->join('customer', 'customer.id=' . $this->table_nego . '.customer_id', 'left');
		$this->db->join('account', 'account.id=customer.account_id', 'left');
		
		$query = $this->db->get($this->table_nego);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_by_order_id($order_id)
	{
		$this->db->where('order_id', $order_id);
		
		$this->db->join('customer', 'customer.id=' . $this->table_nego . '.customer_id', 'left');
		$this->db->join('account', 'account.id=customer.account_id', 'left');
		
		$query = $this->db->get($this->table_nego);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	// insert new account from form post
	public function insert_from_post($order_id)
	{
		$this->load->model('Tenant_model');
		$cur_tenant = $this->Tenant_model->get_by_account_id($this->session->userdata('id'));	
		
		$this->negotiation_id	= "";
		$this->agreement_date	= date("Y-m-d H:i:s");
		$this->status			= "NOT_TAKEN";
		$this->order_id			= $order_id;
		$this->tenant_id		= $cur_tenant->id;
		
		// Get Customer ID
		$this->db->select('billing.customer_id');
		$this->db->where('order_details.id', $order_id);	
		$this->db->join('billing', 'order_details.billing_id=billing.id', 'left');
		$query = $this->db->get('order_details', 1);
		$items = $query->row();	
		$this->customer_id = $items->customer_id;
		
		// Get Negotiated Price
		$this->discounted_price	= $this->input->post('discounted_price');
		
		// insert data, then generate [account_id] based on [id]
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		if ($this->db->insert($this->table_nego, $db_item))
		{
			$this->load->library('Id_Generator');
			
			$db_item->id				= $this->db->insert_id();
			$db_item->negotiation_id	= $this->id_generator->generate(TYPE['name']['NEGOTIATED_PRICE'], $db_item->id);
			
			$this->db->where('id', $db_item->id);
			$this->db->update($this->table_nego, $db_item);
		}
		
		// Get Offered Price
		$this->db->select('order_details.offered_price');
		$this->db->where('order_details.id', $order_id);	
		$query = $this->db->get('order_details', 1);
		$items = $query->row();	
		$this->offered_price = $items->offered_price;
		
		$this->db->where('id', $this->order_id);
		
		$this->db->set('sold_price', $this->discounted_price + $this->offered_price);
		$this->db->update('order_details');
		
		$this->db->trans_complete(); // selesai nge lock db transaction

	}

}

?>