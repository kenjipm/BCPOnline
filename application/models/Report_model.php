<?php

class Report_model extends CI_Model {
	
	private $table_billing = 'billing';
	private $table_order_details = 'order_details';
	private $table_order_status_history = 'order_status_history';
	private $table_item = 'posted_item';
	private $table_posted_item_variance = 'posted_item_variance';
	private $table_tenant_bill = 'tenant_bill';
	private $table_payment = 'payment';
	private $table_tenant = 'tenant';
	private $table_tenant_pay_receipt = 'tenant_pay_receipt';
	
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
		$this->db->where('billing.date_created <= ', $end_date);
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
			billing.date_created AS date_bill_created,
			posted_item.posted_item_name AS posted_item_name,
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
		$this->db->where('billing.date_created <= ', $end_date);
		if ($tenant_id != -1) $this->db->where('tenant.id', $tenant_id);
		$this->db->group_by('order_details.id');
		$this->db->distinct();
		$query = $this->db->get($this->table_order_details);
		
		$result = $query->result();
		
		// echo $this->db->last_query();
		
		return $result;
	}
}

?>