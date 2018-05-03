<?php

class Report_model extends CI_Model {
	
	private $table_billing = 'billing';
	private $table_order_details = 'order_details';
	private $table_order_status_history = 'order_status_history';
	private $table_item = 'posted_item';
	private $table_tenant_bill = 'tenant_bill';
	private $table_payment = 'payment';
	private $table_tenant = 'tenant';
	private $table_tenant_pay_receipt = 'tenant_pay_receipt';
	
	private $table_shipping_charge = 'shipping_charge';
	private $table_posted_item_variance = 'posted_item_variance';
	private $table_voucher = 'voucher';
	
	/*	returns (gajadi pake ini):
		total_sold_price: total price 
		total_paid_order: banyaknya order yang sudah di mark as done by customer
		date_bill_created: date bill opened
		date_last_done: date order terakhir dlm bill itu mark as done by customer
	*/
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
			SUM(order_details.sold_price) AS total_price,
			SUM(CASE WHEN (
					order_details.order_status <> \''.ORDER_STATUS['name']['WAITING_FOR_PAYMENT'].'\'
				) THEN order_details.sold_price ELSE 0 END) AS total_customer_paid_price,
			SUM(CASE WHEN (
					order_details.order_status = \''.ORDER_STATUS['name']['DONE'].'\'
				) THEN order_details.sold_price ELSE 0 END) AS total_done_paid_price,
			SUM(CASE WHEN (
					order_details.tnt_paid_receipt_id IS NOT NULL
				) THEN order_details.sold_price ELSE 0 END) AS total_admin_paid_price
		');
		
		$this->db->join('billing', 'order_details.billing_id = billing.id', 'left');
		$this->db->where('billing.date_created >= ', $start_date);
		$this->db->where('billing.date_created <= ', $end_date);
		$this->db->group_by('billing.id');
		$this->db->distinct();
		$query = $this->db->get($this->table_order_details);
		
		// $this->db->select('
			// SUM(order_details.sold_price) AS total_sold_price,
			// COUNT(order_details.id) AS total_paid_order,
			// billing.date_created AS date_bill_created,
			// MAX(order_status_history.date_added) AS date_last_done
		// ');
		
		// $this->db->join('order_details', 'order_details.billing_id = billing.id', 'left');
		// $this->db->join('order_status_history', 'order_status_history.order_details_id = order_details.id', 'left');
		// $this->db->where('order_details.order_status', ORDER_STATUS['name']['DONE']);
		// $this->db->where('order_status_history.date_added >= ', $start_date);
		// $this->db->where('order_status_history.date_added <= ', $end_date);
		// $this->db->group_by('billing.id');
		// $this->db->distinct();
		// $query = $this->db->get($this->table_billing);
		
		// $this->db->join('order_details', 'order_status_history.order_details_id = order_details.id', 'left');
		// $this->db->join('billing', 'order_details.billing_id = billing.id', 'left');
		// $this->db->where('order_status_history.date_added >= ', $start_date);
		// $this->db->where('order_status_history.date_added <= ', $end_date);
		// $this->db->where('order_status_history.status', ORDER_STATUS['name']['DONE']);
		// $this->db->group_by('billing.id');
		// $this->db->distinct();
		// $query = $this->db->get($this->table_order_status_history);
		
		$result = $query->result();
		
		// echo $this->db->last_query();
		
		return $result;
	}
}

?>