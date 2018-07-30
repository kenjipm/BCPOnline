<?php

class Billing_model extends CI_Model {
	
	// Nama tabel di DB
	private $table_billing = 'billing';
	private $table_order_details = 'order_details';
	private $table_order_status_history = 'order_status_history';
	
	// table attribute
	public $id;
	public $bill_id;
	public $delivery_method;
	public $delivery_type;
	public $date_created;
	public $date_closed;
	public $total_payable;
	public $customer_id;
	public $shipping_address_id;
	public $shipping_charge_id;
	
	// relation table
	public $customer;
	public $shipping_address;
	public $shipping_charge;
	public $payments;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id					= 0;
		$this->bill_id				= "";
		$this->delivery_method		= "";
		$this->delivery_type		= "";
		$this->date_created			= date("Y-m-d H:i:s");
		$this->date_closed			= date("Y-m-d H:i:s", strtotime("+".INVOICE_DUE." days"));
		$this->total_payable		= 0;
		$this->customer_id			= 0;
		$this->shipping_address_id	= NULL;
		$this->shipping_charge_id	= NULL;
		$this->setting_reward_id	= 0; // Dummy
		
		$this->load->model('customer_model');
		$this->load->model('shipping_address_model');
		$this->load->model('shipping_charge_model');
		
		$this->customer				= new Customer_model();
		$this->shipping_address		= new Shipping_address_model();
		$this->shipping_charge		= new Shipping_charge_model();
		
		$this->payments				= array();
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->bill_id				= $db_item->bill_id;
		$this->delivery_method		= $db_item->delivery_method;
		$this->delivery_type		= $db_item->delivery_type;
		$this->date_created			= $db_item->date_created;
		$this->date_closed			= $db_item->date_closed;
		$this->total_payable		= $db_item->total_payable;
		$this->customer_id			= $db_item->customer_id;
		$this->shipping_address_id	= $db_item->shipping_address_id;
		$this->shipping_charge_id	= $db_item->shipping_charge_id;
		
		$this->customer				= new Customer_model();
		$this->shipping_address		= new Shipping_address_model();
		$this->shipping_charge		= new Shipping_charge_model();
		
		$this->customer->account				= new Account_model();
		$this->customer->account->name			= $db_item->name ?? "";
		$this->shipping_address->address_detail	= $db_item->address_detail ?? "";
		$this->shipping_charge->fee_amount		= $db_item->fee_amount ?? 0;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id					= $this->id;
		$db_item->bill_id				= $this->bill_id;
		$db_item->delivery_method		= $this->delivery_method;
		$db_item->delivery_type			= $this->delivery_type;
		$db_item->date_created			= $this->date_created;
		$db_item->date_closed			= $this->date_closed;
		$db_item->total_payable			= $this->total_payable;
		$db_item->customer_id			= $this->customer_id;
		$db_item->shipping_address_id	= $this->shipping_address_id;
		$db_item->shipping_charge_id	= $this->shipping_charge_id;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Billing_model();
		
		$stub->id					= $db_item->id;
		$stub->bill_id				= $db_item->bill_id;
		$stub->delivery_method		= $db_item->delivery_method;
		$stub->delivery_type		= $db_item->delivery_type;
		$stub->date_created			= $db_item->date_created;
		$stub->date_closed			= $db_item->date_closed;
		$stub->total_payable		= $db_item->total_payable;
		$stub->customer_id			= $db_item->customer_id;
		$stub->shipping_address_id	= $db_item->shipping_address_id;
		$stub->shipping_charge_id	= $db_item->shipping_charge_id;
		
		$stub->customer->account				= new Account_model();
		$stub->customer->account->name			= $db_item->name ?? "";
		$stub->shipping_address->address_detail	= $db_item->address_detail ?? "";
		$stub->shipping_charge->fee_amount		= $db_item->fee_amount ?? 0;
		
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
	
