<?php

class Order_details_model extends CI_Model {
	
	private $table_order_details = 'order_details';
	private $table_order_status_history = 'order_status_history';
	
	// table attribute
	public $id;
	public $order_id;
	public $quantity;
	public $offered_price;
	public $sold_price;
	public $order_status;
	public $delivery_receipt_no;
	public $otp_deliverer_to_tenant;
	public $collection_method;
	public $otp_customer_to_deliverer;
	public $otp_tenant_to_deliverer;
	public $date_repr_decided;
	public $billing_id;
	public $posted_item_variance_id;
	public $deliverer_id;
	public $tnt_paid_receipt_id;
	public $voucher_id;
	
	// relation table
	public $billing;
	public $posted_item_variance;
	public $feedback;
	public $deliverer;
	public $tnt_paid_receipt;
	public $voucher;
	
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
		$this->delivery_receipt_no				= "";
		$this->otp_deliverer_to_tenant			= "";
		$this->collection_method		= "";
		$this->otp_customer_to_deliverer			= "";
		$this->otp_tenant_to_deliverer		= "";
		$this->date_repr_decided		= "";
		$this->billing_id				= 0;
		$this->posted_item_variance_id	= 0;
		$this->deliverer_id				= NULL;
		$this->tnt_paid_receipt_id		= NULL;
		$this->voucher_id		= NULL;
		
		$this->load->model('billing_model');
		$this->load->model('posted_item_variance_model');
		$this->load->model('item_model');
		$this->load->model('deliverer_model');
		$this->load->model('tenant_model');
		$this->load->model('customer_model');
		$this->load->model('account_model');
		$this->load->model('shipping_address_model');
		$this->load->model('feedback_model');
		$this->load->model('voucher_model');
		
		$this->billing								= new Billing_model();
		$this->deliverer							= new Deliverer_model();
		$this->customer								= new Customer_model();
		$this->deliverer->account					= new Account_model();
		$this->customer->account					= new Account_model();
		$this->posted_item_variance					= new Posted_item_variance_model();
		$this->posted_item_variance->posted_item	= new Item_model();
		$this->feedback								= new Feedback_model();
		$this->voucher								= new Voucher_model();
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
		$this->delivery_receipt_no				= $db_item->delivery_receipt_no;
		$this->otp_deliverer_to_tenant		= $db_item->otp_deliverer_to_tenant;
		$this->collection_method		= $db_item->collection_method;
		$this->otp_customer_to_deliverer	= $db_item->otp_customer_to_deliverer;
		$this->otp_tenant_to_deliverer		= $db_item->otp_tenant_to_deliverer;
		$this->date_repr_decided		= $db_item->date_repr_decided;
		$this->billing_id				= $db_item->billing_id;
		$this->posted_item_variance_id	= $db_item->posted_item_variance_id;
		$this->deliverer_id				= $db_item->deliverer_id;
		$this->tnt_paid_receipt_id		= $db_item->tnt_paid_receipt_id;
		$this->voucher_id				= $db_item->voucher_id;
		
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
		$db_item->delivery_receipt_no				= $this->delivery_receipt_no;
		$db_item->otp_deliverer_to_tenant		= $this->otp_deliverer_to_tenant;
		$db_item->collection_method			= $this->collection_method;
		$db_item->otp_customer_to_deliverer		= $this->otp_customer_to_deliverer;
		$db_item->otp_tenant_to_deliverer		= $this->otp_tenant_to_deliverer;
		$db_item->date_repr_decided			= $this->date_repr_decided;
		$db_item->billing_id				= $this->billing_id;
		$db_item->posted_item_variance_id	= $this->posted_item_variance_id;
		$db_item->deliverer_id				= $this->deliverer_id;
		$db_item->tnt_paid_receipt_id		= $this->tnt_paid_receipt_id;
		$db_item->voucher_id				= $this->voucher_id;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Order_details_model();
		
		$stub->id						= $db_item->id;
		$stub->order_id					= $db_item->order_id;
		$stub->quantity					= $db_item->quantity;
		$stub->offered_price			= $db_item->offered_price;
		$stub->sold_price				= $db_item->sold_price;
		$stub->order_status				= $db_item->order_status;
		$stub->delivery_receipt_no				= $db_item->delivery_receipt_no;
		$stub->otp_deliverer_to_tenant	= $db_item->otp_deliverer_to_tenant;
		$stub->collection_method		= $db_item->collection_method;
		$stub->otp_customer_to_deliverer = $db_item->otp_customer_to_deliverer;
		$stub->otp_tenant_to_deliverer	= $db_item->otp_tenant_to_deliverer;
		$stub->otp_deliverer_to_customer = $db_item->otp_deliverer_to_customer;
		$stub->otp_deliverer_to_tenant	= $db_item->otp_deliverer_to_tenant;
		$stub->date_repr_decided		= $db_item->date_repr_decided;
		$stub->billing_id				= $db_item->billing_id;
		$stub->posted_item_variance_id	= $db_item->posted_item_variance_id;
		$stub->deliverer_id				= $db_item->deliverer_id;
		$stub->tnt_paid_receipt_id		= $db_item->tnt_paid_receipt_id;
		$stub->voucher_id				= $db_item->voucher_id;
		
		$stub->posted_item_name			= $db_item->posted_item_name ?? "";
		$stub->voucher_worth 			= $db_item->voucher_worth ?? 0;
		
		$stub->posted_item_variance						= new Posted_item_variance_model();
		$stub->posted_item_variance->var_type			= $db_item->var_type ?? "";
		$stub->posted_item_variance->var_description	= $db_item->var_description ?? "";
		
		$stub->posted_item_variance->posted_item					= new Item_model();
		$stub->posted_item_variance->posted_item->posted_item_name	= $db_item->posted_item_name ?? "";
		$stub->posted_item_variance->posted_item->posted_item_description	= $db_item->posted_item_description ?? "";
		$stub->posted_item_variance->posted_item->item_type			= $db_item->item_type ?? "";
		$stub->posted_item_variance->posted_item->tenant_id			= $db_item->tenant_id ?? "";
		
