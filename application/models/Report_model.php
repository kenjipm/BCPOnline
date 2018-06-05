<?php

class Report_model extends CI_Model {
	
	private $table_billing = 'billing';
	private $table_order_details = 'order_details';
	private $table_order_status_history = 'order_status_history';
	private $table_item = 'posted_item';
	private $table_posted_item_variance = 'posted_item_variance';
	private $table_payment = 'payment';
	private $table_tenant = 'tenant';
	private $table_tenant_pay_receipt = 'tenant_pay_receipt';
	private $table_hot_item = 'hot_item';
	private $table_tenant_bill = 'tenant_bill';
	
	private $table_shipping_charge = 'shipping_charge';
	private $table_voucher = 'voucher';
	
	/*	returns:
		date_bill_created: date bill opened
		total_price: total price billing
		total_customer_paid_price: total customer sudah bayar ke admin
		total_done_paid_price: total transaksi selesai (yg admin harus cashback)
		total_admin_paid_price: total admin sudah bayar ke tenant (cashback)
	*/
	public function get_all_transaction_from_date($start_date, $end_date)
	{
		$this->db->select('
			billing.bill_id AS natural_billing_id,
			billing.date_created AS date_bill_created,
			SUM(order_details.sold_price * order_details.quantity) AS total_price,
			SUM(CASE WHEN (
					order_details.order_status <> \''.ORDER_STATUS['name']['WAITING_FOR_PAYMENT'].'\'
				) THEN order_details.sold_price * order_details.quantity ELSE 0 END) AS total_customer_paid_price,
			SUM(CASE WHEN (
					order_details.order_status = \''.ORDER_STATUS['name']['DONE'].'\'
				) THEN order_details.sold_price * order_details.quantity ELSE 0 END) AS total_done_paid_price,
			SUM(CASE WHEN (
					order_details.tnt_paid_receipt_id IS NOT NULL
				) THEN order_details.sold_price * order_details.quantity ELSE 0 END) AS total_admin_paid_price
		');
		
		$this->db->join('billing', 'order_details.billing_id = billing.id', 'left');
		$this->db->where('billing.date_created >= ', $start_date);
		$this->db->where('billing.date_created <= ', "DATE_ADD('".$end_date."', INTERVAL 1 DAY)", false);
		$this->db->group_by('billing.id');
		$this->db->distinct();
		$query = $this->db->get($this->table_order_details);
		
		$result = $query->result();
		
		// echo $this->db->last_query();
		
		return $result;
	}
	
	/*	returns:
	*/
	public function get_all_transaction_from_tenant_and_date($tenant_id, $start_date, $end_date)
	{
		$this->db->select('
			billing.id AS billing_id,
			billing.bill_id AS natural_billing_id,
			billing.date_created AS date_bill_created,
			posted_item.posted_item_name AS posted_item_name,
			tenant.tenant_name AS tenant_name,
			order_details.quantity AS quantity,
			order_details.sold_price AS sold_price,
			(order_details.sold_price * order_details.quantity) AS total_price,
			CASE WHEN (
					order_details.order_status <> \''.ORDER_STATUS['name']['WAITING_FOR_PAYMENT'].'\'
				) THEN order_details.sold_price * order_details.quantity ELSE 0 END AS total_customer_paid_price,
			CASE WHEN (
					order_details.order_status = \''.ORDER_STATUS['name']['DONE'].'\'
				) THEN order_details.sold_price * order_details.quantity ELSE 0 END AS total_done_paid_price,
			CASE WHEN (
					order_details.tnt_paid_receipt_id IS NOT NULL
				) THEN order_details.sold_price * order_details.quantity ELSE 0 END AS total_admin_paid_price
		');
		
		$this->db->join('billing', 'order_details.billing_id = billing.id', 'left');
		$this->db->join('posted_item_variance', 'order_details.posted_item_variance_id = posted_item_variance.id', 'left');
		$this->db->join('posted_item', 'posted_item_variance.posted_item_id = posted_item.id', 'left');
		$this->db->join('tenant', 'posted_item.tenant_id = tenant.id', 'left');
		$this->db->where('billing.date_created >= ', $start_date);
		$this->db->where('billing.date_created <= ', "DATE_ADD('".$end_date."', INTERVAL 1 DAY)", false);
		if ($tenant_id != -1) $this->db->where('tenant.id', $tenant_id);
		$this->db->group_by('order_details.id');
		$this->db->distinct();
		$query = $this->db->get($this->table_order_details);
		
		$result = $query->result();
		
		// echo $this->db->last_query();
		
		return $result;
	}
	
	public function get_all_product_by_tenant_from_date($tenant_id, $start_date, $end_date)
	{
		$this->db->select('
			tenant.id AS tenant_id,
			tenant.tenant_name AS tenant_name,
			posted_item.posted_item_name AS posted_item_name,
			SUM(order_details.quantity) AS quantity,
			SUM(order_details.sold_price) AS total_price,
		');
		
		$this->db->join('billing', 'order_details.billing_id = billing.id', 'left');
		$this->db->join('posted_item_variance', 'order_details.posted_item_variance_id = posted_item_variance.id', 'left');
		$this->db->join('posted_item', 'posted_item_variance.posted_item_id = posted_item.id', 'left');
		$this->db->join('tenant', 'posted_item.tenant_id = tenant.id', 'left');
		$this->db->where('billing.date_created >= ', $start_date);
		$this->db->where('billing.date_created <= ', "DATE_ADD('".$end_date."', INTERVAL 1 DAY)", false);
		if ($tenant_id != -1) $this->db->where('tenant.id', $tenant_id);
		$this->db->order_by('quantity', 'DESC');
		$this->db->group_by('posted_item.id');
		$this->db->distinct();
		$query = $this->db->get($this->table_order_details);
		
		$result = $query->result();
		
		// echo $this->db->last_query();
		
		return $result;
	}
	
	public function get_all_from_category_brand_and_date($category_id, $brand_id, $keywords, $start_date, $end_date)
	{
		$this->db->select('
			posted_item.id AS posted_item_id,
			tenant.tenant_name AS tenant_name,
			posted_item.posted_item_name AS posted_item_name,
			SUM(order_details.quantity) AS quantity,
			SUM(order_details.sold_price) AS total_price,
		');
		
		$this->db->join('billing', 'order_details.billing_id = billing.id', 'left');
		$this->db->join('posted_item_variance', 'order_details.posted_item_variance_id = posted_item_variance.id', 'left');
		$this->db->join('posted_item', 'posted_item_variance.posted_item_id = posted_item.id', 'left');
		$this->db->join('tenant', 'posted_item.tenant_id = tenant.id', 'left');
		$this->db->where('billing.date_created >= ', $start_date);
		$this->db->where('billing.date_created <= ', "DATE_ADD('".$end_date."', INTERVAL 1 DAY)", false);
		if ($category_id != -1) $this->db->where('posted_item.category_id', $category_id);
		if ($brand_id != -1) $this->db->where('posted_item.brand_id', $brand_id);
		if ($keywords != "") $this->db->like('posted_item.posted_item_name', $keywords);
		$this->db->order_by('quantity', 'DESC');
		$this->db->group_by('posted_item.id');
		$this->db->distinct();
		$query = $this->db->get($this->table_order_details);
		
		$result = $query->result();
		
		// echo $this->db->last_query();
		
		return $result;
	}
	
	/*
	payment_date 		
	payment_value 		
	tenant_name 		
	posted_item_name 	
	promo_price 		
	promo_description 	
	*/
	public function get_all_hot_item_from_tenant_and_date($tenant_id, $start_date, $end_date)
	{
		$join_select_query = "
			SELECT
				tenant_bill.id AS id,
				tenant_bill.tenant_id AS tenant_id,
				tenant_bill.posted_item_id AS posted_item_id,
				tenant_bill.payment_date AS payment_date,
				tenant_bill.payment_value AS payment_value,
				tenant.tenant_name AS tenant_name,
				posted_item.posted_item_name AS posted_item_name,
				CASE WHEN tenant_bill.hot_item_id IS NULL THEN 'SEO' ELSE 'HOT_ITEM' END AS payment_type,
				CASE WHEN tenant_bill.hot_item_id IS NULL THEN posted_item.price ELSE hot_item.promo_price END AS promo_price,
				CASE WHEN tenant_bill.hot_item_id IS NULL THEN '' ELSE hot_item.promo_description END AS promo_description
			FROM tenant_bill
		";
		$join_condition = "hot_item ON tenant_bill.hot_item_id = hot_item.id
			LEFT JOIN tenant ON tenant_bill.tenant_id = tenant.id
			LEFT JOIN posted_item ON tenant_bill.posted_item_id = posted_item.id";
		$select_query = "
			SELECT *
			FROM (" . $join_select_query . " LEFT JOIN " . $join_condition . " UNION " . $join_select_query . " RIGHT JOIN " . $join_condition . ") AS joined_tenant_bill ";
		
		$join_query = "
			LEFT JOIN tenant ON joined_tenant_bill.tenant_id = tenant.id
			LEFT JOIN posted_item ON joined_tenant_bill.posted_item_id = posted_item.id
		";
		
		$where_query = "
			WHERE joined_tenant_bill.payment_date >= '".$start_date."' AND ".
			"joined_tenant_bill.payment_date <= DATE_ADD('".$end_date."', INTERVAL 1 DAY) AND ".
			"joined_tenant_bill.payment_value > 0 ";
		if ($tenant_id != -1) $where_query .= " AND tenant.id = ".$tenant_id." ";
		
		$group_query = " GROUP BY joined_tenant_bill.id ";
		
		$query = $this->db->query($select_query . $join_query . $where_query . $group_query);
		
		$result = $query->result();
		
		// echo $this->db->last_query();
		
		return $result;
	}
}

?>