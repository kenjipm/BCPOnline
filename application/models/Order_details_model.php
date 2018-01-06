<?php

class Order_details_model extends CI_Model {
	
	private $table_order_details = 'order_details';
	
	// table attribute
	public $id;
	public $order_id;
	public $quantity;
	public $offered_price;
	public $sold_price;
	public $order_status;
	public $otp_deliverer_to_tenant;
	public $collection_method;
	public $otp_customer_to_deliverer;
	public $otp_tenant_to_deliverer;
	public $date_repr_decided;
	public $billing_id;
	public $posted_item_variance_id;
	public $deliverer_id;
	public $tnt_paid_receipt_id;
	public $voucher_cut_price;
	
	// relation table
	public $billing;
	public $posted_item_variance;
	public $feedback;
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
		$this->otp_deliverer_to_tenant			= "";
		$this->collection_method		= "";
		$this->otp_customer_to_deliverer			= "";
		$this->otp_tenant_to_deliverer		= "";
		$this->date_repr_decided		= "";
		$this->billing_id				= 0;
		$this->posted_item_variance_id	= 0;
		$this->deliverer_id				= NULL;
		$this->tnt_paid_receipt_id		= NULL;
		$this->voucher_cut_price		= 0;
		
		$this->load->model('billing_model');
		$this->load->model('posted_item_variance_model');
		$this->load->model('item_model');
		$this->load->model('deliverer_model');
		$this->load->model('tenant_model');
		$this->load->model('account_model');
		$this->load->model('shipping_address_model');
		$this->load->model('feedback_model');
		
		$this->billing								= new Billing_model();
		$this->deliverer							= new Deliverer_model();
		$this->deliverer->account					= new Account_model();
		$this->posted_item_variance					= new Posted_item_variance_model();
		$this->posted_item_variance->posted_item	= new Item_model();
		$this->feedback								= new Feedback_model();
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
		$this->otp_deliverer_to_tenant			= $db_item->otp_deliverer_to_tenant;
		$this->collection_method		= $db_item->collection_method;
		$this->otp_customer_to_deliverer			= $db_item->otp_customer_to_deliverer;
		$this->otp_tenant_to_deliverer		= $db_item->otp_tenant_to_deliverer;
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
		$db_item->otp_deliverer_to_tenant			= $this->otp_deliverer_to_tenant;
		$db_item->collection_method			= $this->collection_method;
		$db_item->otp_customer_to_deliverer				= $this->otp_customer_to_deliverer;
		$db_item->otp_tenant_to_deliverer		= $this->otp_tenant_to_deliverer;
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
		$stub = new Order_details_model();
		
		$stub->id						= $db_item->id;
		$stub->order_id					= $db_item->order_id;
		$stub->quantity					= $db_item->quantity;
		$stub->offered_price			= $db_item->offered_price;
		$stub->sold_price				= $db_item->sold_price;
		$stub->order_status				= $db_item->order_status;
		$stub->otp_deliverer_to_tenant			= $db_item->otp_deliverer_to_tenant;
		$stub->collection_method		= $db_item->collection_method;
		$stub->otp_customer_to_deliverer			= $db_item->otp_customer_to_deliverer;
		$stub->otp_tenant_to_deliverer		= $db_item->otp_tenant_to_deliverer;
		$stub->date_repr_decided		= $db_item->date_repr_decided;
		$stub->billing_id				= $db_item->billing_id;
		$stub->posted_item_variance_id	= $db_item->posted_item_variance_id;
		$stub->deliverer_id				= $db_item->deliverer_id;
		$stub->tnt_paid_receipt_id		= $db_item->tnt_paid_receipt_id;
		$stub->voucher_cut_price		= $db_item->voucher_cut_price;
		
		$stub->posted_item_variance						= new Posted_item_variance_model();
		$stub->posted_item_variance->var_type			= $db_item->var_type ?? "";
		$stub->posted_item_variance->var_description	= $db_item->var_description ?? "";
		
