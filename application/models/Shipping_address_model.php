<?php

class Shipping_address_model extends CI_Model {
	
	private $table_shipping_address = 'shipping_address';
	
	public $id;
	public $address_id;
	public $city;
	public $kecamatan;
	public $kelurahan;
	public $postal_code;
	public $address_detail;
	public $latitude;
	public $customer_id;
	public $is_primary;
	
	// stub attribute
	public $full_address;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->id				= 0;
		$this->address_id		= "";
		$this->city				= "";
		$this->kecamatan		= "";
		$this->kelurahan		= "";
		$this->postal_code		= "";
		$this->address_detail	= "";
		$this->latitude			= "";
		$this->customer_id		= "";
		$this->is_primary		= 0;
		
		$this->full_address		= "";
	}
	
	public function get_stub_from_db($db_item)
	{
		if ($db_item != null)
		{
			$this->id				= $db_item->id;
			$this->address_id		= $db_item->address_id;
			$this->city				= $db_item->city;
			$this->kecamatan		= $db_item->kecamatan;
			$this->kelurahan		= $db_item->kelurahan;
			$this->postal_code		= $db_item->postal_code;
			$this->address_detail	= $db_item->address_detail;
			$this->latitude			= $db_item->latitude;
			$this->customer_id		= $db_item->customer_id;
			$this->is_primary		= $db_item->is_primary;
		}
		return $this;
	}
	
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id = $this->id;
		$db_item->address_id = $this->address_id;
		$db_item->city = $this->city;
		$db_item->kecamatan = $this->kecamatan;
		$db_item->kelurahan = $this->kelurahan;
		$db_item->postal_code = $this->postal_code;
		$db_item->address_detail = $this->address_detail;
		$db_item->latitude = $this->latitude;
		$db_item->customer_id = $this->customer_id;
		$db_item->is_primary = $this->is_primary;
		
		return $db_item;
	}
	
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Shipping_address_model();
		if ($db_item != null)
		{
			$stub->id				= $db_item->id;
			$stub->address_id		= $db_item->address_id;
			$stub->city				= $db_item->city;
			$stub->kecamatan		= $db_item->kecamatan;
			$stub->kelurahan		= $db_item->kelurahan;
			$stub->postal_code		= $db_item->postal_code;
			$stub->address_detail	= $db_item->address_detail;
			$stub->latitude			= $db_item->latitude;
			$stub->customer_id		= $db_item->customer_id;
			$stub->is_primary		= $db_item->is_primary;
		}
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
		$query = $this->db->get($this->table_shipping_address, 1);
		$shipping_address = $query->row();
		
		return ($shipping_address !== null) ? $this->get_stub_from_db($shipping_address) : new Shipping_address_model();
	}
	
	public function get_by_customer_id($customer_id)
	{
		$this->db->where('customer_id', $customer_id);
		$this->db->order_by('is_primary', 'DESC');
		// $this->db->order_by('id', 'DESC');
		$query = $this->db->get($this->table_shipping_address, 1);
		
		return $this->get_stub_from_db($query->row());
	}
	
	public function get_all_by_customer_id($customer_id)
	{
		$this->db->select('*, shipping_address.id AS id');
		$this->db->join('billing', 'shipping_address.address_id = billing.shipping_address_id', 'left');
		$this->db->where('shipping_address.customer_id', $customer_id);
		$this->db->order_by('billing.date_created', 'DESC');
		$this->db->order_by('is_primary', 'DESC');
		$query = $this->db->get($this->table_shipping_address);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function insert($address)
	{
		$last_address = new shipping_address_model();
		$last_address->get_by_customer_id($this->session->child_id);
		
		$this->city				= $address->city;
		$this->kecamatan		= $address->kecamatan;
		$this->kelurahan		= $address->kelurahan;
		$this->postal_code		= $address->postal_code;
		$this->address_detail	= $address->address_detail;
		$this->latitude			= $address->latitude;
		
		$this->address_id		= "";
		$this->customer_id		= $this->session->child_id;
		$this->is_primary		= ($last_address->id == 0);
		
		$db_item = $this->get_db_from_stub();
		
		$this->db->trans_start();
		
		if ($this->db->insert($this->table_shipping_address, $db_item))
		{
			$this->id	= $this->db->insert_id();
			$type = TYPE['name']['SHIPPING_ADDRESS'];
		
			$this->load->library('Id_generator');
			$natural_id	= $this->id_generator->generate($type, $this->id);
			
			$this->address_id		= $natural_id;
			
			$db_item = $this->get_db_from_stub();
			$this->db->where('id', $db_item->id);
			$this->db->update($this->table_shipping_address, $db_item); // update account_id natural key yang udah di generate "ADD000001"
		}
		
		$this->db->trans_complete();
	}
	
	public function delete_from_id($customer_id, $shipping_address_id)
	{
		$this->db->where('customer_id', $customer_id);
		$this->db->where('id', $shipping_address_id);
		$this->db->delete($this->table_shipping_address);
	}
	
	public function set_primary($customer_id, $shipping_address_id)
	{
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$this->db->where('customer_id', $customer_id);
		$this->db->set('is_primary', 0);
		$this->db->update($this->table_shipping_address);
		
		$this->db->where('customer_id', $customer_id);
		$this->db->where('id', $shipping_address_id);
		$this->db->set('is_primary', 1);
		$this->db->update($this->table_shipping_address);
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function get_full_address()
	{
		$this->full_address	  = $this->address_detail ? $this->address_detail : "";
		$this->full_address  .= $this->kelurahan ? ($this->full_address ? ", " : "").$this->kelurahan : "";
		$this->full_address  .= $this->kecamatan ? ($this->full_address ? ", " : "").$this->kecamatan : "";
		$this->full_address  .= $this->city ? ($this->full_address ? ", " : "").$this->city : "";
		$this->full_address  .= $this->postal_code ? ($this->full_address ? ", " : "").$this->postal_code : "";
		
		return $this->full_address;
	}
}

?>