		$stub->billing						= new Billing_model();
		$stub->billing->shipping_address_id	= $db_item->shipping_address_id ?? "";
		$stub->billing->date_created		= $db_item->date_created ?? "";
		$stub->billing->date_closed			= $db_item->date_closed ?? "";
		$stub->billing->customer_id			= $db_item->customer_id ?? "";
		$stub->billing->delivery_method		= $db_item->delivery_method ?? "";
		$stub->billing->delivery_type		= $db_item->delivery_type ?? "";
		
		$stub->billing->customer					= new Customer_model();
		$stub->billing->customer->account			= new Account_model();
		$stub->billing->customer->account->id		= $db_item->account_id ?? "";
		$stub->billing->customer->account->name		= $db_item->name ?? "";
		
		$stub->billing->shipping_address					= new Shipping_address_model();
		$stub->billing->shipping_address->address_detail	= $db_item->address_detail ?? "";
		$stub->billing->shipping_address->city				= $db_item->city ?? "";
		$stub->billing->shipping_address->kecamatan			= $db_item->kecamatan ?? "";
		$stub->billing->shipping_address->kelurahan			= $db_item->kelurahan ?? "";
		$stub->billing->shipping_address->postal_code		= $db_item->postal_code ?? "";
		
		$stub->deliverer				= new Deliverer_model();
		$stub->deliverer->account		= new Account_model();
		$stub->deliverer->account->name	= $db_item->name ?? "";
		
		$stub->tenant				= new Tenant_model();
		$stub->tenant->tenant_name 	= $db_item->tenant_name ?? "";
		$stub->tenant->unit_number	= $db_item->unit_number ?? "";
		$stub->tenant->floor		= $db_item->floor ?? "";
		
		$stub->feedback					= new Feedback_model();
		$stub->feedback->feedback_text 	= $db_item->feedback_text ?? "";
		$stub->feedback->feedback_reply	= $db_item->feedback_reply ?? "";
		$stub->feedback->rating		 	= $db_item->rating ?? "";
		
		$stub->voucher					= new Voucher_model();
		$stub->voucher->voucher_worth 	= $db_item->voucher_worth ?? 0;
		
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
		$where['order_details.id'] = $id;
		
		$this->db->where($where);
		$this->db->select('*, ' . $this->table_order_details.'.id AS id,' . $this->table_order_details.'.deliverer_id AS deliverer_id, ' . 'account.id AS account_id');
		$this->db->join('posted_item_variance', 'posted_item_variance.id=' . $this->table_order_details . '.posted_item_variance_id', 'left');
		$this->db->join('posted_item', 'posted_item.id=posted_item_variance.posted_item_id', 'left');
		$this->db->join('feedback', 'feedback.order_detail_id='. $this->table_order_details . '.id', 'left');
		$this->db->join('billing', 'billing.id='. $this->table_order_details . '.billing_id', 'left');
		$this->db->join('customer', 'billing.customer_id=customer.id', 'left');
		$this->db->join('account', 'account.id=customer.account_id', 'left');
		$query = $this->db->get($this->table_order_details, 1);
		$item = $query->row();
		