	//get all billing
	public function get_all()
	{
		$this->load->model('Billing_model');
		
		$this->db->select('*, ' . $this->table_billing.'.id AS id');
		$this->db->join('customer', 'customer.id=' . $this->table_billing . '.customer_id', 'left');
		$this->db->join('account', 'account.id=customer.account_id', 'left');
		$this->db->join('shipping_address', 'shipping_address.id=' . $this->table_billing . '.shipping_address_id', 'left');
		$this->db->join('shipping_charge', 'shipping_charge.id=' . $this->table_billing . '.shipping_charge_id', 'left');
		
		$query = $this->db->get($this->table_billing);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	//get all billing
	public function get_all_from_customer_id($customer_id)
	{
		$this->load->model('Billing_model');
		
		$this->db->where('customer_id', $customer_id);
		$this->db->order_by('date_created', 'DESC');
		$query = $this->db->get($this->table_billing);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	// get item detail
	public function get_from_id($id)
	{
		$this->load->model('Billing_model');
		$where['billing.id'] = $id;
		
		$this->db->select('*, ' . $this->table_billing.'.id AS id, ' . $this->table_billing.'.customer_id AS customer_id');
		$this->db->join('customer', 'customer.id=' . $this->table_billing . '.customer_id', 'left');
		$this->db->join('account', 'account.id=customer.account_id', 'left');
		$this->db->join('shipping_address', 'shipping_address.id=' . $this->table_billing . '.shipping_address_id', 'left');
		$this->db->join('shipping_charge', 'shipping_charge.id=' . $this->table_billing . '.shipping_charge_id', 'left');
		
		$this->db->where($where);
		$query = $this->db->get($this->table_billing, 1);
		$item = $query->row();
		
		return ($item !== null) ? $this->get_stub_from_db($item) : new Billing_model();
	}
	
	public function get_from_create_new($cart, $shipping_address, $shipping_charge)
	{
		$this->load->model('posted_item_variance_model');
		foreach ($cart as $id => $cart_item)
		{
			$posted_item_variance = $this->posted_item_variance_model->get_from_id($id);
			$posted_item_variance->init_posted_item();
			
			$posted_item_variance->posted_item->get_hot_item();
			$posted_item_variance->posted_item->is_hot_item = ($posted_item_variance->posted_item->hot_item != null);
			
			$this->total_payable += $cart_item['quantity'] * ($posted_item_variance->posted_item->is_hot_item ? $posted_item_variance->posted_item->hot_item->promo_price : $posted_item_variance->posted_item->price);
		}
		
		$this->total_payable		+= $shipping_charge->fee_amount;
		$this->customer_id			= $this->session->child_id;
		$this->shipping_address_id	= $shipping_address->id ?? 0;
		$this->shipping_charge_id	= $shipping_charge->id ?? 0;
		
		return $this;
	}
	
	public function insert($custom_type="", $custom_id="")
	{
		$this->load->library('id_generator');
		
		$this->db->trans_start();
		
		if ($this->db->insert($this->table_billing, $this))
		{
			$this->id	= $this->db->insert_id();
		}
		
		$natural_id = $this->id_generator->generate(TYPE['name']['BILLING'], ($custom_id=="")?$this->id:$custom_id, $custom_type);
		$this->update_natural_id($natural_id);
		
		$this->db->trans_complete();
	}
	
	public function update()
	{
		$db_item = $this->get_db_from_stub();
		$this->db->set('delivery_method', $db_item->delivery_method)
				 ->set('total_payable', $db_item->total_payable)
				 ->set('shipping_address_id', $db_item->shipping_address_id)
				 ->set('shipping_charge_id', $db_item->shipping_charge_id)
				 ->where('id', $db_item->id)
				 ->update($this->table_billing);
	}
	
	public function count_all_unread_billing_customer()
	{
		$this->db->select('
			COUNT(billing.id) AS unread_billing
		');
		
		$this->db->join('order_details', 'order_details.billing_id = billing.id', 'left');
		$this->db->join('order_status_history', 'order_status_history.order_details_id = order_details.id', 'left');
		
		$this->db->where('0', "1");
		$this->db->or_group_start();
			foreach(ORDER_NOTIFICATION["CUSTOMER"] as $order_notification)
				$this->db->or_where('order_status_history.status', $order_notification);
		$this->db->group_end();
		
		$this->db->where('order_status_history.is_read_customer', 0);
		$this->db->where('billing.customer_id', $this->session->child_id);
		
		$this->db->group_by('billing.id');
		$this->db->distinct();
		
		$query = $this->db->get($this->table_billing, 1);
		
		$result = $query->row();
		
		return ($result != null) ? $result->unread_billing : 0;
	}
	
	public function count_unread_order_customer()
	{
		$this->db->select('
			COUNT(order_details.id) AS unread_order
		');
		
		$this->db->join('order_status_history', 'order_status_history.order_details_id = order_details.id', 'left');
		
		$this->db->where('0', "1");
		$this->db->or_group_start();
			foreach(ORDER_NOTIFICATION["CUSTOMER"] as $order_notification)
				$this->db->or_where('order_status_history.status', $order_notification);
		$this->db->group_end();
		
		$this->db->where('order_details.billing_id', $this->id);
		$this->db->where('order_status_history.is_read_customer', 0);
		
		$this->db->group_by('order_details.id');
		$this->db->distinct();
		
		$query = $this->db->get($this->table_order_details, 1);
		
		$result = $query->row();
		// echo $this->db->last_query();
		// echo "<br/><br/><br/>";
		return ($result != null) ? $result->unread_order : 0;
	}
	
	public function mark_as_read_order_status_customer()
	{
		return $this->db->query('
			UPDATE order_status_history LEFT JOIN order_details
			ON order_status_history.order_details_id = order_details.id
			SET order_status_history.is_read_customer = 1
			WHERE order_details.billing_id = ' . $this->id . '
		');
		// return $this->db->set('is_read_customer', 1)
						// // ->join('order_details', 'order_status_history.order_details_id = order_details.id', 'left')
						// // ->join('billing', 'order_details.billing_id = billing.id', 'left');
						// ->where('order_details.billing_id', $this->id)
						// // ->where('billing.customer_id', $this->session->child_id)
						// ->update('order_status_history LEFT JOIN order_details ON order_status_history.order_details_id = order_details.id');
	}
	
	public function update_natural_id($natural_id)
	{
		$this->bill_id = $natural_id;
		
		$this->db->set('bill_id', $natural_id)
				 ->where('id', $this->id)
				 ->update($this->table_billing);
	}
	
	public function update_date_closed()
	{
		$date_closed = date("Y-m-d H:i:s", strtotime("+".INVOICE_DUE." days"));
		$this->date_closed = $date_closed;
		
		$this->db->set('date_closed', $date_closed)
				 ->where('id', $this->id)
				 ->update($this->table_billing);
	}
	
	public function is_expired()
	{
		return (time() > strtotime($this->date_closed));
	}
	
	public function init_customer()
	{
		$this->customer = $this->customer->get_from_id($this->customer_id);
		return $this->customer;
	}
	
	public function init_shipping_address()
	{
		$this->shipping_address = $this->shipping_address->get_from_id($this->shipping_address_id);
		return $this->shipping_address;
	}
	
	public function init_shipping_charge()
	{
		$this->shipping_charge = $this->shipping_charge->get_from_id($this->shipping_charge_id);
		return $this->shipping_charge;
	}
	
	public function calculate_total_payable_from_cart($cart)
	{
		foreach ($cart as $id => $cart_item)
		{
			$this->total_payable += ($cart_item['quantity'] * $cart_item['price']) - $cart_item['voucher_cut_price'];
		}
		return $this->total_payable;
	}
	
	public function calculate_total_payable()
	{
		$this->load->model('payment_model');
		$payments = $this->payment_model->get_all_from_billing_id($this->id);
		
		$total_payable = $this->total_payable;
		foreach ($payments as $payment)
		{
			$total_payable -= $payment->paid_amount;
		}
		
		return $total_payable;
	}
}

?>