		$stub->posted_item_variance->posted_item					= new Item_model();
		$stub->posted_item_variance->posted_item->posted_item_name	= $db_item->posted_item_name ?? "";
		
		$stub->billing						= new Billing_model();
		$stub->billing->shipping_address_id	= $db_item->shipping_address_id ?? "";
		$stub->billing->date_created		= $db_item->date_created ?? "";
		
		$stub->billing->shipping_address					= new Shipping_address_model();
		$stub->billing->shipping_address->address_detail	= $db_item->address_detail ?? "";
		
		$stub->deliverer				= new Deliverer_model();
		$stub->deliverer->account		= new Account_model();
		$stub->deliverer->account->name	= $db_item->name ?? "";
		
		$stub->tenant		= new Tenant_model();
		$stub->tenant->name = $db_item->tenant_name ?? "";
		
		$stub->feedback					= new Feedback_model();
		$stub->feedback->feedback_text 	= $db_item->feedback_text ?? "";
		$stub->feedback->rating		 	= $db_item->rating ?? "";
		
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
		$this->db->join('posted_item_variance', 'posted_item_variance.id=' . $this->table_order_details . '.posted_item_variance_id', 'left');
		$this->db->join('posted_item', 'posted_item.id=posted_item_variance.posted_item_id', 'left');
		$this->db->join('deliverer', 'deliverer.id=' .$this->table_order_details . '.deliverer_id', 'left');
		$this->db->join('account', 'account.id=deliverer.account_id', 'left');
		$this->db->join('feedback', 'feedback.order_det_id='. $this->table_order_details . '.id', 'left');
		$this->db->join('billing', 'billing.id='. $this->table_order_details . '.billing_id', 'left');
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
		
		$this->db->select('*, ' . $this->table_order_details.'.id AS id');
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
		$this->db->where($where);
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
		$this->db->where($where);
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		foreach($items as $item)
		{
			$this->update_order_status($item->id, ORDER_STATUS['name']['PICKING_FROM_TENANT'], ORDER_STATUS['name']['DELIVERING_TO_CUSTOMER']);
		}
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_collection_task_from_deliverer_id()
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
	
	public function get_deliver_task_from_deliverer_id()
	{
		$this->load->model('Deliverer_model');
		$cur_deliverer = $this->Deliverer_model->get_by_account_id($this->session->userdata('id'));
		
		$where['order_details.deliverer_id'] = $cur_deliverer->id;
		$where['order_status'] = ORDER_STATUS['name']['DELIVERING_TO_CUSTOMER'];
		
		$this->db->group_by('billing.shipping_address_id');
		$this->db->join('billing', 'billing.id=' .$this->table_order_details . '.billing_id', 'left');
		$this->db->join('shipping_address', 'shipping_address.id=billing.shipping_address_id', 'left');
		$this->db->join('customer', 'customer.id=billing.customer_id', 'left');
		$this->db->join('account', 'account.id=customer.account_id', 'left');
		$this->db->where($where);
		$query = $this->db->get($this->table_order_details);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function insert_from_cart($cart, $billing_id)
	{
		$this->load->library('id_generator');
		$this->load->model('item_model');
		$this->load->model('posted_item_variance_model');
			
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
			
			if ($this->db->insert($this->table_order_details, $order_details->get_db_from_stub()))
			{
				$order_details->id	= $this->db->insert_id();
			}
			
			$natural_id = $this->id_generator->generate(TYPE['name']['ORDER_DETAILS'], $order_details->id);
			$order_details->update_natural_id($natural_id);
		}
		
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
	
	public function update_order_status($order_id, $cur_status, $status)
	{
		$cur_tenant_id = 
		$this->db->set('order_status', $status)
				 ->where('id', $order_id)
				 ->where('order_status', $cur_status)
				 ->update($this->table_order_details);
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
				 ->update($this->table_order_details);
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