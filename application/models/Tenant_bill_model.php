<?php

class Tenant_bill_model extends CI_Model {
	
	private $table_tenant_bill = 'tenant_bill';
	private $table_item = 'posted_item';
	
	// table attribute
	public $id;
	public $tenant_bill_id;
	public $tenant_id;		
	public $hot_item_id;			
	public $posted_item_id;		
	public $admin_id;				
	public $payment_value;		
	public $payment_expiration;	
	public $payment_date;			
	
	public $posted_item;
	public $tenant;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id					= 0;
		$this->tenant_bill_id		= "";
		$this->tenant_id			= 0;
		$this->hot_item_id			= "";
		$this->posted_item_id		= "";
		$this->admin_id				= "";
		$this->payment_value		= "";
		$this->payment_expiration	= "";
		$this->payment_date			= "";
		
		$this->load->model('item_model');
		$this->load->model('tenant_model');
		$this->posted_item	= new item_model();
		$this->tenant		= new tenant_model();
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->tenant_bill_id		= $db_item->tenant_bill_id;
		$this->tenant_id			= $db_item->tenant_id;		
		$this->hot_item_id			= $db_item->hot_item_id;			
		$this->posted_item_id		= $db_item->posted_item_id;		
		$this->admin_id				= $db_item->admin_id;				
		$this->payment_value		= $db_item->payment_value;		
		$this->payment_expiration	= $db_item->payment_expiration;	
		$this->payment_date			= $db_item->payment_date;			
		
		$this->posted_item->posted_item_name	= $db_item->posted_item_name ?? "";
		$this->tenant->tenant_name				= $db_item->tenant_name ?? "";
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id					= $this->id;
		$db_item->tenant_bill_id		= $this->tenant_bill_id;
		$db_item->tenant_id				= $this->tenant_id;		
		$db_item->hot_item_id			= $this->hot_item_id;			
		$db_item->posted_item_id		= $this->posted_item_id;		
		$db_item->admin_id				= $this->admin_id;				
		$db_item->payment_value			= $this->payment_value;		
		$db_item->payment_expiration	= $this->payment_expiration;	
		$db_item->payment_date			= $this->payment_date;		
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new tenant_bill_model();
		
		$stub->id					= $db_item->id;
		$stub->tenant_bill_id		= $db_item->tenant_bill_id;
		$stub->tenant_id			= $db_item->tenant_id;		
		$stub->hot_item_id			= $db_item->hot_item_id;			
		$stub->posted_item_id		= $db_item->posted_item_id;		
		$stub->admin_id				= $db_item->admin_id;				
		$stub->payment_value		= $db_item->payment_value;		
		$stub->payment_expiration	= $db_item->payment_expiration;	
		$stub->payment_date			= $db_item->payment_date;	
		
		$stub->posted_item->posted_item_name	= $db_item->posted_item_name ?? "";
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
	
	public function get_from_id($id)
	{
		$where['tenant_bill.id'] = $id;
		
		$this->db->select('*, ' . $this->table_tenant_bill.'.id AS id, ' . $this->table_tenant_bill.'.posted_item_id AS posted_item_id, '. $this->table_item. '.tenant_id AS tenant_id');
		$this->db->join('posted_item', 'posted_item.id=' . $this->table_tenant_bill . '.posted_item_id', 'left');
		$this->db->join('tenant', 'tenant.id=' . $this->table_item . '.tenant_id', 'left');
		$this->db->where($where);
		$query = $this->db->get($this->table_tenant_bill, 1);
		$item = $query->row();
		
		return ($item !== null) ? $this->get_stub_from_db($item) : null;
	}
	
	public function get_all_unpaid_by_tenants()
	{
		$where[$this->table_tenant_bill.'.payment_date'] = null;
		
		$this->db->join('hot_item', 'hot_item.id = '. $this->table_tenant_bill . '.hot_item_id', 'left');
		$this->db->join($this->table_item, $this->table_item. '.id = hot_item.posted_item_id', 'left');
		$this->db->join('tenant', $this->table_item.'.tenant_id = tenant.id', 'left');
		$this->db->where($where);
		$query = $this->db->get($this->table_tenant_bill);
		$tenant_bills = $query->result();
		
		return ($tenant_bills !== null) ? $this->map_list($tenant_bills) : array();
	}
	
