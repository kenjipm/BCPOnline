<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	// View List of Order Detail 
	public function detail($otp)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Detail Transaksi";
		$data['model'] = new class{};
		
		if ($this->session->userdata('type') == TYPE['name']['TENANT']) // dummy
		{
			$this->load->model('Order_details_model');
			$order = $this->Order_details_model->get_all_from_otp_deliverer_to_tenant($otp, $this->session->child_id);
			$this->load->model('views/tenant/order_detail_view_model');
			$this->order_detail_view_model->get($order);
			$data['model'] = $this->order_detail_view_model;
			
			$this->load->view('tenant/order_detail', $data);
		}
	}
	
	// View Transaction Detail
	public function transaction_detail($id)
	{
		// Load Header
        $data_header['css_list'] = array();
		$data_header['js_list'] = array('tenant/transaction_detail');
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Detail Transaksi";
		$data['model'] = new class{};
		
		if ($this->session->userdata('type') == TYPE['name']['TENANT']) // dummy
		{
			// Submit Negotiated Price
			if ($this->input->method() == "post") $this->set_nego_price_do($id);
			
			$this->load->model('Order_details_model');
			$order = $this->Order_details_model->get_from_id($id);
			$this->load->model('views/tenant/transaction_detail_view_model');
			$this->transaction_detail_view_model->get($order);
			$order->mark_as_read_order_status_tenant();
			$data['model'] = $this->transaction_detail_view_model;
			
			$this->load->view('tenant/transaction_detail', $data);
		}
		else if ($this->session->userdata('type') == TYPE['name']['CUSTOMER'])
		{
			$this->load->view('customer/transaction_detail', $data);
		}
		else // Deliverer
		{
			$this->load->model('Order_details_model');
			$order = $this->Order_details_model->get_from_id($id);
			$this->load->model('views/deliverer/transaction_detail_view_model');
			$this->transaction_detail_view_model->get($order);
			$data['model'] = $this->transaction_detail_view_model;
			
			$this->load->view('deliverer/transaction_detail', $data);
		}
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function transaction_detail_print_preview($id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header_print_preview', $data_header);
		
		// Load Body
		$data['title'] = "Detail Transaksi";
		$data['model'] = new class{};
		
		if ($this->session->userdata('type') == TYPE['name']['TENANT'])
		{
			$order = new order_details_model();
			$order->id = $id;
			$delivery_information = $order->get_delivery_information();
			
			$this->load->model('views/tenant/transaction_detail_print_preview_view_model');
			$this->transaction_detail_print_preview_view_model->get($delivery_information);
			$data['model'] = $this->transaction_detail_print_preview_view_model;
			
			$this->load->view('tenant/transaction_detail_print_preview', $data);
		}
		else
		{
			redirect('');
		}
		
		// Load Footer
		$this->load->view('footer_print_preview');
	}
	
	public function order_list($page=1)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('billing', 'tenant/billing');
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Daftar Order";
		$data['model'] = new class{};
		
		if ($this->session->userdata('type') == TYPE['name']['ADMIN'])
		{
			// Assign Deliverer
			if ($this->input->method() == "post") $this->assign_deliverer_do();
			
			$this->load->model('Order_details_model');
			$this->load->model('Deliverer_model');
			
			$orders = $this->Order_details_model->get_all();
			$deliverers = $this->Deliverer_model->get_idle_deliverer();
			
			$this->load->model('views/admin/order_list_view_model');
			$this->order_list_view_model->get($orders, $deliverers);
			$data['model'] = $this->order_list_view_model;
			
			$this->load->view('admin/order_list', $data);
		}
		else if ($this->session->userdata('type') == TYPE['name']['TENANT'])
		{
			// OTP INPUT
			if ($this->input->method() == "post") $this->get_item_tenant_do();
			
			$this->load->model('Order_details_model');
			$orders = $this->Order_details_model->get_all_from_tenant_id(($page - 1) * PAGINATION['type']['LIMIT_TABLE_ROW']);
			
			$this->load->model('views/tenant/order_list_view_model');
			$this->order_list_view_model->get($orders);
			
			$data['model'] = $this->order_list_view_model;
			$this->load->view('tenant/order_list', $data);
			
			$order_count = $this->Order_details_model->count_all_from_tenant_id();
			$this->load->library('paginator');
			$this->paginator->base_url = site_url('order/order_list/');
			$this->paginator->calculate($order_count, PAGINATION['type']['LIMIT_TABLE_ROW'], $page);
			
			$paginator_data['paginator'] = $this->paginator;
			$this->load->view('pagination', $paginator_data);
		}
		else if ($this->session->userdata('type') == TYPE['name']['DELIVERER'])
		{
			// OTP INPUT
			if ($this->input->method() == "post") $this->get_item_deliverer_do();
			
			$this->load->model('Order_details_model');
			$orders = $this->Order_details_model->get_order_collection_task_from_deliverer_id();
			$deliver_orders = $this->Order_details_model->get_order_deliver_task_from_deliverer_id();
			$repairs = $this->Order_details_model->get_repair_collection_task_from_deliverer_id();
			$deliver_repairs = $this->Order_details_model->get_repair_deliver_task_from_deliverer_id();
			$this->load->model('views/deliverer/order_list_view_model');
			$this->order_list_view_model->get_order_collection_task($orders);
			$this->order_list_view_model->get_order_deliver_task($deliver_orders);
			$this->order_list_view_model->get_repair_collection_task($repairs);
			$this->order_list_view_model->get_repair_deliver_task($deliver_repairs);
			$data['model'] = $this->order_list_view_model;
			
			$this->load->view('deliverer/order_list', $data);
		}
		else // CUSTOMER
		{
			// OTP INPUT
			if ($this->input->method() == "post") $this->get_item_customer_do();
			
			$data['model'] = new class{};
			$this->load->view('customer/repair_list', $data);
		}
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function get_item_tenant_do()
	{
		$this->load->model('Order_details_model');
		$orders = $this->Order_details_model->get_all_from_otp_deliverer_to_tenant($this->input->post('otp'), $this->session->child_id);
		
		$this->load->model('views/tenant/order_detail_view_model');
		$this->order_detail_view_model->get($orders);
		$data['model'] = $this->order_detail_view_model;
		
		$this->load->view('tenant/order_detail', $data);
	
	}
	
	public function cancel_repair($id)
	{
		if ($this->input->method() == "post") 
		{
			$this->load->model('Order_details_model');
			
			$this->Order_details_model->cancel_repair($id);
			redirect('Order/transaction_detail/' . $id);
		}
	}
	
	public function notify_repair_finished($id)
	{
		if ($this->input->method() == "post") 
		{
			$this->load->model('Order_details_model');
			
			$this->Order_details_model->notify_repair_finished($id);
			redirect('Order/transaction_detail/' . $id);
		}
	}
	
	public function set_nego_price_do($id)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('discounted_price', 'Harga Diskon', 'required|integer');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('negotiated_price_model');
			$this->negotiated_price_model->insert_from_post($id);
			
			$this->load->model('payment_model');
			$payment = $this->payment_model;
			$payment->paid_amount			= 0;
			$payment->billing_id			= $this->input->post('billing_id');
			$payment->insert();
			
			$this->load->model('billing_model');
			$cur_billing = new billing_model();
			$cur_billing->id = $this->input->post('billing_id');
			$cur_billing->update_date_closed();
			
			redirect('Order/order_list');
		}
	}
	
	public function get_item_deliverer_do()
	{
		$this->load->model('Order_details_model');
		$orders = $this->Order_details_model->get_all_from_otp_customer_to_deliverer($this->input->post('otp'), $this->session->child_id);
		$repairs = $this->Order_details_model->get_all_from_otp_tenant_to_deliverer($this->input->post('otp'), $this->session->child_id);
		$items = $this->Order_details_model->get_all_from_otp_customer_to_deliverer($this->input->post('bypass_otp'), $this->session->child_id, $this->input->post('delivery_receipt_no'));
		
		$this->load->model('views/deliverer/order_detail_view_model');
		if ($orders) $this->order_detail_view_model->get_order($orders);
		else if ($repairs) $this->order_detail_view_model->get_repair($repairs);
		else $this->order_detail_view_model->get_order($items);
		$data['model'] = $this->order_detail_view_model;
		
		$this->load->view('deliverer/order_detail', $data);
		$this->load->view('deliverer/repair_detail', $data);
	
	}
	
	public function get_item_customer_do()
	{
		$this->load->model('Order_details_model');
		$repairs = $this->Order_details_model->get_all_from_otp_deliverer_to_customer($this->input->post('otp'), $this->session->child_id);
		
		$this->load->model('views/customer/repair_detail_view_model');
		$this->repair_detail_view_model->get($repairs);
		$data['model'] = $this->repair_detail_view_model;
		
		$this->load->view('customer/repair_detail', $data);
	
	}
	
	public function assign_deliverer_do()
	{
		$this->load->model('Order_details_model');
		$orders = $this->Order_details_model->assign_deliverer();
		
		redirect('order/order_list');
	}
}