		return ($item !== null) ? $this->get_new_stub_from_db($item) : null;
	}
	
	public function get_all()
	{
		$where[$this->table_order_details.'.order_status'] = ORDER_STATUS['name']['QUEUED'];
		$where[$this->table_order_details.'.deliverer_id'] = null;
		
		$this->db->select('*, ' . $this->table_order_details.'.id AS id,' . $this->table_order_details.'.deliverer_id AS deliverer_id');
		$this->db->join('posted_item_variance', 'posted_item_variance.id=' . $this->table_order_details . '.posted_item_variance_id', 'left');
		$this->db->join('posted_item', 'posted_item.id=posted_item_variance.posted_item_id', 'left');
		$this->db->join('billing', 'billing.id=' .$this->table_order_details . '.billing_id', 'left');
		$this->db->join('shipping_address', 'shipping_address.id=billing.shipping_address_id', 'left');
		$this->db->where($where);
		
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_all_from_billing_id($billing_id)
	{
		$where['billing_id'] = $billing_id;
		
		$this->db->select('*, ' . $this->table_order_details.'.id AS order_id');
		$this->db->join('posted_item_variance', 'posted_item_variance.id=' . $this->table_order_details . '.posted_item_variance_id', 'left');
		$this->db->join('posted_item', 'posted_item.id=posted_item_variance.posted_item_id', 'left');
		$this->db->join('voucher', 'voucher.id=' . $this->table_order_details.'.voucher_id', 'left');
		$this->db->where($where);
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_all_from_billing_deliverer_id($billing_id, $deliverer_id)
	{
		$where['billing_id'] = $billing_id;
		$where['deliverer_id'] = $deliverer_id;
		
		$this->db->select('*, ' . $this->table_order_details.'.id AS order_id');
		$this->db->join('posted_item_variance', 'posted_item_variance.id=' . $this->table_order_details . '.posted_item_variance_id', 'left');
		$this->db->join('posted_item', 'posted_item.id=posted_item_variance.posted_item_id', 'left');
		$this->db->where($where);
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_all_from_tenant_id()
	{
		$this->load->model('Tenant_model');
		$cur_tenant = $this->Tenant_model->get_by_account_id($this->session->userdata('id'));
		
		$where['posted_item.tenant_id'] = $cur_tenant->id;
		
		$this->db->select('*, ' . $this->table_order_details.'.id AS id');
		$this->db->join('posted_item_variance', 'posted_item_variance.id=' . $this->table_order_details . '.posted_item_variance_id', 'left');
		$this->db->join('posted_item', 'posted_item.id=posted_item_variance.posted_item_id', 'left');
		$this->db->join('billing', 'billing.id=' . $this->table_order_details . '.billing_id', 'left');
		$this->db->join('customer', 'billing.customer_id=customer.id', 'left');
		$this->db->join('account', 'account.id=customer.account_id', 'left');
		$this->db->where($where);
		$this->db->order_by('date_created', 'DESC');
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_all_from_customer_id($customer_id)
	{
		$where['billing.customer_id'] = $customer_id;
		
		$this->db->select('*, ' . $this->table_order_details.'.id AS id');
		$this->db->join('billing', 'billing.id=' . $this->table_order_details . '.billing_id', 'left');
		$this->db->where($where);
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_all_from_customer_id_and_voucher_id_and_date($customer_id, $voucher_id, $date)
	{
		$where['billing.customer_id'] = $customer_id;
		$where['voucher_id'] = $voucher_id;
		
		$this->db->select('*, ' . $this->table_order_details.'.id AS id');
		$this->db->join('billing', 'billing.id=' . $this->table_order_details . '.billing_id', 'left');
		$this->db->where($where);
		
		$this->db->where('DAY(billing.date_created) = '.date_format($date, "j")); // 1-31
		$this->db->where('MONTH(billing.date_created) = '.date_format($date, "n")); // 1-12
		$this->db->where('YEAR(billing.date_created) = '.date_format($date, "Y")); // 1970-9999
		
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		// print_r($this->db->last_query());
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_all_from_otp_deliverer_to_tenant($otp, $tenant_id)
	{
		$this->load->model('Tenant_model');
		
		$where['posted_item.tenant_id'] = $tenant_id;
		$where[$this->table_order_details. '.otp_deliverer_to_tenant'] = $otp;
		$where[$this->table_order_details. '.order_status'] = ORDER_STATUS['name']['PICKING_FROM_TENANT'];
		
		$this->db->select('*, ' . $this->table_order_details.'.id AS id');
		$this->db->join('posted_item_variance', 'posted_item_variance.id=' . $this->table_order_details . '.posted_item_variance_id', 'left');
		$this->db->join('posted_item', 'posted_item.id=posted_item_variance.posted_item_id', 'left');
		$this->db->join('billing', 'billing.id=' . $this->table_order_details . '.billing_id', 'left');
		$this->db->join('deliverer', 'deliverer.id=' . $this->table_order_details . '.deliverer_id', 'left');
		$this->db->join('account', 'account.id=deliverer.account_id', 'left');
		$this->db->where($where);
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		foreach($items as $item)
		{
			$this->update_order_status($item->id, ORDER_STATUS['name']['PICKING_FROM_TENANT'], ORDER_STATUS['name']['DELIVERING_TO_CUSTOMER']);
		}
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_all_from_otp_customer_to_deliverer($otp, $deliverer_id, $delivery_receipt_no="")
	{
		$this->load->model('Deliverer_model');
		
		$where[$this->table_order_details. '.deliverer_id'] = $deliverer_id;
		$where[$this->table_order_details. '.otp_customer_to_deliverer'] = $otp;
		$where[$this->table_order_details. '.order_status'] = ORDER_STATUS['name']['DELIVERING_TO_CUSTOMER'];
		
		$this->db->select('*, ' . $this->table_order_details.'.id AS id');
		$this->db->join('posted_item_variance', 'posted_item_variance.id=' . $this->table_order_details . '.posted_item_variance_id', 'left');
		$this->db->join('posted_item', 'posted_item.id=posted_item_variance.posted_item_id', 'left');
		$this->db->join('billing', 'billing.id=' . $this->table_order_details . '.billing_id', 'left');
		$this->db->join('customer', 'customer.id=billing.customer_id', 'left');
		$this->db->join('account', 'account.id=customer.account_id', 'left');
		$this->db->where($where);
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		if ($delivery_receipt_no == "") // kalau kirim otp / bypass otp
		{
			foreach($items as $item)
			{
				$this->update_order_status($item->id, ORDER_STATUS['name']['DELIVERING_TO_CUSTOMER'], ORDER_STATUS['name']['RECEIVED']);
			}
		}
		else // if ($delivery_receipt_no != "") // kalau kirim ke kurir
		{
			foreach($items as $item)
			{
				$this->update_order_status($item->id, ORDER_STATUS['name']['DELIVERING_TO_CUSTOMER'], ORDER_STATUS['name']['RECEIVED_BY_COURIER'], $delivery_receipt_no);
			}
		}
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	// FOR REPAIR
	public function get_all_from_otp_deliverer_to_customer($otp, $customer_id)
	{
		$this->load->model('Customer_model');
		
		$where['billing.customer_id'] = $customer_id;
		$where[$this->table_order_details. '.otp_deliverer_to_customer'] = $otp;
		$where[$this->table_order_details. '.order_status'] = ORDER_STATUS['name']['PICKING_FROM_CUSTOMER'];
		// print_r($otp);
		// print_r($customer_id);
		$this->db->select('*, ' . $this->table_order_details.'.id AS id');
		$this->db->join('posted_item_variance', 'posted_item_variance.id=' . $this->table_order_details . '.posted_item_variance_id', 'left');
		$this->db->join('posted_item', 'posted_item.id=posted_item_variance.posted_item_id', 'left');
		$this->db->join('billing', 'billing.id=' . $this->table_order_details . '.billing_id', 'left');
		$this->db->join('deliverer', 'deliverer.id=' . $this->table_order_details . '.deliverer_id', 'left');
		$this->db->join('account', 'account.id=deliverer.account_id', 'left');
		$this->db->where($where);
		$query = $this->db->get($this->table_order_details);
		$orders = $query->result();
		// print_r($orders);
		foreach($orders as $order)
		{
			$this->update_order_status($order->id, ORDER_STATUS['name']['PICKING_FROM_CUSTOMER'], ORDER_STATUS['name']['DELIVERING_TO_TENANT']);
		}
		
		return ($orders !== null) ? $this->map_list($orders) : array();
	}
	
	public function get_all_from_otp_tenant_to_deliverer($otp, $deliverer_id)
	{
		$this->load->model('Deliverer_model');
		
		$where[$this->table_order_details. '.deliverer_id'] = $deliverer_id;
		$where[$this->table_order_details. '.otp_tenant_to_deliverer'] = $otp;
		$where[$this->table_order_details. '.order_status'] = ORDER_STATUS['name']['DELIVERING_TO_TENANT'];
		
		$this->db->select('*, ' . $this->table_order_details.'.id AS id');
		$this->db->join('posted_item_variance', 'posted_item_variance.id=' . $this->table_order_details . '.posted_item_variance_id', 'left');
		$this->db->join('posted_item', 'posted_item.id=posted_item_variance.posted_item_id', 'left');
		$this->db->join('tenant', 'tenant.id=posted_item.tenant_id', 'left');
		$this->db->where($where);
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		foreach($items as $item)
		{
			$this->update_order_status($item->id, ORDER_STATUS['name']['DELIVERING_TO_TENANT'], ORDER_STATUS['name']['TENANT_RECEIVED']);
		}
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_all_unpaid_by_tenants()
	{
		$result = array();
		
		$this->db->select('*,
			order_details.sold_price,
			order_details.quantity,
			order_details.voucher_id,
			posted_item.posted_item_name,
			posted_item.tenant_id,
			tenant.tenant_name
		');
		
		$where['order_details.tnt_paid_receipt_id'] = NULL;
		$where['order_details.order_status'] = ORDER_STATUS['name']['DONE'];
		$where['tenant.is_open'] = 1;
		
		$this->db->join('billing', 'billing.id = order_details.billing_id', 'left');
		
		$this->db->join('posted_item_variance', 'posted_item_variance.id = order_details.posted_item_variance_id', 'left');
		$this->db->join('posted_item', 'posted_item.id = posted_item_variance.posted_item_id', 'left');
		$this->db->join('tenant', 'tenant.id = posted_item.tenant_id', 'left');
		$this->db->join('voucher', 'voucher.id = order_details.voucher_id', 'left');
		
		$this->db->where($where);
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_unpaid_from_tenant_id($tenant_id)
	{
		$result = array();
		
		$this->db->select('*, 
			order_details.id AS id,
			order_details.sold_price,
			order_details.quantity,
			order_details.voucher_id,
			posted_item.posted_item_name,
			posted_item.tenant_id
		');
		
		$where['posted_item.tenant_id'] = $tenant_id;
		$where['order_details.tnt_paid_receipt_id'] = NULL;
		$where['order_details.order_status'] = ORDER_STATUS['name']['DONE'];
		
		$this->db->join('billing', 'billing.id = order_details.billing_id', 'left');
		
		$this->db->join('posted_item_variance', 'posted_item_variance.id = order_details.posted_item_variance_id', 'left');
		$this->db->join('posted_item', 'posted_item.id = posted_item_variance.posted_item_id', 'left');
		
		$this->db->where($where);
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_from_tnt_paid_receipt_id($tnt_paid_receipt_id)
	{
		$result = array();
		
		$this->db->select('*, 
			order_details.id AS id,
			order_details.sold_price,
			order_details.quantity,
			order_details.voucher_id,
			posted_item.posted_item_name,
			posted_item.tenant_id
		');
		
		$where['order_details.tnt_paid_receipt_id'] = $tnt_paid_receipt_id;
		// $where['order_details.order_status'] = ORDER_STATUS['name']['DONE'];
		
		$this->db->join('billing', 'billing.id = order_details.billing_id', 'left');
		
		$this->db->join('posted_item_variance', 'posted_item_variance.id = order_details.posted_item_variance_id', 'left');
		$this->db->join('posted_item', 'posted_item.id = posted_item_variance.posted_item_id', 'left');
		
		$this->db->where($where);
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_order_collection_task_from_deliverer_id()
	{
		$this->load->model('Deliverer_model');
		$cur_deliverer = $this->Deliverer_model->get_by_account_id($this->session->userdata('id'));
		
		$where['order_details.deliverer_id'] = $cur_deliverer->id;
		$where['order_status'] = ORDER_STATUS['name']['PICKING_FROM_TENANT'];
		
		$this->db->group_by('otp_deliverer_to_tenant');
		$this->db->join('posted_item_variance', 'posted_item_variance.id=' . $this->table_order_details . '.posted_item_variance_id', 'left');
		$this->db->join('posted_item', 'posted_item.id=posted_item_variance.posted_item_id', 'left');
		$this->db->join('tenant', 'tenant.id=posted_item.tenant_id', 'left');
		$this->db->where($where);
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_order_deliver_task_from_deliverer_id()
	{
		$this->load->model('Deliverer_model');
		$cur_deliverer = $this->Deliverer_model->get_by_account_id($this->session->userdata('id'));
		
		$where['order_details.deliverer_id'] = $cur_deliverer->id;
		$where['order_status'] = ORDER_STATUS['name']['DELIVERING_TO_CUSTOMER'];
		
		$this->db->group_by('otp_customer_to_deliverer');
		$this->db->join('billing', 'billing.id=' .$this->table_order_details . '.billing_id', 'left');
		$this->db->join('shipping_address', 'shipping_address.id=billing.shipping_address_id', 'left');
		$this->db->join('customer', 'customer.id=billing.customer_id', 'left');
		$this->db->join('account', 'account.id=customer.account_id', 'left');
		$this->db->where($where);
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_repair_collection_task_from_deliverer_id()
	{
		$this->load->model('Deliverer_model');
		$cur_deliverer = $this->Deliverer_model->get_by_account_id($this->session->userdata('id'));
		
		$where['order_details.deliverer_id'] = $cur_deliverer->id;
		$where['order_status'] = ORDER_STATUS['name']['PICKING_FROM_CUSTOMER'];
		
		$this->db->group_by('otp_deliverer_to_customer');
		$this->db->join('billing', 'billing.id=' . $this->table_order_details . '.billing_id', 'left');
		$this->db->join('shipping_address', 'shipping_address.id=billing.shipping_address_id', 'left');
		$this->db->join('customer', 'customer.id=billing.customer_id', 'left');
		$this->db->join('account', 'account.id=customer.account_id', 'left');
		$this->db->where($where);
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_repair_deliver_task_from_deliverer_id()
	{
		$this->load->model('Deliverer_model');
		$cur_deliverer = $this->Deliverer_model->get_by_account_id($this->session->userdata('id'));
		
		$where['order_details.deliverer_id'] = $cur_deliverer->id;
		$where['order_status'] = ORDER_STATUS['name']['DELIVERING_TO_TENANT'];
		
		$this->db->group_by('otp_tenant_to_deliverer');
		$this->db->join('posted_item_variance', 'posted_item_variance.id=' . $this->table_order_details . '.posted_item_variance_id', 'left');
		$this->db->join('posted_item', 'posted_item.id=posted_item_variance.posted_item_id', 'left');
		$this->db->join('tenant', 'tenant.id=posted_item.tenant_id', 'left');
		$this->db->where($where);
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function insert_from_cart($cart, $billing_id, $voucher_id=null)
	{
		$this->load->library('id_generator');
		$this->load->model('item_model');
		$this->load->model('posted_item_variance_model');
		$this->load->model('Order_status_history_model');
			
		$this->db->trans_start();
		
		foreach ($cart as $id => $cart_item)
		{
			$order_details = new Order_details_model();
			
			$posted_item_variance = $this->posted_item_variance_model->get_from_id($id);
			$posted_item_variance->init_posted_item();
			
			$order_details->id						= 0;
			$order_details->quantity				= $cart_item['quantity'];
			$order_details->offered_price			= $posted_item_variance->posted_item->price;
			$order_details->sold_price				= $cart_item['price'];
			$order_details->order_status			= ORDER_STATUS['name']['WAITING_FOR_PAYMENT'];
			$order_details->billing_id				= $billing_id;
			$order_details->posted_item_variance_id	= $id;
			$order_details->voucher_id				= $voucher_id;
			
			if ($this->db->insert($this->table_order_details, $order_details->get_db_from_stub()))
			{
				$order_details->id	= $this->db->insert_id();
			}
			
			$natural_id = $this->id_generator->generate(TYPE['name']['ORDER_DETAILS'], $order_details->id);
			$order_details->update_natural_id($natural_id);
			
			$this->Order_status_history_model->insert($order_details->id, $order_details->order_status);
		}
		
		$this->db->trans_complete();
	}
	
	public function insert_from_bid($price, $billing_id, $posted_item_variance_id)
	{
		$this->load->library('id_generator');
		$this->load->model('item_model');
		$this->load->model('posted_item_variance_model');
		$this->load->model('Order_status_history_model');
			
		$this->db->trans_start();
		
		$order_details = new Order_details_model();
		
		$posted_item_variance = $this->posted_item_variance_model->get_from_id($posted_item_variance_id);
		$posted_item_variance->init_posted_item();
		
		$order_details->id						= 0;
		$order_details->quantity				= 1;
		$order_details->offered_price			= $price;
		$order_details->sold_price				= $price;
		$order_details->order_status			= ORDER_STATUS['name']['WAITING_FOR_PAYMENT'];
		$order_details->billing_id				= $billing_id;
		$order_details->posted_item_variance_id	= $posted_item_variance_id;
		$order_details->voucher_id				= NULL;
		
		if ($this->db->insert($this->table_order_details, $order_details->get_db_from_stub()))
		{
			$order_details->id	= $this->db->insert_id();
		}
		
		$natural_id = $this->id_generator->generate(TYPE['name']['ORDER_DETAILS'], $order_details->id);
		$order_details->update_natural_id($natural_id);
		
		$this->Order_status_history_model->insert($order_details->id, $order_details->order_status);
		
		$this->db->trans_complete();
	}
	
	public function get_all_sold_item()
	{
		$this->db->where('tenant_id', $this->session->child_id);
		
		$this->db->join('posted_item_variance', $this->table_order_details. '.posted_item_variance_id=posted_item_variance.id', 'left');
		$this->db->join('posted_item', 'posted_item.id=posted_item_variance.posted_item_id', 'left');
		$this->db->join('billing', 'billing.id=' .$this->table_order_details . '.billing_id', 'left');
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function assign_deliverer()
	{
		$temp_order_ids		= $this->input->post('order_id');
		$temp_deliverer_ids	= $this->input->post('deliverer_id');
		$otp_list			= array();
		$otp_repair_list	= array();
		
		foreach($temp_order_ids as $key => $temp_order_id)
		{
			$id_deliverer	= $this->input->post('deliverer_id')[$key];
			$id_tenant		= $this->input->post('tenant_id')[$key];
			$id_customer	= $this->input->post('customer_id')[$key];
			
			$order_id 		= $this->input->post('order_id')[$key];
			$deliverer_id	= $this->deliverer_model->get_from_id($id_deliverer)->account_id;
			$tenant_id		= $this->tenant_model->get_from_id($id_tenant)->account_id;
			$customer_id	= $this->customer_model->get_from_id($id_customer)->account_id;
			$item_type		= $this->input->post('item_type')[$key];
			
			if ($item_type == "ORDER" || $item_type == "FLASH" || $item_type == "BID") // Kalau order OTP masukin 2 saja
			{
				if (!isset($otp_list[$deliverer_id][$tenant_id]))
				{
					$otp_list[$deliverer_id][$tenant_id] = $this->get_available_otp(TYPE['name']['TENANT'], $tenant_id);
				}
				if (!isset($otp_list[$customer_id][$deliverer_id]))
				{
					$otp_list[$customer_id][$deliverer_id] = $this->get_available_otp(TYPE['name']['DELIVERER'], $deliverer_id);
				}
			}
			else if ($item_type == "REPAIR") // Setelah repair finish baru kirim otp yg order
			{
				if (!isset($otp_repair_list[$tenant_id][$deliverer_id]))
				{
					$otp_repair_list[$tenant_id][$deliverer_id] = $this->get_available_otp(TYPE['name']['DELIVERER'], $deliverer_id);
				}
				if (!isset($otp_repair_list[$deliverer_id][$customer_id]))
				{
					$otp_repair_list[$deliverer_id][$customer_id] = $this->get_available_otp(TYPE['name']['CUSTOMER'], $customer_id);
				}
			}
			// update deliverer id for each order id
			$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
			
			$this->db->set('deliverer_id', $id_deliverer);
			if ($item_type == "ORDER" || $item_type == "FLASH" || $item_type == "BID") // Kalau repair set otp tambahan
			{
				$this->db->set('otp_deliverer_to_tenant', $otp_list[$deliverer_id][$tenant_id]);
				$this->db->set('otp_customer_to_deliverer', $otp_list[$customer_id][$deliverer_id]);
			}
			else if ($item_type == "REPAIR") // Kalau repair set otp tambahan
			{
				$this->db->set('otp_tenant_to_deliverer', $otp_repair_list[$tenant_id][$deliverer_id]);
				$this->db->set('otp_deliverer_to_customer', $otp_repair_list[$deliverer_id][$customer_id]);
			}
			$this->db->where('id', $order_id);
			$this->db->update($this->table_order_details);
			if ($item_type == "ORDER") // Kalau order deliverer pergi ke tenant
			{
				$this->update_order_status($order_id, ORDER_STATUS['name']['QUEUED'], ORDER_STATUS['name']['PICKING_FROM_TENANT']);
			}
			else if ($item_type == "REPAIR") // Kalau repair deliverer pergi ke customer
			{
				$this->update_order_status($order_id, ORDER_STATUS['name']['QUEUED'], ORDER_STATUS['name']['PICKING_FROM_CUSTOMER']);
			}
			else if (($item_type == "BID") || ($item_type == "FLASH"))
			{
				$this->update_order_status($order_id, ORDER_STATUS['name']['QUEUED'], ORDER_STATUS['name']['DELIVERING_TO_CUSTOMER']);
			}
			$this->db->trans_complete(); // selesai nge lock db transaction
			
		}
		foreach($otp_list as $customer_id => $otp_deliverer)
		{
			foreach($otp_deliverer as $deliverer_id => $otp)
			{
				$this->send_otp_to_customer($customer_id, $deliverer_id, $otp);
			}
		}
		
		foreach($otp_repair_list as $tenant_id => $otp_deliverer)
		{
			foreach($otp_deliverer as $deliverer_id => $otp)
			{
				$this->send_otp_to_tenant($tenant_id, $deliverer_id, $otp);
			}
		}
	}
	
	public function cancel_repair($order_id)
	{	
		// Dapetin ID Account Tenant
		$this->db->select('tenant.account_id');
		$this->db->where($this->table_order_details. '.id', $order_id);
		$this->db->join('posted_item_variance', 'posted_item_variance.id=order_details.posted_item_variance_id', 'left');
		$this->db->join('posted_item', 'posted_item.id=posted_item_variance.posted_item_id', 'left');
		$this->db->join('tenant', 'tenant.id=posted_item.tenant_id', 'left');
		$query = $this->db->get('order_details', 1);
		$item = $query->row();
		$tenant_id = $item->account_id;
		
		// Dapetin ID Account Customer
		$this->db->select('customer.account_id');
		$this->db->where('order_details.id', $order_id);
		$this->db->join('billing', 'billing.id=order_details.billing_id', 'left');
		$this->db->join('customer', 'customer.id=billing.customer_id', 'left');
		$query = $this->db->get('order_details', 1);
		$item = $query->row();
		$customer_id = $item->account_id;
		
		// Dapetin ID Account Deliverer
		$this->db->select('deliverer.account_id');
		$this->db->where('order_details.id', $order_id);
		$this->db->join('deliverer', 'deliverer.id=order_details.deliverer_id', 'left');
		$query = $this->db->get('order_details', 1);
		$item = $query->row();
		$deliverer_id = $item->account_id;
		
		$this->db->trans_start();
		
		$this->Order_details_model->update_order_status($order_id, ORDER_STATUS['name']['TENANT_RECEIVED'], ORDER_STATUS['name']['PICKING_FROM_TENANT']);
		$otp_deliverer_to_tenant = $this->get_available_otp(TYPE['name']['TENANT'], $tenant_id);
		$otp_customer_to_deliverer = $this->get_available_otp(TYPE['name']['DELIVERER'], $deliverer_id);

		$this->db->set('otp_deliverer_to_tenant', $otp_deliverer_to_tenant);
		$this->db->set('otp_customer_to_deliverer', $otp_customer_to_deliverer);
		$this->db->where('id', $order_id);
		$this->db->update('order_details');
		
		$this->Order_details_model->send_otp_to_customer($customer_id, $deliverer_id, $otp_customer_to_deliverer);
		
		$this->db->trans_complete();
	}
	
	public function notify_repair_finished($order_id)
	{	
		// Dapetin ID Account Tenant
		$this->db->select('tenant.account_id');
		$this->db->where($this->table_order_details. '.id', $order_id);
		$this->db->join('posted_item_variance', 'posted_item_variance.id=order_details.posted_item_variance_id', 'left');
		$this->db->join('posted_item', 'posted_item.id=posted_item_variance.posted_item_id', 'left');
		$this->db->join('tenant', 'tenant.id=posted_item.tenant_id', 'left');
		$query = $this->db->get('order_details', 1);
		$item = $query->row();
		$tenant_id = $item->account_id;
		
		// Dapetin ID Account Customer
		$this->db->select('customer.account_id');
		$this->db->where('order_details.id', $order_id);
		$this->db->join('billing', 'billing.id=order_details.billing_id', 'left');
		$this->db->join('customer', 'customer.id=billing.customer_id', 'left');
		$query = $this->db->get('order_details', 1);
		$item = $query->row();
		$customer_id = $item->account_id;
		
		// Dapetin ID Account Deliverer
		$this->db->select('deliverer.account_id');
		$this->db->where('order_details.id', $order_id);
		$this->db->join('deliverer', 'deliverer.id=order_details.deliverer_id', 'left');
		$query = $this->db->get('order_details', 1);
		$item = $query->row();
		$deliverer_id = $item->account_id;
		
		$this->db->trans_start();
		
		$this->Order_details_model->update_order_status($order_id, ORDER_STATUS['name']['REPAIRING'], ORDER_STATUS['name']['PICKING_FROM_TENANT']);
		$otp_deliverer_to_tenant = $this->get_available_otp(TYPE['name']['TENANT'], $tenant_id);
		$otp_customer_to_deliverer = $this->get_available_otp(TYPE['name']['DELIVERER'], $deliverer_id);

		$this->db->set('otp_deliverer_to_tenant', $otp_deliverer_to_tenant);
		$this->db->set('otp_customer_to_deliverer', $otp_customer_to_deliverer);
		$this->db->where('id', $order_id);
		$this->db->update('order_details');
		
		$this->Order_details_model->send_otp_to_customer($customer_id, $deliverer_id, $otp_customer_to_deliverer);
		
		$this->db->trans_complete();
	}
	
	public function update_order_status($order_id, $cur_status, $status, $delivery_receipt_no="")
	{
		// if ($customer_id != 0)
		// {
			// // $this->db->join('billing', 'order_details.billing_id = billing.id', 'left');
			// // $this->db->where('billing.customer_id', $customer_id);
			// // $this->db->where('order_details.billing_id = billing.id');
		// }
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$this->db->where('order_details.id', $order_id);
		$this->db->where('order_details.order_status', $cur_status);
		
		$this->db->set('order_details.order_status', $status);
		if ($delivery_receipt_no != "") $this->db->set('order_details.delivery_receipt_no', $delivery_receipt_no);
		$result = $this->db->update('order_details');
		$affected_rows = $this->db->affected_rows();
		
		if ($affected_rows > 0)
		{
			$this->load->model('Order_status_history_model');
			$this->Order_status_history_model->insert($order_id, $status);
		}
		
		$this->db->trans_complete(); // selesai nge lock db transaction
		
		return $affected_rows;
	}
	
	public function update_delivery_receipt_no($order_id, $delivery_receipt_no)
	{
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$this->db->where('order_details.id', $order_id);
		
		$this->db->set('order_details.delivery_receipt_no', $delivery_receipt_no);
		$result = $this->db->update('order_details');
		
		$this->db->trans_complete(); // selesai nge lock db transaction
		
		return $result;
	}
	
	public function update_tenant_pay_receipt_id($list_order_detail_id, $tenant_pay_receipt_id)
	{
		$this->db->where('id', '0');
		foreach ($list_order_detail_id as $order_detail_id)
		{
			$this->db->or_where('id', $order_detail_id);
		}
		
		$this->db->set('tnt_paid_receipt_id', $tenant_pay_receipt_id);
		return $this->db->update('order_details');
	}
	
	public function update_natural_id($natural_id)
	{	
		$this->order_id = $natural_id;
		
		$this->db->set('order_id', $natural_id)
				 ->where('id', $this->id)
				 ->update($this->table_order_details);
	}
	
	public function set_all_paid_from_billing_id($billing_id)
	{
		$this->db->set('order_status', ORDER_STATUS['name']['QUEUED'])
				 ->where('billing_id', $billing_id)
				 ->where('order_status', ORDER_STATUS['name']['WAITING_FOR_PAYMENT'])
				 ->update($this->table_order_details);
		
		$this->db->set('order_status', ORDER_STATUS['name']['REPAIRING'])
				 ->where('billing_id', $billing_id)
				 ->where('order_status', ORDER_STATUS['name']['COST_CALCULATED'])
				 ->update($this->table_order_details);
				 
		$this->load->model('Order_status_history_model');
		$order_details = $this->get_all_from_billing_id($billing_id);
		foreach ($order_details as $order_detail)
		{
			$this->Order_status_history_model->insert($order_detail->order_id, ORDER_STATUS['name']['QUEUED']);
		}
	}
	
	// otp_receiver_type: CUSTOMER, TENANT, DELIVERER
	// otp_receiver_id: id dari Customer, Tenant, atau Deliverer yang akan memasukkan OTP
	public function get_available_otp($otp_receiver_type, $otp_receiver_id)
	{
		$this->load->library('otp_generator');
		$is_available = false;
		$otp = '';
		
		$i = 0; //biar ga infinite loop
		while ((!$is_available) && ($i < 100))
		{
			$otp = $this->otp_generator->generate();
			$is_available = $this->is_otp_available($otp, $otp_receiver_type, $otp_receiver_id);
			$i++;
		}
		
		return $otp;
	}
	
	// otp_receiver_type: CUSTOMER, TENANT, DELIVERER
	// otp_receiver_id: id dari Customer, Tenant, atau Deliverer yang akan memasukkan OTP
	public function is_otp_available($otp, $otp_receiver_type, $otp_receiver_id)
	{
		$result = false;
		
		if ($otp_receiver_type == TYPE['name']['CUSTOMER'])
		{
			$this->db->where('order_status', ORDER_STATUS['name']['PICKING_FROM_CUSTOMER']);
			$this->db->where('customer_id', $otp_receiver_id);
			$this->db->join('billing', 'billing.id=' .$this->table_order_details . '.billing_id', 'left');
			$query = $this->db->get($this->table_order_details);
			$result = ($query->result() == null);
		}
		else if ($otp_receiver_type == TYPE['name']['TENANT'])
		{
			$this->db->where('order_status', ORDER_STATUS['name']['PICKING_FROM_TENANT']);
			$this->db->where('tenant_id', $otp_receiver_id);
			$this->db->join('posted_item_variance', $this->table_order_details. '.posted_item_variance_id = posted_item_variance.id', 'left');
			$this->db->join('posted_item', 'posted_item.id = posted_item_variance.posted_item_id', 'left');
			$query = $this->db->get($this->table_order_details);
			$result = ($query->result() == null);
		}
		else if ($otp_receiver_type == TYPE['name']['DELIVERER'])
		{
			$this->db
				->group_start()
					->where('order_status', ORDER_STATUS['name']['DELIVERING_TO_CUSTOMER'])
					->or_where('order_status', ORDER_STATUS['name']['DELIVERING_TO_TENANT'])
				->group_end()
				->where('deliverer_id', $otp_receiver_id);
			$query = $this->db->get($this->table_order_details);
			$result = ($query->result() == null);
		}
		
		return $result;
	}
	
	public function send_otp_to_customer($customer_id, $deliverer_id, $otp)
	{
		$cur_deliverer = $this->account_model->get_from_id($deliverer_id);
		
		$this->load->model('message_inbox_model');
		$party_one_id = $this->session->id;
		$party_two_id = $customer_id;
		$cur_message_inbox = $this->message_inbox_model->get_from_parties_id($party_one_id, $party_two_id);
		
		if ($cur_message_inbox == null)
		{
			$cur_message_inbox = new message_inbox_model();
			$cur_message_inbox->insert_from_parties_id($party_one_id, $party_two_id);
		}
		
		$this->load->model('message_text_model');
		$cur_message_text = new message_text_model();
		$cur_message_text->message_inbox_id = $cur_message_inbox->id;
		$cur_message_text->sender_id = $this->session->id;
		$cur_message_text->text = "Nama Pengirim: " . $cur_deliverer->name . ", Kode OTP: ". $otp;
		$cur_message_text->insert_from_stub();
	}
	
	public function send_otp_to_tenant($tenant_id, $deliverer_id, $otp)
	{
		$cur_deliverer = $this->account_model->get_from_id($deliverer_id);
		
		$this->load->model('message_inbox_model');
		$party_one_id = $this->session->id;
		$party_two_id = $tenant_id;
		$cur_message_inbox = $this->message_inbox_model->get_from_parties_id($party_one_id, $party_two_id);
		
		if ($cur_message_inbox == null)
		{
			$cur_message_inbox = new message_inbox_model();
			$cur_message_inbox->insert_from_parties_id($party_one_id, $party_two_id);
		}
		
		$this->load->model('message_text_model');
		$cur_message_text = new message_text_model();
		$cur_message_text->message_inbox_id = $cur_message_inbox->id;
		$cur_message_text->sender_id = $this->session->id;
		$cur_message_text->text = "Nama Pengirim: " . $cur_deliverer->name . ", Kode OTP: ". $otp;
		$cur_message_text->insert_from_stub();
	}
	
	public function get_delivery_information()
	{
		$query = $this->db->query('
			SELECT 
				billing.delivery_method,
				billing.delivery_type,
				billing.bill_id,
				tenant.tenant_name,
				account.name AS customer_name,
				account.phone_number,
				shipping_address.city,
				shipping_address.kecamatan,
				shipping_address.kelurahan,
				shipping_address.postal_code,
				shipping_address.address_detail,
				posted_item.posted_item_name,
				order_details.quantity
			FROM order_details
				LEFT JOIN billing
					ON order_details.billing_id = billing.id
				LEFT JOIN shipping_address
					ON billing.shipping_address_id = shipping_address.id
				LEFT JOIN customer
					ON billing.customer_id = customer.id
				LEFT JOIN account
					ON customer.account_id = account.id
				LEFT JOIN posted_item_variance
					ON order_details.posted_item_variance_id = posted_item_variance.id
				LEFT JOIN posted_item
					ON posted_item_variance.posted_item_id = posted_item.id
				LEFT JOIN tenant
					ON posted_item.tenant_id = tenant.id
			WHERE order_details.id = '.$this->id.'
		');
		
		$result = $query->row();
		
		return $result;
	}
	
	public function get_tenants_to_pay()
	{
		$where[$this->table_order_details.'.tnt_paid_receipt_id'] = null;
		
		$this->db->join('posted_item_variance', $this->table_order_details. '.posted_item_variance_id=posted_item_variance.id', 'left');
		$this->db->join('posted_item', 'posted_item.id=posted_item_variance.posted_item_id', 'left');
		$this->db->join('billing', 'billing.id=' .$this->table_order_details . '.billing_id', 'left');
		$this->db->where($where);
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function is_choosen($posted_item_id)
	{
		$where['posted_item.id'] = $posted_item_id;
		
		$this->db->join('posted_item_variance', $this->table_order_details. '.posted_item_variance_id=posted_item_variance.id', 'left');
		$this->db->join('posted_item', 'posted_item.id=posted_item_variance.posted_item_id', 'left');
		$this->db->join('billing', 'billing.id=' .$this->table_order_details . '.billing_id', 'left');
		$this->db->where($where);
		$this->db->where('billing.date_closed >',  date('Y-m-d H:i:s'));
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		return (count($items) > 0);
	}
	
	public function count_queued_item()
	{
		$this->db->select('
			COUNT(order_details.id) AS queued_item
		');
		
		$this->db->where('order_details.order_status', ORDER_STATUS['name']['QUEUED']);
		$this->db->where('order_details.deliverer_id = ', NULL);
		
		$this->db->group_by('order_details.id');
		$this->db->distinct();
		
		$query = $this->db->get($this->table_order_details, 1);
		
		$result = $query->row();
		
		return ($result != null) ? $result->queued_item : 0;
	}
	
	public function count_unpaid_tenant()
	{
		$this->db->select('
			COUNT(order_details.id) AS unpaid_tenant
		');
		
		$where['order_details.tnt_paid_receipt_id'] = NULL;
		$where['order_details.order_status'] = ORDER_STATUS['name']['DONE'];
		$where['posted_item.item_type != '] = "BID";
		
		$this->db->join('posted_item_variance', 'posted_item_variance.id=' . $this->table_order_details . '.posted_item_variance_id', 'left');
		$this->db->join('posted_item', 'posted_item.id=posted_item_variance.posted_item_id', 'left');
		$this->db->where($where);
		
		$this->db->group_by('order_details.id');
		$this->db->distinct();
		
		$query = $this->db->get($this->table_order_details, 1);
		
		$result = $query->row();
		
		return ($result != null) ? $result->unpaid_tenant : 0;
	}
	
	public function count_all_unread_order_tenant()
	{
		$this->db->select('
			COUNT(order_details.id) AS unread_order
		');
		
		$this->db->join('order_status_history', 'order_status_history.order_details_id = order_details.id', 'left');
		$this->db->join('posted_item_variance', 'posted_item_variance.id = order_details.posted_item_variance_id', 'left');
		$this->db->join('posted_item', 'posted_item.id = posted_item_variance.posted_item_id', 'left');
		
		$this->db->where('0', "1");
		$this->db->or_group_start();
			foreach(ORDER_NOTIFICATION["TENANT"] as $order_notification)
				$this->db->or_where('order_status_history.status', $order_notification);
		$this->db->group_end();
		
		$this->db->where('order_status_history.is_read_tenant', 0);
		$this->db->where('posted_item.tenant_id', $this->session->child_id);
		
		$this->db->group_by('order_details.id');
		$this->db->distinct();
		
		$query = $this->db->get($this->table_order_details, 1);
		
		$result = $query->row();
		
		return ($result != null) ? $result->unread_order : 0;
	}
	
	public function count_unread_order_status_tenant()
	{
		$this->db->select('
			COUNT(order_status_history.id) AS unread_order_status
		');
		
		$this->db->join('order_status_history', 'order_status_history.order_details_id = order_details.id', 'left');
		
		$this->db->where('0', "1");
		$this->db->or_group_start();
			foreach(ORDER_NOTIFICATION["TENANT"] as $order_notification)
				$this->db->or_where('order_status_history.status', $order_notification);
		$this->db->group_end();
		
		$this->db->where('order_details.id', $this->id);
		$this->db->where('order_status_history.is_read_tenant', 0);
		
		$query = $this->db->get($this->table_order_details, 1);
		
		$result = $query->row();
		
		return ($result != null) ? $result->unread_order_status : 0;
	}
	
	public function mark_as_read_order_status_tenant()
	{
		return $this->db->set('is_read_tenant', 1)
						// ->join('order_details', 'order_status_history.order_details_id = order_details.id', 'left');
						// ->join('billing', 'order_details.billing_id = billing.id', 'left');
						->where('order_details_id', $this->id)
						// ->where('billing.customer_id', $this->session->child_id)
						->update($this->table_order_status_history);
						
		return ($result != null) ? $result->queued_item : 0;
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
	
	public function init_voucher()
	{
		$this->voucher->get_from_id($this->voucher_id);
		return $this->voucher;
	}
}

?>