	public function get_all_seo_unpaid_by_tenants()
	{
		$where[$this->table_tenant_bill.'.payment_date'] = null;
		
		$this->db->select('*, ' . $this->table_tenant_bill.'.posted_item_id AS posted_item_id, '. $this->table_tenant_bill.'.id AS id');
		$this->db->join($this->table_item, $this->table_item. '.id = '. $this->table_tenant_bill.'.posted_item_id', 'left');
		$this->db->join('tenant', $this->table_item.'.tenant_id = tenant.id', 'left');
		$this->db->where($where);
		$query = $this->db->get($this->table_tenant_bill);
		$tenant_bills = $query->result();
		
		return ($tenant_bills !== null) ? $this->map_list($tenant_bills) : array();
	}
	
	// public function get_all($limit=10, $offset=0)
	// {
		// $this->db->join($this->table_item, $this->table_tenant_bill.'.posted_item_id' . ' = ' . $this->table_item.'.id', 'left');
		// $query = $this->db
					  // ->order_by($this->table_tenant_bill.'.id', 'DESC')
					  // ->get($this->table_tenant_bill, $limit??"", $limit?$offset:""); // kalau ga ada limit, jgn taro offset nya
		
		// $items = $query->result();
		
		// return ($items !== null) ? $this->map_list($items) : array();
	// }
	
	public function is_paid_hot_item()
	{
		return (($this->payment_date != 0) && ($this->hot_item_id != NULL)); // "0000-00-00 00:00:00"
	}
	
	public function is_paid_seo_item()
	{
		return (($this->payment_date != 0) && ($this->hot_item_id == NULL)); // "0000-00-00 00:00:00"
	}
	
	public function is_expired()
	{
		return (time() > strtotime($this->payment_expiration));
	}
	
