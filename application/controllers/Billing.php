<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Billing extends CI_Controller {
	
	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$data['title'] = "Daftar Billing";
		
		if ($this->session->userdata('type') == "TENANT") // dummy
		{
			$this->load->model('Order_details_model');
			$items = $this->Order_details_model->get_all_from_tenant_id();
			$this->load->model('views/tenant/billing_list_view_model');
			$this->billing_list_view_model->get($items);
			$data['model'] = $this->billing_list_view_model;
			$this->load->view('tenant/billing_list', $data);
		}
		else if ($this->session->userdata('type') == "ADMIN") // dummy
		{
			$this->load->model('Order_details_model');
			$items = $this->Order_details_model->get_all();
			$this->load->model('views/admin/billing_list_view_model');
			$this->billing_list_view_model->get($items);
			$data['model'] = $this->billing_list_view_model;
			$this->load->view('admin/billing_list', $data);
		}
		else // CUSTOMER
		{
			$this->load->view('customer/billing_list', $data);
		}
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function detail($id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('billing');
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Billing";
		$data['model'] = new class{};
		
		if ($this->session->userdata('type') == "TENANT") // dummy
		{
			$this->load->view('tenant/billing_detail', $data);
		}
		if ($this->session->userdata('type') == "ADMIN") // dummy
		{
			$this->load->model('Order_details_model');
			$this->load->model('Billing_model');
			$orders = $this->Order_details_model->get_all_from_billing_id($id);
			$billings = $this->Billing_model->get_from_id($id);
			$this->load->model('views/admin/billing_detail_view_model');
			$this->billing_detail_view_model->get_order($orders);
			$this->billing_detail_view_model->get_billing($billings);
			$data['model'] = $this->billing_detail_view_model;
			$this->load->view('admin/billing_detail', $data);
		}
		else
		{
			// if not paid
			$this->load->view('customer/billing', $data);
			
			// if paid
			// redirect('billing/status');
		}
		
		// Load Footer
		$this->load->view('footer');
	}
	
	// view billing dari shopping cart
	public function cart()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('billing');
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('shipping_address_model');
		$shipping_address = $this->shipping_address_model->get_by_customer_id($this->session->child_id);
		
		$this->load->model('shipping_charge_model');
		$shipping_charge = $this->shipping_charge_model->get_from_shipping_address($shipping_address);
		
		$this->load->model('billing_model');
		$new_billing = $this->billing_model->get_from_create_new($this->session->cart, $shipping_address, $shipping_charge);
		
		$this->load->model('views/customer/billing_view_model');
		$this->billing_view_model->get_from_cart($this->session->cart, $shipping_address, $shipping_charge, $new_billing);
		
		$data['title'] = "Keranjang Belanja";
		$data['model'] = $this->billing_view_model;
		$this->load->view('customer/billing', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	//
	public function status($id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('billing_model');
		$billing = $this->billing_model->get_from_id($id);
		
		if ($billing == null) redirect('');
		
		$billing->init_shipping_address();
		$billing->init_shipping_charge();
		
		$this->load->model('payment_model');
		$payments = $this->payment_model->get_all_from_billing_id($billing->id);
		
		$this->load->model('order_details_model');
		$orders = $this->order_details_model->get_all_from_billing_id($billing->id);
		// foreach ($orders as $order)
		// {
			// $order->init_posted_item_variance();
			// if ($order->posted_item_variance != null)
			// {
				// $order->posted_item_variance->init_posted_item();
			// }
		// }
		
		$this->load->model('views/customer/billing_status_view_model');
		$this->billing_status_view_model->get($billing, $payments, $orders);
		
		$data['title'] = "Status Pembayaran";
		$data['model'] = $this->billing_status_view_model;
		$this->load->view('customer/billing_status', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function create()
	{
		// create new bill here
		
		// redirect to confirmation page
		$id = 0;
		redirect('billing/status/'.$id);
	}
	
	public function create_from_cart()
	{
		if (($this->session->type == TYPE['name']['CUSTOMER']) &&
			($this->input->post('customer_id') == $this->session->child_id))
		{
			// create new bill here
			$this->load->model('shipping_charge_model');
			$shipping_charge = $this->shipping_charge_model;
			$shipping_charge->fee_amount	= $this->input->post('fee_amount');
			$shipping_charge->insert();
			
			$this->load->model('billing_model');
			$billing = $this->billing_model;
			$billing->date_created			= $this->input->post('date_created');
			$billing->date_closed			= $this->input->post('date_closed');
			$billing->customer_id			= $this->input->post('customer_id');
			$billing->shipping_address_id	= $this->input->post('shipping_address_id');
			$billing->shipping_charge_id	= $shipping_charge->id;
			$billing->calculate_total_payable_from_cart($this->session->cart);
			$billing->insert();
			
			$this->load->model('order_details_model');
			$this->order_details_model->insert_from_cart($this->session->cart, $billing->id);
			
			// insert billing to chosen payment method
			
			// ga jadi lgsg masukin payment, kalo udah milih cara payment, tapi bayarnya pake cara laen mah ga mungkin bisa, soalnya ga ada tagihan di bank lainnya.
			// eh jadi ding??? kalo ga dimasukin, kalo ke close browser nya masa kudu ngulang
			$this->load->model('payment_model');
			$payment = $this->payment_model;
			$payment->payment_method		= $this->input->post('payment_method');
			$payment->paid_amount			= 0;
			$payment->billing_id			= $billing->id;
			$payment->insert();
			
			$this->load->config('payment_method');
			if (in_array($this->input->post('payment_method'), $this->config->item('no_wait_payment_methods'))) // kalau customer milih payment method yg ga perlu nunggu pembayaran (lgsg kirim)
			{
				$this->load->model('order_details_model');
				$order_details = new Order_details_model();
				$order_details = $order_details->set_all_paid_from_billing_id($id);
			}
			else // kalau nunggu pembayaran
			{
				$cur_payment_method = $this->config->item($this->input->post('payment_method'));
				// insert billing using api
			}
			
			$this->session->cart = array();
			
			// redirect to confirmation page
			redirect('billing/status/'.$billing->id);
		}
		redirect('');
	}
	
	public function payment_dummy_bayar($id)
	{
		$this->load->model('payment_model');
		$payment = new Payment_model();
		$payment = $payment->get_from_id($id);
		$payment->init_billing();
		$payment->paid_amount	= $payment->billing->total_payable; // dummy ceritanya bayar semua aja
		$payable_left = $payment->set_paid($id);
		
		if ($payable_left <= 0)
		{
			$this->load->model('order_details_model');
			$order_details = new Order_details_model();
			$order_details->set_all_paid_from_billing_id($payment->billing->id);
		}
		
		redirect('billing/status/'.$payment->billing->id);
	}
	
	public function edit()
	{
		// edit bill here
		
		// redirect to confirmation page
		$id = 0;
		redirect('billing/status/'.$id);
	}
}