	public function set_paid($hot_item_id)
	{
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$this->db->where('hot_item_id', $hot_item_id);
		$this->db->set('payment_date', date("Y-m-d H:i:s"));
		$this->db->update($this->table_tenant_bill);
		
		$this->db->where('id', $hot_item_id);
		$this->db->set('is_done', 1);
		$this->db->update('hot_item');
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function set_paid_seo($posted_item_id)
	{
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$this->db->where('posted_item_id', $posted_item_id);
		$this->db->where('hot_item_id IS NULL');
		$this->db->set('payment_date', date("Y-m-d H:i:s"));
		$this->db->update($this->table_tenant_bill);
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	// get hot_item detail
	public function get_from_hot_item_id($hot_item_id)
	{
		$where['hot_item_id'] = $hot_item_id;
		
		$this->db->where($where);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get($this->table_tenant_bill, 1);
		$item = $query->row();
		
		return ($item !== null) ? $this->get_stub_from_db($item) : null;
	}
	
	// get seo_item detail
	public function get_from_seo_item_id($posted_item_id)
	{
		$where['posted_item_id'] = $posted_item_id;
		$where['hot_item_id'] = NULL;
		
		$this->db->where($where);
		$this->db->where('admin_id is NOT NULL');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get($this->table_tenant_bill, 1);
		$item = $query->row();
		
		return ($item !== null) ? $this->get_stub_from_db($item) : null;
	}
	
	public function get_registered_seo($posted_item_id)
	{
		$where['posted_item_id'] = $posted_item_id;
		$where['hot_item_id'] = NULL;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_tenant_bill, 1);
		$seo_item = $query->row();
		
		return ($seo_item !== null) ? $this->get_stub_from_db($seo_item) : null;
	}
	
	public function insert_seo_item($id)
	{	
		$this->tenant_bill_id		= "";
		$this->payment_expiration	= "";
		$this->payment_value		= "";
		$this->tenant_id			= $this->session->child_id;
		$this->posted_item_id		= $id;
		$this->hot_item_id			= NULL;
		$this->admin_id				= NULL;
		$this->payment_date			= "";
		
		// insert data, then generate [reward_id] based on [id]
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		if ($this->db->insert($this->table_tenant_bill, $db_item))
		{
			$this->load->library('Id_generator');
			
			$db_item->id		= $this->db->insert_id();
			$db_item->tenant_bill_id	= $this->id_generator->generate(TYPE['name']['TENANT_BILL'], $db_item->id);
			
			$this->db->where('id', $db_item->id);
			$this->db->update($this->table_tenant_bill, $db_item);
		}
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function confirm_seo_item($id)
	{	
		$this->payment_expiration	= $this->input->post('payment_expiration');
		$this->payment_value		= $this->input->post('payment_value');
		$this->tenant_id			= $this->input->post('tenant_id');
		$this->admin_id				= $this->session->child_id;
		
		// insert data, then generate [reward_id] based on [id]
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$this->db->set('admin_id', $this->admin_id);
		$this->db->set('payment_value', $this->payment_value);
		$this->db->set('payment_expiration', $this->payment_expiration);
		$this->db->where('id', $id);
		$this->db->update($this->table_tenant_bill);
		
		$this->send_confirm_to_tenant($this->tenant_id);
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function insert_flash_item($posted_item_id, $hot_item_id)
	{
		$this->tenant_bill_id		= "";
		$this->payment_expiration	= $this->input->post('date_expired');
		$this->payment_value		= 0;
		$this->tenant_id			= 0;
		$this->posted_item_id		= $posted_item_id;
		$this->hot_item_id			= $hot_item_id;
		$this->admin_id				= $this->session->child_id;
		$this->payment_date			= "";
		
		// insert data, then generate [reward_id] based on [id]
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		if ($this->db->insert($this->table_tenant_bill, $db_item))
		{
			$this->load->library('Id_generator');
			
			$db_item->id		= $this->db->insert_id();
			$db_item->tenant_bill_id	= $this->id_generator->generate(TYPE['name']['TENANT_BILL'], $db_item->id);
			
			$this->db->where('id', $db_item->id);
			$this->db->update($this->table_tenant_bill, $db_item);
		}
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function insert_from_post()
	{	
		$this->tenant_bill_id		= "";
		$this->payment_expiration	= $this->input->post('payment_expiration');
		$this->payment_value		= $this->input->post('payment_value');
		$this->tenant_id			= $this->input->post('tenant_id');
		$this->posted_item_id		= $this->input->post('posted_item_id');
		$this->hot_item_id			= $this->input->post('hot_item_id');
		$this->admin_id				= $this->session->child_id;
		$this->payment_date			= "";
		
		// insert data, then generate [reward_id] based on [id]
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		if ($this->db->insert($this->table_tenant_bill, $db_item))
		{
			$this->load->library('Id_generator');
			
			$db_item->id		= $this->db->insert_id();
			$db_item->tenant_bill_id	= $this->id_generator->generate(TYPE['name']['TENANT_BILL'], $db_item->id);
			
			$this->db->where('id', $db_item->id);
			$this->db->update($this->table_tenant_bill, $db_item);
		}
		
		$this->send_confirm_to_tenant($this->tenant_id);
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function send_confirm_to_tenant($tenant_id)
	{
		$this->load->model('message_inbox_model');
		$party_one_id = $this->session->id;
		
		$where['id'] = $tenant_id;
		
		$this->db->where($where);
		$query = $this->db->get('tenant', 1);
		$tenant = $query->row();
		
		$party_two_id = $tenant->account_id;
		
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
		$cur_message_text->text = "Barang promosi sudah dikonfirmasi. Silakan cek produk untuk pembayaran";
		$cur_message_text->insert_from_stub();
	}
	
	public function count_registered_hot()
	{
		$this->db->select('
			COUNT(hot_item.id) AS registered_hot_item
		');
		
		$where['hot_item.is_done'] = 0;
		
		$this->db->where($where);
		
		$this->db->distinct();
		
		$query = $this->db->get('hot_item', 1);
		$result = $query->row();
		$registered_hot_item = ($result != null) ? $result->registered_hot_item : 0;
		
		// Count unpaid
		$this->db->select('
			COUNT(tenant_bill.id) AS unpaid_hot_item
		');
		
		$where['hot_item.is_done'] = 0;
		$where['tenant_bill.payment_date'] = 0;
		
		$this->db->where($where);
		$this->db->join('hot_item', 'hot_item.id = '. $this->table_tenant_bill . '.hot_item_id', 'left');
		$this->db->distinct();
		
		$query = $this->db->get('tenant_bill', 1);
		$result_unpaid = $query->row();
		$unpaid_hot_item = ($result_unpaid != null) ? $result_unpaid->unpaid_hot_item : 0;
		$registered_hot = $registered_hot_item - $unpaid_hot_item;
		
		return $registered_hot;
	}
	
	public function count_registered_seo()
	{
		$this->db->select('
			COUNT(tenant_bill.id) AS registered_seo
		');
		
		$where['tenant_bill.payment_date'] = null;
		$where['tenant_bill.hot_item_id'] = null;
		
		$this->db->where($where);
		
		$this->db->group_by('tenant_bill.id');
		$this->db->distinct();
		
		$query = $this->db->get($this->table_tenant_bill, 1);
		
		$result = $query->row();
		
		return ($result != null) ? $result->registered_seo : 0;
	}
}

?>